<?php
require_once 'app/backend/core/Init.php';

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
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
