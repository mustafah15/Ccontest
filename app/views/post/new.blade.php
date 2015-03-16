@extends('layout.base')

@section('pagename')
New Problem
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Add new problem
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error"></div>
                        <form role="form" >
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" id="problemtitle" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Problem Content</label>
                                <textarea id="problemcontent" class="form-control" rows="3" cols="7"></textarea>
                            </div>
                            {{ Form::token(); }}
                            <a id="problemsub" class="btn btn-lg btn-success btn-block">Post!</a>

                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->

                    <!-- /.col-lg-6 (nested) -->
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