@extends('layout.base')

@section('pagename')
{{$post->title}}
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                {{$post->title}}
            </div>
            <div class="panel-body"style="background-color: #c7ddef" >

                <div class="row" >
                    <div class="col-lg-12" >
                        <form role="form"  >
                            <div class="form-group">
                                {{$post->content}}
                            </div>
                        </form>
                    </div>
                    <center><a href="{{URL::route('submit-problem-single').'/'.$post->id}}">
                    <button type="button" class="btn btn-success btn-lg btn-lg">Submit</button>
                        </a>
                    </center>
                </div>

                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@stop



<script>



</script>