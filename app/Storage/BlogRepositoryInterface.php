<?php

namespace App\Storage;

interface BlogRepositoryInterface extends RepositoryInterface
{
    public function findBySlug($slug);

    public function getPublishedBlogs();
}
?>