<?php

use App\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostIntegrationTest extends TestCase
{
    use DatabaseTransactions;

    function test_a_slug_is_generated_and_saved_to_database()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'title' => 'Como Instalar Laravel'
        ]);

        $user->posts()->save($post);

        $this->assertSame(
            'como-instalar-laravel',
            $post->fresh()->slug
        );
    }

    function test_url_attribute_return_post()
    {
        $user = $this->defaultUser();

        $post = factory(Post::class)->make([
            'id'    => '69',
            'title' => 'new title'
        ]);

        $user->posts()->save($post);

        $this->assertSame(
            env('APP_URL').'/posts/69-new-title',
            $post->url);
    }
}
