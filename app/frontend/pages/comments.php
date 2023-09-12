<div class="container">
    <div class="row">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Post title: <?php echo $post->title; ?></h1>
            <h2>The Comment Section</h1>

                <?php

                if ($comments->count()) {
                    foreach ($comments->results() as $c) {
                    }
                } else {
                    echo '<div class="alert alert-danger"><strong></strong>No comments found!</div>';
                }
                ?>
        </div>
    </div>
</div>