@extends('admin.layouts.master')

@section('title', 'Edit blog')

@section('css')
    @parent

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
@endsection

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
                    Edit blog
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" role="form">
                                @include('admin.layouts.partials.errors')
                                {!! csrf_field() !!}
                                {!! method_field('put') !!}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}">
                                </div>
                                <div class="form-group">
                                    <label for="head_image">Head Image</label>
                                    <input type="file" name="head_image" id="head_image" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <img id="head_image_preview" class="thumbnail" src="{{ old('head_image', $blog->head_image) }}" style="max-width: 200px">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt">{{ old('excerpt', $blog->excerpt) }}</textarea>
                                </div>
                                <div class="form-group">
                                <label for="content">Old Content</label>
                                    <textarea readonly name="content" id="old_content">{{ old('content', $blog->content) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <input type="file" name="content" id="content">
                                    <p style="font-style: italic;">(markdown file type)</p>
                                    <!-- <textarea name="content" id="content">{{ old('content', $blog->content) }}</textarea> -->
                                </div>
                                <div class="form-group">
                                    <label for="page_title">Page Title</label>
                                    <input type="text" name="page_title" id="page_title" class="form-control" value="{{ old('page_title', $blog->page_title) }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ old('meta_keyword', $blog->meta_keyword) }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description', $blog->meta_description) }}">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="published" id="published" value="1"{{ old('published', $blog->published) ? ' checked="checked"' : '' }}> Visible</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-danger" id="btn-delete" data-link="{{ route('admin.blogs.destroy', $blog->id) }}"><i class="fa fa-remove"></i> Delete blog</button>
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
        $('#old_content').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null
        });
    });
    </script>
    
    <script type="text/javascript">
    $(document).ready(function() {
        $("#btn-delete").click(function() {
            if (confirm('Do you really want to delete this data?')) {
                var url = $(this).attr('data-link');
                $.ajax({
                    url : url,
                    type : 'DELETE',
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    success: function(data) {
                        if (data.error) {
                            window.location.href = '{{ URL::route('admin.blogs.edit', $blog->id) }}';
                        } else {
                            window.location.href = '{{ URL::route('admin.blogs.index') }}';
                        }
                    },
                    error: function(data) {
                        window.location.href = '{{ URL::route('admin.blogs.index') }}';
                    }
                });
            }
        });
    });
    </script>
@endsection