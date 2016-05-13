<?php

namespace App\Storage\Eloquent;

use App\Storage\BlogRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BlogRepository extends Repository implements BlogRepositoryInterface
{
    public function findBySlug($slug)
    {
        return $this->model->findBySlug($slug);
    }

    public function getPublishedBlogs()
    {
        return $this->model->published()->orderBy('created_at', 'desc');
    }
}
?>