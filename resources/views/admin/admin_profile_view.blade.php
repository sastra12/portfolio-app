@extends('admin.admin_master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="col-md-6">
        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive"
                    src="
                {{ !empty($user->profile_image)
                    ? url('upload/admin_image/' . $user->profile_image)
                    : url('upload/no_image.jpg') }}"
                    alt="User profile picture">

                {{-- <h3 class="profile-username text-center">Nina Mcintire</h3> --}}

                {{-- <p class="text-muted text-center">Software Engineer</p> --}}

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b>Name:</b> {{ $user->name }}
                    </li>
                    <li class="list-group-item">
                        <b>Username:</b> {{ $user->username }}
                    </li>
                    <li class="list-group-item">
                        <b>User Email:</b> {{ $user->email }}
                    </li>
                </ul>

                <a href="{{ route('edit.profile') }}" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection
