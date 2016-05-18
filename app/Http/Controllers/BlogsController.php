<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Storage\BlogRepositoryInterface as BlogRepository;

class BlogsController extends Controller
{
    protected $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blogRepository->getPublishedArticles()->get();

        return view('blogs.index', compact('blogs'));
    }

    public function show($slug)
    {
        $blog = $this->blogRepository->findBySlug($slug);

        return view('blogs.show', compact('blog'));
    }
}