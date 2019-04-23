<?php

class ShowPostTest extends FeatureTestCase
{
    function test_a_user_can_see_the_post_details()
    {
        //Having
        $user = $this->defaultUser([
            'name' => 'Alberto Gonzalez'
        ]);

        $post = $this->createPost([
            'user_id' => $user->getKey(),
            'title'   => 'Este es el titulo del post',
            'content' => 'Este es el contenido del post'
        ]);

        //when
        $this->visit($post->url)
            ->seeInElement('h1', $post->title)
            ->see('Este es el contenido del post')
            ->see('Alberto Gonzalez');

    }

    function test_old_urls_still_redirect()
    {
        //Having
        $post = $this->createPost([
            'title' => 'Old title',
        ]);

        $oldUrl = $post->url;

        $post->update(['title' => 'New Title']);

        $this->visit($oldUrl)
            ->seePageIs($post->url);
    }
}
