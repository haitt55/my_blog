<?php

namespace App\Storage\Eloquent;

use App\Storage\BlogRepositoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;
use Parsedown;

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

    public function create($data, $fileImage = null, $fileContent = null)
    {
        if ($fileContent && $fileContent->getClientOriginalExtension() == 'md') {
            $parsedown = new Parsedown();
            $data['content'] = $parsedown->text(file_get_contents($fileContent));
        }

        $path = config('blog.image_path');
        if ($fileImage) {
            $data['head_image'] = $this->saveFile($fileImage, $path);
        }

        return $this->model->create($data);
    }

    public function update($id, $data, $fileImage = null, $fileContent = null)
    {
        $model = $this->findOrFail($id);
        $path = config('blog.image_path');

        if ($fileContent && $fileContent->getClientOriginalExtension() == 'md') {
            $parsedown = new Parsedown();
            $data['content'] = $parsedown->text(file_get_contents($fileContent));
        }

        if ($fileImage) {
            $oldImage = $model->head_image;
            $data['head_image'] = $this->saveFile($fileImage, $path, $oldImage);
        }

        $model->update($data);

        return $model;
    }

    function saveFile ($fileImage, $path, $oldImage = null)
    {
        $name = sha1(time() . $fileImage->getClientOriginalName());
        $extention = $fileImage->getClientOriginalExtension();
        $filename = "{$name}.{$extention}";
        Image::make($fileImage->getRealPath())->save(public_path($path) . '/' . $filename);

        if ($oldImage && file_exists(public_path($oldImage))) {
            unlink(public_path($oldImage));
        }

        return $path . '/' . $filename;
    }
}
?>