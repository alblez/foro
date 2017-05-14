<?php

class ExampleTest extends FeatureTestCase
{
    function test_basic_example()
    {
        $name = 'Jose Alberto';
        $email = 'alberto@alblez.co';

        $user = factory(\App\User::class)->create([
            'name' => $name,
            'email' => $email,
        ]);

        $this->actingAs($user, 'api')
            ->visit('api/user')
             ->see($name)
            ->see($email);
    }
}
