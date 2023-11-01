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

            <hr>

            <h3 >Forum Rules and Guidelines</h3>

            <h6>Welcome to our interactive online forum for game developers, where creativity and collaboration thrive. To ensure a positive and respectful environment for all users, we have established the following rules and guidelines for using our platform effectively:</h6>
            
            <br>
            
            <h5 class="text-left">1. Respectful Communication</h5>
            <p class="text-left">Be courteous and respectful towards fellow forum members. Treat others as you would like to be treated.<br>
            Avoid offensive language, hate speech, or personal attacks. Maintain a constructive tone in your discussions.</p>
            <h5 class="text-left">2. Content Relevance</h5>
            <p class="text-left">Ensure your posts and comments are relevant to the topic and category of the discussion. Off-topic posts may be removed.<br>
            Do not spam the forum with advertisements, promotions, or unrelated content.</p>
            <h5 class="text-left">3. User Accountability</h5>
            <p class="text-left">Users are required to create an account and log in to participate in discussions. This helps maintain accountability for your actions and promotes responsible behavior.<br>
            Do not impersonate others or create multiple accounts to manipulate discussions.</p>
            <h5 class="text-left">4. Moderation and Reporting</h5>
            <p class="text-left">Moderators are present to ensure a safe environment. Please report any inappropriate behavior, content, or violations of these rules.<br>
            Respect and follow the instructions given by moderators. Their decisions are final.</p>
            <h5 class="text-left">5. Privacy and Security</h5>
            <p class="text-left">Protect your personal information. Do not share sensitive data such as addresses, phone numbers, or financial details. <br>
            Use caution when clicking on external links. Verify the source before accessing unfamiliar websites.</p>
        </div>
    </div>
</div>
<!--This file is the channels file. It is included in all the pages in the forum. It contains the channels of the page.-->