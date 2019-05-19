<?php

// Routes require authentication

//Post
Route::get('posts/create', [
    'uses' => 'CreatePostController@create',
    'as'   => 'posts.create',
]);

Route::post('posts/create', [
    'uses' => 'CreatePostController@store',
    'as'   => 'posts.store',
]);

Route::post('posts/{post}/comments', [
    'uses' => 'CommentController@store',
    'as'   => 'comments.store'
]);
