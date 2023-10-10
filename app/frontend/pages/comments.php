<div class="container">
    <div class="row">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1><?php echo $post->title; ?></h1>

            <p> <?php echo $post->content; ?> </p>

            <h3>The Comment Section</h3>

            <form action="" method="post">
                <div class="form-group">
                    <label for="content"></label>
                    <input type="text" class="form-control" id="content" placeholder="Comment" name="content">
                </div>
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                <input type="submit" class="btn-register" value="Post comment">
                <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
            </form>
            <?php
            if ($comments->count()) {
                foreach ($comments->results() as $c) {
                    echo '<div class="alert alert-info">' . $c->created_at . ' ' . '<strong>' . (new User($c->user_id))->data()->username . '</strong>: ' . $c->content . '</div>';
                    ?> <form action="" method="post">
                    <input type="hidden" name="comment_id" value="<?php echo $c->id; ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <input type="submit" class="btn-register" value="Delete">
                    <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
                </form> <?php
                }
            } else {
                echo '<div class="alert alert-danger"><strong></strong>No comments found!</div>';
            }
            ?>
        </div>
    </div>
</div>
<!--This file is the comments file. It is included in all the pages. It contains the comments of the page.-->