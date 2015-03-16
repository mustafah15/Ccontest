<?php
/**
 * Created by PhpStorm.
 * User: mustafa
 * Date: 3/9/15
 * Time: 11:39 PM
 */

use Illuminate\Http\RedirectResponse;
class PostController extends BaseController {


    public function getNewPost()
    {
        if(Auth::getUser()->isAdmin()){
            return View::make('post.new');
        }
        return Redirect::route('home')->withErrors(['you do not have the permission to go there :D']);
    }

    public function postNewPost()
    {

        $validator = Validator::make(Input::all(),
            array('content'=>'required',
                'title'=>'required'));
        if($validator->fails())
        {
            return Response::json(['success'=>false,'error'=>$validator->errors()->first()]);
        }

        else{
            $newProblem = Post::create([
                'title'=>Input::get('title'),
                'content'=>Input::get('content'),
                'by'=>Input::get('by')
            ]);

            return Response::json(['success'=>true]);
        }
    }

    public function getPost($id)
    {
        $data['post'] = Post::find($id);
        //return Response::json(array('a'=>$data));
        return View::make('post.singlepost',$data);
    }

    public function getUserPosts()
    {
       /* $id = Auth::getUser()->id;

        $posts = User::find($id)->posts;
        return Response::json(array('test'=>$posts));*/
        return View::make('post.new');
    }


    public function getAll()
    {
        $data['posts'] = Post::all();

        return View::make('post.all',$data);
    }

    public function getSubmit($id)
    {
        $data['id'] = $id;
        $data['problem'] = Post::find($id);
        return View::make('post.submit',$data);
    }

    public function postSubmit()
    {
        $newSubmit = Submit::create([
            'post_id'=>Input::get('post_id'),
            'by'=>Input::get('by'),
            'code'=>Input::get('code'),
        ]);
        return Redirect::to('/')->with('message', 'Submitission Sent!');

    }

    public function getSubmissions()
    {
        $id = Auth::getUser()->id;
        $submissions = Submit::where('by','=',$id)->get();
        $data['submissions'] = $submissions;
        return View::make('post.allsubs',$data);
    }

    public function getAdminSubmissions()
    {
        if(Auth::getUser()->isAdmin())
        {
            $data['submissions'] = Submit::where('response','=','1')->get();
            return View::make('admin.submissions',$data);
        }
        return Redirect::route('home')->withErrors(['you do not have the permission to go there :D']);
    }

    public function getAdminSubmit($id)
    {
        if(Auth::getUser()->isAdmin())
        {
            $submit = Submit::find($id);
            $data['submit'] = $submit;
            $data['responses'] = Res::all();
            //$user = User::find($submit->by);
            //return Response::json(['data'=>$data]);

            return View::make('admin.submit',$data);
        }
        return Redirect::route('home')->withErrors(['you do not have the permission to go there :D']);
    }

    public function postAdminSubmit()
    {
        $submit = Submit::find(Input::get('id'));

        $submit->response = Input::get('response');
        $submit->score = Input::get('score');
        $submit->save();

        if( $submit->score >0){
        $user = User::find(Input::get('by'));
        $user->score = $user->score + $submit->score;
        $user->save();
        }
        return Redirect::route('admin-submissions');
    }

} 