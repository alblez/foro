<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    function test_a_slug_is_generated_and_saved_to_database()
    {
        $post = $this->createPost([
            'title' => 'Como Instalar Laravel'
        ]);

        $this->assertSame(
            'como-instalar-laravel',
            $post->fresh()->slug
        );
    }

    function test_url_attribute_return_post()
    {
        $post = $this->createPost([
            'id'    => '69',
            'title' => 'new title'
        ]);

        $this->assertSame(
            env('APP_URL').'/posts/69-new-title',
            $post->url);
    }
}
