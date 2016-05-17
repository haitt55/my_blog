@extends('layouts.master')

@section('title', app_settings('page_title'))

@section('meta_keyword', app_settings('meta_keyword'))

@section('meta_description', app_settings('meta_description'))

@section('content')

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <?php $index = count($blogs); ?>
            @foreach($blogs as $blog)
            <div class="post-preview" id="{{ $index }}">
                <a href="post.html">
                    <h2 class="post-title">
                        {!! $blog->title !!}
                    </h2>
                    <?php
                    $excerpt = $blog->excerpt;
                    ?>
                    @if(strip_tags($excerpt))
                    <h3 class="post-subtitle">
                        {!! $excerpt !!}
                    </h3>
                    @endif
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>
            </div>
            <hr id="hr-{{ $index }}">
            <?php $index--; ?>
            @endforeach
            <!-- Pager -->
            <ul class="pager">
                <input type="hidden" id="start-position" name="start-position">
                <input type="hidden" id="end-position" name="end-position">
                <li class="next">
                    <a id="next-page" href="javascript:void(0)" onclick="nextPage();">Older Posts &rarr;</a>
                </li>
                <li class="previous">
                    <a id="previous-page" href="javascript:void(0)" onclick="previousPage();">&larr; Older Posts</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<hr>

@endsection

@section('inline_scripts')

<!-- Script to Activate the Carousel -->
<script type="text/javascript">

</script>

@endsection