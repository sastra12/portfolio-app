@extends('admin.admin_master')

@section('title')
    Edit About Setup
@endsection

@section('content')
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Page Setupr</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update.about', ['id' => 1]) }}">
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
                        <label>Short Description</label>
                        <textarea class="form-control" rows="7" name="short_desc">{{ $data->short_desc }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Long Description</label>
                        <div class="box">
                            <div class="box-body pad">
                                <textarea name="long_desc" class="textarea"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $data->long_description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about_image">About Image</label>
                        <input type="file" class="form-control" name="about_image" id="image">
                    </div>
                    <div class="form-group">
                        <img src=" {{ !empty($data->abput_image) ? url('upload/home_slide/' . $data->anput_image) : url('upload/no_image.jpg') }}"
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
            $('#image').change(function(e) {
                var reader = new FileReader()
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0'])
            })
        })
    </script>
@endpush
