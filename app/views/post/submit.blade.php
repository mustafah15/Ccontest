@extends('layout.base')

@section('pagename')
Submit Solution
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Submit solution
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error"></div>
                        <form role="form" method="post" action="{{URL::route('problem-send')}}" >
                            <div class="form-group">
                                <label>Title</label>
                                <input disabled  type="text" id="problemtitle" class="form-control" value="{{$problem->title}}">
                                <input type="hidden" name="post_id" value="{{$problem->id}}">
                                <input type="hidden" name="by" value="{{Auth::getUser()->id}}">

                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <textarea required="required" id="problemcontent" name="code" class="form-control" rows="3" cols="7"></textarea>
                            </div>
                            {{ Form::token(); }}
                            <input type="submit" class="btn btn-lg btn-success btn-block" value="Send!">

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