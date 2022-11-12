@extends('admin.admin_master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Home Slide Page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data"
                action="{{ route('update.slider', ['id' => 1]) }}">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ $data->title }}">
                    </div>
                    <div class="form-group">
                        <label for="short_title">Short Title</label>
                        <input type="text" class="form-control" name="short_title" id="short_title"
                            value="{{ $data->short_title }}">
                    </div>
                    <div class="form-group">
                        <label for="video_url">Video URL</label>
                        <input type="video_url" class="form-control" name="video_url" id="video_url"
                            value="{{ $data->video_url }}">
                    </div>
                    <div class="form-group">
                        <label for="home_slide">Slide Image</label>
                        <input type="file" class="form-control" name="home_slide" id="home_slide">
                    </div>
                    <div class="form-group">
                        <img src=" {{ !empty($data->home_slide) ? url('upload/home_slide/' . $data->home_slide) : url('upload/no_image.jpg') }}"
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
            $('#home_slide').change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endpush
