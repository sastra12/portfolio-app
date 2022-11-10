@extends('admin.admin_master')

@section('title')
    Edit Password
@endsection

@section('content')
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Password</h3>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('update.password') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="oldpassword">Old Password</label>
                        <input type="password" class="form-control" name="oldpassword" id="oldpassword" value="">
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New Password</label>
                        <input type="password" class="form-control" name="newpassword" id="newpassword" value="">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"
                            value="">
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
