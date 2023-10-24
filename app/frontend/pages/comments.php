<div class="container">
    <div class="row">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h4>Author: <?php echo (new User($post->user_id))->data()->username ?></h4>
            <h5><?php echo $post->created_at ?></h5>
            <h1><?php echo $post->title; ?></h1>

            <p> <?php echo $post->content; ?> </p>

            <?php if ($post->image !== null) { ?>
                <img src="<?php echo $post->image; ?>" width="80%">
            <?php } ?>

            <?php
            if ($post->user_id === $user->data()->uid) { 
                ?>
                <form action="" method="post" name="post delete">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <input type="hidden" name="post_user_id" value="<?php new User($post->user_id) ?>">
                    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
                    <input type="submit" class="btn-register" value="Delete" name="delete">
                </form>
            <?php } ?>
                
            <br>
            <hr>

            <h3>The Comment Section</h3>

            <form action="" method="post" name="post comment">
                <div class="form-group">
                    <label for="content"></label>
                    <input type="text" class="form-control" id="content" placeholder="Comment" name="content">
                </div>
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
                <input type="submit" class="btn-register" value="Post comment" name="post comment">
            </form>
            <?php
            $commentsHotFix = Comment::getAllComments($post_id);
            if ($commentsHotFix->count()) {
                foreach ($comments->results() as $c) {
                    echo '<div class="alert alert-info">' . $c->created_at . ' ' . '<strong>' . (new User($c->user_id))->data()->username . '</strong>: ' . $c->content . '</div>';
                    if ($c->user_id === $user->data()->uid) {
            ?> <form action="" method="post" name="comment delete">
                            <input type="hidden" name="comment_user_id" value="<?php echo (new User($c->user_id))->data()->username ?>">
                            <input type="hidden" name="comment_id" value="<?php echo $c->comment_id; ?>">
                            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                            <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
                            <input type="submit" class="btn-register" value="Delete" name="delete">

                        </form> <?php
                            }
                        }
                    } else {
                        echo '<div class="alert alert-danger"><strong></strong>No comments found!</div>';
                    }
                                ?>
        </div>
    </div>
</div>
<!--This file is the comments file. It is included in all the pages. It contains the comments of the page.-->