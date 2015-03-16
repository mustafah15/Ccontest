@extends('layout.base')

@section('pagename')
Score Board
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
                            <th>team name</th>
                            <th>score</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter=0;?>
                        @foreach($users as $user)
                        <tr>
                            <td>{{++$counter;}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->score}}</td>
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