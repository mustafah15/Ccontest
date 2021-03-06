@extends('layout.base')

@section('pagename')
All Submissions
@stop

@section('content')


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Submissions details
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>problem name</th>
                            <th>response</th>
                            <th>submit time</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter=0;?>
                        @foreach($submissions as $submit)
                        <tr>
                            <td>{{++$counter;}}</td>
                            <td>{{Post::find($submit->post_id)->title}}</td>
                            <td><a href="<?php echo URL::route('submit-single').'/'.$submit->id; ?>"><button type="button" class="btn btn-primary">Response</button></a></td>
                            <td>{{$submit->created_at}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

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