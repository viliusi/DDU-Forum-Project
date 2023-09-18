<?php
require_once 'app/backend/core/Init.php';

$user->logout();

Redirect::to('index.php');
// Logs the user out and redirects back to the index page.