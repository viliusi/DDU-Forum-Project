<?php

class Post
{
    public static function create($fields = array())
    {
        if (!Database::getInstance()->insert('posts', $fields)) {
            throw new Exception("Unable to create the post.");
        }
    }

    public static function edit($post_id, $title, $content, $image)
    {
        $fields = array(
            'title' => $title,
            'content' => $content,
            'image' => $image
        );
        $where = array(
            'field' => 'post_id',
            'operator' => '=',
            'value' => $post_id
        );
        if (!Database::getInstance()->update('posts', $fields, $where)) {
            throw new Exception("Unable to edit the post.");
        }
        
        Redirect::to('comments.php?post_id=' . $post_id);
    }

    public static function editNoImage($post_id, $title, $content)
    {
        $fields = array(
            'title' => $title,
            'content' => $content,
            'image' => null
        );
        $where = array(
            'field' => 'post_id',
            'operator' => '=',
            'value' => $post_id
        );
        if (!Database::getInstance()->update('posts', $fields, $where)) {
            throw new Exception("Unable to edit the post.");
        }
        
        Redirect::to('comments.php?post_id=' . $post_id);
    }

    public static function getAllPosts()
    {
        $posts = Database::getInstance()->get('posts', array('post_id', '>', '0'));
        //return list of posts
        return $posts;
    }

    public static function getChannelPosts($channel_id)
    {
        $posts = Database::getInstance()->get('posts', array('channel_id', '=', $channel_id));
        //return list of posts
        return $posts;
    }


    public static function getPostById($post_id)
    {
        $post = Database::getInstance()->get('posts', array('post_id', '=', $post_id));
        if ($post->count()) {
            return $post->first();
        }
    }

    // This file creates the post and gets all the posts in a channel and the post by id.
}
