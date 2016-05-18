@extends('admin.layouts.master')

@section('title', 'Edit blog')

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
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}">
                            </div>
                            <div class="form-group">
                                <label for="head_image">Head Image</label>
                                <img id="head_image" class="thumbnail" src="{{ old('head_image', $blog->head_image) }}" style="max-width: 200px">
                            </div>
                            <div class="form-group">
                                <label for="excerpt">Excerpt</label>
                                <textarea name="excerpt" id="excerpt">{{ old('excerpt', $blog->excerpt) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content">{{ old('content', $blog->content) }}</textarea>
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
        $('#content').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null
        });
    });
    </script>
@endsection