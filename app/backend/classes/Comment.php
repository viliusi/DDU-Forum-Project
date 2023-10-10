<?php

class Comment
{
    public static function create($fields = array())
    {
        if (!Database::getInstance()->insert('comments', $fields)) {
            throw new Exception("Unable to create the comment.");
        }
    }

    public static function getAllComments($post_id)
    {
        // Assuming $db is your database connection instance
        $db = Database::getInstance()->get('comments', ['post_id', '=', $post_id]);

        // Build the SQL query with a proper JOIN
        $sql = "SELECT * FROM users RIGHT JOIN comments ON comments.user_id = users.uid WHERE comments.post_id = ?";

        // Execute the query with the post_id parameter
        $comments = $db->query($sql, [$post_id]);

        // Return the list of comments
        return $comments;
    }
    // This file creates the comment and gets all the comments in a post.

    public static function deleteComment($comment_id, $user_id)
    {
        if ($comment_id->user_id !== $user_id) {
            throw new Exception("Can't delete a comment you didn't create.");
        }
        else {
            $db = Database::getInstance()->delete('comments', ['id', '=', $comment_id]);
        }
    }
}
