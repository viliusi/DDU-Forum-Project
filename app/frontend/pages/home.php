<div style="margin-top:0px">
  <div class="row">
    <div class="col-sm-8">
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <div class="table-container">
            <table class="alternative_fixed_header">
              <thead>
                <tr>
                  <th>
                    <h3>Popular Posts</h3>
                  </th>
                </tr>
              </thead>
              <tbody>
                <!--Dette er bare ældste posts først da der endnu ikke er et rating system-->
                <?php
                $posts = Database::getInstance()->query("SELECT * FROM posts ORDER BY created_at ASC");

                if ($posts->count()) {
                  foreach ($posts->results() as $p) {
                    echo '<tr>';
                    echo '<td>';
                    echo '<div class="post-container">';
                    echo '<div class="post-name-title">' . (new User($p->user_id))->data()->username . ' - <span>' . $p->title . '</span></div>'; // Wrap the title and hyphen in a span
                    echo '<div class="post-content">' . $p->content . '</div>';
                    echo '<div class="post-image"><img src="' . $p->image . '" alt="" width=30%></div>';
                    echo '<div class="post-footer">';
                    echo '<div class="post-date">' . $p->created_at . '</div>';
                    echo '<a href="comments.php?post_id=' . $p->post_id . '" class="btn btn-light">&#x1F5E8;</a>';
                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<div class="alert alert-danger"><strong></strong>No posts found!</div>';
                }
                ?>



              </tbody>
              </tbody>
            </table>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
    <div class="col-sm-4">
      <div class="table-container">
        <table class="fixed_header">
          <thead>
            <tr>
              <th>
                <h3>New Posts</h3>
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $posts = Database::getInstance()->query("SELECT * FROM posts ORDER BY created_at DESC");

            if ($posts->count()) {
              foreach ($posts->results() as $p) {
                echo '<tr>';
                echo '<td style:"width: 100%">';
                echo '<div class="post-tr" style="display: block;">';
                echo '<div class="post-container">';
                echo '<div class="post-name-title">' . (new User($p->user_id))->data()->username . ' - <span>' . $p->title . '</span></div>'; // Wrap the title and hyphen in a span
                echo '<div class="post-content">' . $p->content . '</div>';
                echo '<div class="post-footer">';
                echo '<div class="post-date">' . $p->created_at . '</div>';
                echo '<a href="comments.php?post_id=' . $p->post_id . '" class="btn btn-light">&#x1F5E8;</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</td>';
                echo '</tr>';
              }
            } else {
              echo '<div class="alert alert-danger"><strong></strong>No posts found!</div>';
            }
            ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>
<!-- This file is the home file. It is included in all the pages. It contains the home of the page. -->