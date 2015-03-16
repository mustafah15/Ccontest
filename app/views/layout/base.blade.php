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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand">Coders Field Contest</a>

            </div>
            <!-- /.navbar-header -->


            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="{{URL::route('home')}}"><button type="button" class="btn btn-danger btn-circle"><i class="fa icon-circle"></i></button> Home</a>
                        </li>
                        <li>
                            <a href="{{URL::route('score')}}"><button type="button" class="btn btn-danger btn-circle"><i class="fa icon-circle"></i></button> score board</a>
                        </li>
                        @if(Auth::getUser()->isAdmin())
                            <li>
                                <a href="{{URL::route('new-post')}}"><button type="button" class="btn btn-warning btn-circle"><i class="fa icon-circle"></i></button> add new problem</a>
                            </li>
                            <li>
                                <a href="{{URL::route('admin-submissions')}}"><button type="button" class="btn btn-warning btn-circle"><i class="fa icon-circle"></i></button> all Submissions</a>
                            </li>
                        @endif


                        @if(!Auth::getUser()->isAdmin())
                            <li>
                                <a href="{{URL::route('user-submissions')}}"><button type="button" class="btn btn-primary btn-circle"><i class="fa icon-circle"></i></button> My Submissions</a>
                            </li>
                            <li>
                               <center><h4>Score {{Auth::getUser()->score}}</h4></center>

                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
            <img style="float: left" src="{{URL::route('home')}}/coder.png" height="50" width="50">
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">@yield('pagename')</h1>

                        @yield('content')

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{url();}}/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url();}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url();}}/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url();}}/dist/js/sb-admin-2.js"></script>

    <script>
        $('#problemsub').click(function(){

            var content = $('#problemcontent').val();
            var title = $('#problemtitle').val();

            $.ajax({
                url:'<?php echo URL::route('new-post'); ?>',
                type:'POST',
                dateType:'json',
                data:{
                    'content':content,
                    'title':title,
                    'by': '<?php echo Auth::getUser()->id; ?>',
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
