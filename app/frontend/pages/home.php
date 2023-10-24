<div style="margin-top:0px">
    <div class="row">
      <div class="col-sm-8">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
          <div class="table-container">
  <table class="alternative_fixed_header">
    <thead>
      <tr>
        <th><h3>Popular Posts</h3></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Row 1</td>
      </tr>
      <tr>
        <td>Row 2</td>
      </tr>
      <tr>
        <td>Row 3</td>
      </tr>
      <tr>
        <td>Row 4</td>
      </tr>
      <tr>
        <td>Row 5</td>
      </tr>
      <tr>
        <td>Row 6</td>
      </tr>
      <tr>
        <td>Row 7</td>
      </tr>
      <tr>
        <td>Row 8</td>
      </tr>
      <tr>
        <td>Row 9</td>
      </tr>
      <tr>
        <td>Row 10</td>
      </tr>
      <tr>
        <td>Row 11</td>
      </tr>
      <tr>
        <td>Row 12</td>
      </tr>
      <td>Row 1</td>
      </tr>
      <tr>
        <td>Row 2</td>
      </tr>
      <tr>
        <td>Row 3</td>
      </tr>
      <tr>
        <td>Row 4</td>
      </tr>
      <tr>
        <td>Row 5</td>
      </tr>
      <tr>
        <td>Row 6</td>
      </tr>
      <tr>
        <td>Row 7</td>
      </tr>
      <tr>
        <td>Row 8</td>
      </tr>
      <tr>
        <td>Row 9</td>
      </tr>
      <tr>
        <td>Row 10</td>
      </tr>
      <tr>
        <td>Row 11</td>
      </tr>
      <tr>
        <td>Row 12</td>
      </tr>
      
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
        <th><h3>New Posts</h3></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $posts = Database::getInstance()->query("SELECT * FROM posts ORDER BY created_at DESC");
      
      if ($posts->count()) {
        foreach ($posts->results() as $p) {
          echo '<tr>';
          echo '<td>' . (new User($p->user_id))->data()->username . '</td>';
          echo '<td>' . $p->title . '</td>';
          echo '<td>' . $p->created_at . '</td>';
          echo '</tr>';
        }
      } else {
        echo '<div class="alert alert-danger"><strong></strong>No posts found!</div>';
      }
      ?>
        
      <tr>
        <td>Row 1</td>
      </tr>
      <tr>
        <td>Row 2</td>
      </tr>
      <tr>
        <td>Row 3</td>
      </tr>
      <tr>
        <td>Row 4</td>
      </tr>
      <tr>
        <td>Row 5</td>
      </tr>
      <tr>
        <td>Row 6</td>
      </tr>
      <tr>
        <td>Row 7</td>
      </tr>
      <tr>
        <td>Row 8</td>
      </tr>
      <tr>
        <td>Row 9</td>
      </tr>
      <tr>
        <td>Row 10</td>
      </tr>
      <tr>
        <td>Row 11</td>
      </tr>
      <tr>
        <td>Row 12</td>
      </tr>
      <td>Row 1</td>
      </tr>
      <tr>
        <td>Row 2</td>
      </tr>
      <tr>
        <td>Row 3</td>
      </tr>
      <tr>
        <td>Row 4</td>
      </tr>
      <tr>
        <td>Row 5</td>
      </tr>
      <tr>
        <td>Row 6</td>
      </tr>
      <tr>
        <td>Row 7</td>
      </tr>
      <tr>
        <td>Row 8</td>
      </tr>
      <tr>
        <td>Row 9</td>
      </tr>
      <tr>
        <td>Row 10</td>
      </tr>
      <tr>
        <td>Row 11</td>
      </tr>
      <tr>
        <td>Row 12</td>
      </tr>
      <td>Row 1</td>
      </tr>
      <tr>
        <td>Row 2</td>
      </tr>
      <tr>
        <td>Row 3</td>
      </tr>
      <tr>
        <td>Row 4</td>
      </tr>
      <tr>
        <td>Row 5</td>
      </tr>
      <tr>
        <td>Row 6</td>
      </tr>
      <tr>
        <td>Row 7</td>
      </tr>
      <tr>
        <td>Row 8</td>
      </tr>
      <tr>
        <td>Row 9</td>
      </tr>
      <tr>
        <td>Row 10</td>
      </tr>
      <tr>
        <td>Row 11</td>
      </tr>
      <tr>
        <td>Row 12</td>
      </tr>
    </tbody>
  </table>
</div>

      </div>
    </div>
  </div>
  <!-- This file is the home file. It is included in all the pages. It contains the home of the page. -->