<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 3/6/15
 * Time: 7:43 PM
 */

class AccountController extends BaseController{


    public function getLogin()
    {
        return View::make('account.login');
    }

    public function getRegister()
    {
        return View::make('account.register');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

    public function postRegister()
    {
        $validator = Validator::make(Input::all(),

            array('username'=>'required|unique:users',
                'password'=>'required|min:3|confirmed',
                'password_confirmation'=>'required|min:3',
                'email'=>'required|unique:users'));

        if($validator->fails())
        {
            return Response::json(['success'=>false,'error'=>$validator->errors()->first()]);
        }

        else{

            $new_user = User::create([
                'username'=>Input::get('username'),
                'email'=>Input::get('email'),
                'password'=>Hash::make(Input::get('password'))
            ]);

            $auth = Auth::attempt(
                array(
                    'username'=>Input::get('username'),
                    'password'=>Input::get('password')
                )
            );
            return Response::json(['success'=>true]);

        }

    }

    public function postLogin()
    {
        $validator = Validator::make(
            array('username'=>Input::get('username'),'password'=>Input::get('password')),
            array('username'=>'required','password'=>'required')
        );

        if($validator->fails())
        {
            return Response::json(['success'=>false,'error'=>$validator->errors()->first()]);
        }

        else{
            $auth = Auth::attempt(
                array(
                    'username'=>Input::get('username'),
                    'password'=>Input::get('password')
                )
            );

            if(!$auth){
                return Response::json(['success'=>false,'error'=>'wrong username or password']);
            }

            return Response::json(['success'=>true]);
        }

    }

    public function getScore()
    {
        $data['users'] = User::where('admin','=','0')->orderBy('score')->get();

        return View::make('account.score',$data);
    }


} 