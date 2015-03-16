@extends('layout.base')

@section('pagename')
Review Solution
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Review solution
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="error"></div>
                        <form role="form" method="post" action="{{URL::route('post-submit')}}" >
                            <div class="form-group">
                                <label>Title</label>
                                <input disabled  type="text" id="problemtitle" class="form-control" value="{{Post::find($submit->post_id)->title}}">
                            </div>

                            <div class="form-group">
                                <label>score</label>
                                <input type="text" name="score" value="{{$submit->score}}" >
                            </div>
                            <input type="hidden" name="id"  value="{{$submit->id}}">
                            <input type="hidden" name="by" value="{{$submit->by}}">

                            <div class="form-group">
                               <label>response</label>
                                <select required="required" name="response">
                                    <option></option>
                                    @foreach($responses as $response)
                                        <option value="{{$response->id}}">{{$response->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Code</label>
                                <textarea required="required" id="problemcontent" name="code" class="form-control" rows="3" cols="7">{{$submit->code}}</textarea>
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