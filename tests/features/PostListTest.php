<?php

class PostListTest extends FeatureTestCase
{
    public function test_a_user_can_see_the_post_list_and_go_details()
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

    public function test_a_user_can_see_X_quantity_posts_at_root()
    {
        factory(\App\Post::class, 50)->create();

        $this->visit('/')
            ->countElements('.post-element', 15);

    }
}
