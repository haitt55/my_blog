<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;
use App\Storage\UserRepositoryInterface as UserRepository;
use App\Storage\PageRepositoryInterface as PageRepository;
use App\Storage\ArticleRepositoryInterface as ArticleRepository;
use App\Storage\MessageRepositoryInterface as MessageRepository;
use App\Storage\BlogRepositoryInterface as BlogRepository;

class HomeComposer
{
    protected $user;

    protected $page;

    protected $article;

    protected $message;

    protected $blog;

    public function __construct(UserRepository $user,
        PageRepository $page,
        ArticleRepository $article,
        MessageRepository $message,
        BlogRepository $blog)
    {
        $this->user = $user;
        $this->page = $page;
        $this->article = $article;
        $this->message = $message;
        $this->blog = $blog;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countPages', $this->page->all()->count());
        $view->with('countArticles', $this->article->all()->count());
        $view->with('countMessages', $this->message->unread()->count());
        $view->with('countUsers', $this->user->all()->count());
        $view->with('countBlogs', $this->blog->all()->count());
    }
}