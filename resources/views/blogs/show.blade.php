@extends('layouts.master')

@section('title', $blog->page_title)

@section('meta_keyword', $blog->meta_keyword)

@section('meta_description', $blog->meta_description)

@section('head_image', $blog->head_image)

@section('content')

    {{--<div class="row">--}}
        {{--<div class="box">--}}
            {{--<div class="col-lg-12 text-center">--}}
                {{--<h2>{{ $blog->title }}--}}
                    {{--<br>--}}
                    {{--<small>{{ date('F d, Y', strtotime($blog->created_at)) }}</small>--}}
                {{--</h2>--}}
                {{--{!! $blog->head_image ? image(config('article.image_path') . '/' . $blog->head_image, array('class' => 'img-responsive img-border img-full')) : '' !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <h2>{{ $blog->title }}
                        <br>
                        <small>{{ date('F d, Y', strtotime($blog->created_at)) }}</small>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </article>

    <hr>


@endsection