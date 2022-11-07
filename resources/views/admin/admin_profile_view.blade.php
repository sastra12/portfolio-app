@extends('admin.admin_master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="col-md-6">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle"
                    src="{{ asset('backend/dist/img/user4-128x128.jpg') }}" alt="User profile picture">

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

                <a href="" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
@endsection
