<?php

use App\Post;
use Carbon\Carbon;

class PostListTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_list_and_go_details()
    {
        $post = $this->createPost([
            'title' => 'Debo usar Laravel 5.3 o 5.1 LTS?'
        ]);

        $this->visit('/')
            ->seeInElement('h1', 'Post')
            ->see($post->title)
            ->click($post->title)
            ->seePageIs($post->url);
    }

    function test_the_posts_are_paginated()
    {
        //Having
        $first = $this->createPost([
            'title' => 'Post más antiguo',
            'created_at' => Carbon::now()->subDay(2)
        ]);

        factory(Post::class)->times(15)->create([
            'created_at' => Carbon::now()->subDay(1)
        ]);

        $last = $this->createPost([
            'title' => 'Post mas reciente',
        ]);

        //Then
        $this->visit('/')
            ->countElements('.post-element', 15)
            ->see($last->title)
            ->dontSee($first->title)
            ->click(2)
            ->see($first->title)
            ->dontSee($last->title);

    }
}
