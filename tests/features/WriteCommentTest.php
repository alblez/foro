<?php

class WriteCommentTest extends FeatureTestCase
{
    /*
     *@test
     */
    function test_a_user_can_write_a_comment()
    {
        $post = $this->createPost();
        $user = $this->defaultUser();

        $this->actingAs($user)
            ->visit($post->url)
            ->type('A comment', 'comment')
            ->press('Publish Comment');

        $this->seeInDatabase('comments', [
            'comment' => 'A comment',
            'user_id' => $user->getKey(),
            'post_id' => $post->id
        ]);

        $this->seePageIs($post->url);
    }
}
