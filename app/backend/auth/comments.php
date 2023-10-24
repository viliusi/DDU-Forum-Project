<?php
require_once 'app/backend/core/Init.php';

if (!Input::get('post_id')) {
    Redirect::to('index.php');
}

$post_id = Input::get('post_id');
$post = Post::getPostById($post_id);

$comments = Comment::getAllComments($post_id);
// This file checks if the user is logged in and if the post_id is set. If not, it redirects to the index.php page. 
//If the user is logged in and the post_id is set, it gets the post and all the comments for that post. The comments are then displayed in the comments.php file.

if (Input::exists()) {
    var_dump($_POST);
    $pcomment = Input::get('post_comment');
    $cdelete = Input::get('comment_delete');
    $pdelete = Input::get('post_delete');

    if (isset($pcomment)) {
        $validate = new Validation();

        $validation = $validate->check($_POST, array(
            'content' => array(
                'required' => true,
                'min' => 1,
                'max' => 1024,
            ),

            'post_id' => array(
                'required' => true,
            ),
        ));

        if ($validate->passed()) {
            try {
                $comments = new Comment(); // Create an instance of the Comment class
                $comments->create(array(
                    'user_id'  => $user->data()->uid,
                    'post_id'  => Input::get('post_id'),
                    'content'  => Input::get('content'),
                    'created_at' => date('Y-m-d H:i:s'), //AMERICAN DATE FORMAT CHANGE TO EUROPEAN ONE DAY!
                ));
                Redirect::to('comments.php?post_id=' . Input::get('post_id'));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo '<div class="alert alert-danger"><strong>Validation error</strong>' . cleaner($error) . '</div>';
            }
        }
    }

    if (isset($cdelete)) {
        $validate = new Validation();

        $validation = $validate->check($_POST, array(
            'comment_user_id' => array(
                'required' => true,
            ),

            'post_id' => array(
                'required' => true,
            ),

            'comment_id' => array(
                'required' => true,
            ),
        ));

        if ($validate->passed()) {
            try {

                Comment::deleteComment(Input::get('comment_id'), $user->data()->uid);

                Redirect::to('comments.php?post_id=' . Input::get('post_id'));
            } catch (Exception $e) {
                die($e->getMessage());
            }
        } else {
            foreach ($validate->errors() as $error) {
                echo '<div class="alert alert-danger"><strong>Validation error</strong>' . cleaner($error) . '</div>';
            }
        }

        if (isset($pdelete)) {
            $validate = new Validation();

            $validation = $validate->check($_POST, array(
                'post_id' => array(
                    'required' => true,
                ),

                'post_user_id' => array(
                    'required' => true,
                ),
            ));

            if ($validate->passed()) {
                try {
                    Comment::deletePost(Input::get('post_id'), $user->data()->uid);

                    Redirect::to('comments.php?post_id=' . Input::get('post_id'));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            } else {
                foreach ($validate->errors() as $error) {
                    echo '<div class="alert alert-danger"><strong>Validation error</strong>' . cleaner($error) . '</div>';
                }
            }
        }
    }
}
