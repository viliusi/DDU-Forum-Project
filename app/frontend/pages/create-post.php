<div class="container" style="padding-top: 5%; padding-bottom: 5%;">
    <?php
    if (isset($_GET['post_id'])) {
        $heading = 'Edit Post "' . $_GET['post_id'] . '"';
    } else {
        $heading = 'Create Post';
    }
    ?>
    <h2><?php echo $heading; ?></h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="name">Title :</label>
            <input type="text" class="form-control" id="title" placeholder="Enter name for the post" name="title" value="<?php echo escape(Input::get('title')); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <input type="text" class="form-control" id="content" placeholder="Enter a description" name="content" value="<?php echo escape(Input::get('content')); ?>">
        </div>
        <div class="form-group">
            <label for="description">Images :</label>
            <input type="text" class="form-control" id="image" placeholder="Insert an image source link (optional)" name="image" value="<?php echo escape(Input::get('image')); ?>">
        </div>
        <input type="submit" class="btn-register" value="<?php echo $heading; ?>">
        <input type="hidden" name="csrf_token" value="<?php echo Token::generate(); ?>">
    </form>
</div>
<!--This file is the create-post file. It is included in all the pages. It contains the create-post of the page and the form to create a post.-->