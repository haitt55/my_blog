@extends('admin.layouts.master')

@section('title', 'Add blog')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">blogs</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 text-right">
            <a href="{{ route('admin.blogs.index') }}" class="btn btn-success"><i class="fa fa-list"></i> List</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add blog
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" role="form">
                                @include('admin.layouts.partials.errors')
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="title">Title <span class="required">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="head_image">Head Image</label>
                                    <input type="file" name="head_image" id="head_image" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <img id="head_image_preview" class="thumbnail" src="">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input type="file" name="content" id="content">
                                    <p style="font-style: italic;">(markdown file type)</p>
                                    <!-- <textarea name="content" id="content">{{ old('content') }}</textarea> -->
                                </div>
                                <div class="form-group">
                                    <label for="page_title">Page Title</label>
                                    <input type="text" name="page_title" id="page_title" class="form-control" value="{{ old('page_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description') }}">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="published" id="published" value="1"{{ old('published', true) ? ' checked="checked"' : '' }}> Visible</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('inline_scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#excerpt').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null
        });
        // $('#content').summernote({
        //     height: 300,
        //     minHeight: null,
        //     maxHeight: null
        // });

        $("#head_image").click(function(){
            readURL(this);
        });

        $("#head_image").change(function(){
            readURL(this);
        });
    });

    function readURL(input) 
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#head_image_preview').css('width', '200px');
                $('#head_image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            $('#head_image_preview').css('width', '');
            $('#head_image_preview').attr('src', '');
        }
    }
    </script>
@endsection