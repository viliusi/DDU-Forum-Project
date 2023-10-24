<?php
require_once 'app/backend/core/Init.php';

if (!Input::get('id')) {
    Redirect::to('index.php');
}

$data = $user->data();
$channel_id = Input::get('id');

$channel = Channel::getChannel($channel_id);
$posts = Post::getChannelPosts($channel_id);

if (Input::get('submit')) {

    Post::create($post);
    Redirect::to('channel.php?id=' . $channel_id);
}
// This file gets the user's data, the channel's data and the posts in the channel. If the form is submitted, it creates the post and redirects the user to the channel page.
