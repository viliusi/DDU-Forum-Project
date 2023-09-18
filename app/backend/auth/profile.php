<?php
require_once 'app/backend/core/Init.php';

if (! $user->isLoggedIn())
{
     Redirect::to('index.php');
}

$data = $user->data();
// This file checks if the user is logged in and gets the user's data.

