<?php
require_once 'app/backend/core/Init.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name')))
{
    $hash       = Cookie::get(Config::get('remember/cookie_name'));
    $hashCheck  = Database::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hashCheck->count())
    {
        $user = new User($hashCheck->first()->uid);
        $user->login();
    }
} // This file checks if the remember cookie exists and if the session doesn't exist. 
//If the remember cookie exists and the session doesn't exist, it gets the hash from the remember cookie. It then checks if the hash exists in the database. If it does, it logs the user in.