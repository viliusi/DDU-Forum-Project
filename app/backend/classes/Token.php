<?php

class Token
{
    public static function generate()
    {
        return Session::put(Config::get('session/token_name'), Hash::make(uniqid()));
    }

    public static function check($token)
    {
        $tokenName = Config::get('session/token_name');

        if(Session::exists($tokenName) && $token === Session::get($tokenName))
        {
            return true;
        }

        return false;
    } // This method checks if the token exists in the session and if it matches the token that was passed in.
}