<div class="container">
    <div class="row">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Posts Overview in the <?php echo $channel->name; ?> channel</h1>

            <?php
            echo '<a href="create-post.php?channel_id=' . $channel_id . '" class="btn btn-primary">Create Post</a>';

            $category = Input::get('category');

            if (Input::exists('post')) {
                $category = Input::get('category');
                Redirect::to('posts.php?channel_id=' . $channel_id . '&category=' . $category);
            }
            
            echo '<form method="post">';
            echo '<div class="form-group">';
            echo '<label for="category">Sort by:</label>';
            echo '<select class="form-control" id="category" name="category">';
            echo '<option value="1" ' . ($category == 1 ? 'selected' : '') . '>New to old</option>';
            echo '<option value="2" ' . ($category == 2 ? 'selected' : '') . '>Old to new</option>';
            echo '<option value="3" ' . ($category == 3 ? 'selected' : '') . '>Highest rating</option>';
            echo '</select>';
            echo '</div>';
            echo '<button type="submit" class="btn btn-primary">Change sort</button>';
            echo '</form>';

            if ($category == 1) {
                // New to old
                $posts = Database::getInstance()->query("SELECT * FROM posts WHERE channel_id = ? ORDER BY created_at DESC", array($channel_id));

            } else if ($category == 2) {
                // Old to new
                $posts = Database::getInstance()->query("SELECT * FROM posts WHERE channel_id = ? ORDER BY created_at ASC", array($channel_id));
            } else if ($category == 3) {
                // Highest rating
                //$posts = Database::getInstance()->query("SELECT * FROM posts WHERE channel_id = ? ORDER BY rating DESC", array($channel_id));
            } else {
                // Default sorting (no category selected)
                $posts = Database::getInstance()->query("SELECT * FROM posts WHERE channel_id = ?", array($channel_id));
            }

            if ($posts->count()) {
                foreach ($posts->results() as $p) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    if ($p->user_id && is_numeric($p->user_id)) {
                        echo '<p class="card-text">' . (new User($p->user_id))->data()->username . '</p>';
                    } else {
                        echo '<p class="card-text">Unknown user</p>';
                    }
                    echo '<h4 class="card-title">' . $p->title . '</h4>';
                    echo '<p class="card-text">' . $p->content . '</p>';
                    echo '<p class="card-text">' . $p->created_at . '</p>';
                    echo '<a href="comments.php?post_id=' . $p->post_id . '" class="btn btn-primary">View Post</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="alert alert-danger"><strong></strong>No posts found!</div>';
            }

            ?>
        </div>
    </div>
</div>

<!--This file is the posts file. It is included in all the pages in the forum. It contains the posts of the page.-->