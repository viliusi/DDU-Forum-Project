<?php
require_once 'app/backend/core/Init.php';

if (!$user->isLoggedIn()) {
    Redirect::to('index.php');
}
if (!Input::get('post_id')) {
    Redirect::to('index.php');
}

$post_id = Input::get('post_id');
$post = Post::getPostById($post_id);


$comments = Comment::getAllComments($post_id);
// This file checks if the user is logged in and if the post_id is set. If not, it redirects to the index.php page. 
//If the user is logged in and the post_id is set, it gets the post and all the comments for that post. The comments are then displayed in the comments.php file.