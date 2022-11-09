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
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('store.profile') }}">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $user->name }}">
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
                        <img src=" {{ !empty($user->profile_image)
                            ? url('upload/admin_image/' . $user->profile_image)
                            : url('upload/no_image.jpg') }}"
                            alt="" id="showImage" style="width:200px; height:200px;">
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

@push('script')
    <script>
        $(document).ready(function() {
            $('#profile_image').change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endpush
