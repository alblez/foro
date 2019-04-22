<?php

use App\Post;

class PostModelTest extends TestCase
{
    function test_adding_a_title_generates_a_slug()
    {
        $post = new Post([
            'title' => 'Como Instalar Laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->slug);
    }

    function test_edit_title_change_slug()
    {
        $post = new Post([
            'title' => 'Como Instalar Laravel'
        ]);

        $post->title = 'Como Instalar Laravel 5.1 LTS';

        $this->assertSame('como-instalar-laravel-51-lts', $post->slug);
    }
}
