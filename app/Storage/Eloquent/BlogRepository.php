<?php

namespace App\Storage\Eloquent;

use App\Storage\BlogRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;

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

    public function create($data, $file = null)
    {
    	$path = config('blog.image_path');
    	if ($file) {
            $name = sha1(time() . $file->getClientOriginalName());
            $extention = $file->getClientOriginalExtension();
            $filename = "{$name}.{$extention}";
            Image::make($file->getRealPath())->save(public_path($path) . '/' . $filename);
            $data['head_image'] = $path . '/' . $filename;
        }

        return $this->model->create($data);
    }

    public function update($id, $data, $file = null)
    {
        $model = $this->findOrFail($id);
        $path = config('blog.image_path');
    	if ($file) {
    		$oldImage = $model->head_image;

            $name = sha1(time() . $file->getClientOriginalName());
            $extention = $file->getClientOriginalExtension();
            $filename = "{$name}.{$extention}";
            Image::make($file->getRealPath())->save(public_path($path) . '/' . $filename);
            $data['head_image'] = $path . '/' . $filename;

            if (file_exists(public_path($oldPath))) {
                unlink($oldPath);
            }
        }

        $model->update($data);

        return $model;
    }
}
?>