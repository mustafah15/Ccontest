<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coders Field Contest</title>

    <link href="{{url();}}/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{url();}}/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url();}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{url();}}/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <center>  <h1>Coder Field Contest</h1></center>
                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <div class="error">   </div>
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" id="username" placeholder="username" name="username" type="text" >
                                </div>

                                <div class="form-group">
                                    <input class="form-control" id="password" placeholder="Password" name="password" type="password" >
                                </div>

                                {{ Form::token(); }}
                                <!-- Change this to a button or input when using this as a form -->
                                <a id="regsub" class="btn btn-lg btn-success btn-block">Login</a>

                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="{{url();}}/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url();}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url();}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url();}}/dist/js/sb-admin-2.js"></script>

    <script>
        $('#regsub').click(function(){
            var username = $('#username').val();
            var password = $('#password').val();

            $.ajax({
                url:'<?php echo URL::route('login'); ?>',
                type:'POST',
                dateType:'json',
                data:{
                    'username':username,
                    'password':password,
                    '_token':$('input[name=_token]').val()
                },

                success:function(data){
                    if(!data.success){
                        $('.error').html(data.error);
                    }
                    else{
                        window.location = "<?php  echo URL::route('home');?>";
                    }
                }
            });
        });

    </script>

</body>

</html>
