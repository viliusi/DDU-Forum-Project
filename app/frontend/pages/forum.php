<div class="container">
    <div class="d-flex justify-content-center">
        <div class="jumbotron text-center" style="margin-bottom:0">
            <h1>Channel Overview</h1>
            <p>Here you can see all the channels.</p>

            <?php

            if ($channels->count()) {
                foreach ($channels->results() as $channel) {
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">' . $channel->name . '</h4>';
                    echo '<p class="card-text">' . $channel->description . '</p>';
                    echo '<a href="posts.php?id=' . $channel->channel_id . '" class="btn btn-light">View Channel</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="alert alert-danger"><strong></strong>No channels found!</div>';
            }
            ?>


        </div>
    </div>
</div>
<!--This file is the channels file. It is included in all the pages in the forum. It contains the channels of the page.-->