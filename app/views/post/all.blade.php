@extends('layout.base')

@section('pagename')
All Problems
@stop

@section('content')

@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Contest Problems
            </div>

            <div class="panel-body">
                @foreach($posts as $post)
                <div class="row">
                    <div class="col-lg-12">
                        <form role="form" >

                            <div class="form-group">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="form-group">
                                <textarea disabled id="problemcontent"  class="form-control" rows="3" >{{$post->content}}</textarea>
                            </div>

                         <a href="<?php echo URL::route('problem-single').'/'.$post->id; ?>"><button  type="button" class="btn btn-primary">Full text</button></a>  <button type="button" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                @endforeach
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