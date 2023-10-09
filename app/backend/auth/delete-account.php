<?php
require_once 'app/backend/core/Init.php';

$user->deleteMe();

Redirect::to('index.php');
// Deletes the user's account nad redirects the user to the index page.
