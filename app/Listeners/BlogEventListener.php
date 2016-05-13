<?php

namespace App\Listeners;

class BlogEventListener
{
    public function onCreated($event)
    {
        flash()->success('Success!', 'Blog successfully created.');
    }

    public function onUpdated($event)
    {
        flash()->success('Success!', 'Blog successfully updated.');
    }

    public function onDeleted($event)
    {
        flash()->success('Success!', 'Blog successfully deleted.');
    }

    public function subscribe($events)
    {
        $events->listen(
            'App\Events\Blog\WasCreated',
            'App\Listeners\BlogEventListener@onCreated'
        );
        $events->listen(
            'App\Events\Blog\WasUpdated',
            'App\Listeners\BlogEventListener@onUpdated'
        );
        $events->listen(
            'App\Events\Blog\WasDeleted',
            'App\Listeners\BlogEventListener@onDeleted'
        );
    }
}
