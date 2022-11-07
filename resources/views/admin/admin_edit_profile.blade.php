@extends('admin.admin_master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Profile</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            value="{{ $user->username }}">
                    </div>
                    <div class="form-group">
                        <label for="email">User Email</label>
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="profile_image">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image" id="profile_image">
                    </div>
                    <div class="form-group">
                        <img src="{{ asset('backend/dist/img/user4-128x128.jpg') }}" alt="">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
@endsection
