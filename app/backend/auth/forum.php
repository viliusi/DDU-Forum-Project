<?php
require_once 'app/backend/core/Init.php';

$data = $user->data();
$channels = Channel::getChannels();
// This file gets the user's data and the channels.
