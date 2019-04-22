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
        $this->visit(route('posts.show', $post))
            ->seeInElement('h1', $post->title)
            ->see($post->content)
            ->see($user->name);

    }
}
