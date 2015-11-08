@extends('layouts.master')

@section('title', 'Edit Password')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Password</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Password
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('profile.updatePassword') }}" role="form" class="form-horizontal">
                                @include('layouts.partials.errors')
                                
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Old Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Old Password" name="old_password" type="password" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">New Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="New Password" name="password" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirm New Password</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Confirm New Password" name="password_confirmation" type="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection