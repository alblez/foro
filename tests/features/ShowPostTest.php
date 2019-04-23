<?php

class ShowPostTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_details()
    {
        //Having
        $user = $this->defaultUser([
            'name' => 'Alberto Gonzalez'
        ]);

        $post = factory(\App\Post::class)->make([
            'title' => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post'
        ]);

        $user->posts()->save($post);

        //when
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);

    }

    function test_old_urls_still_redirect()
    {
        //Having
        $user = $this->defaultUser();

        $post = factory(\App\Post::class)->make([
            'title' => 'Old title',
        ]);

        $user->posts()->save($post);

        $oldUrl = $post->url;

        $post->update(['title' => 'New Title']);

        $this->visit($oldUrl)
            ->seePageIs($post->url);
    }
}
