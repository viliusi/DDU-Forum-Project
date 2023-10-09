<?php

class Cookie
{
    public static function exists($name)
    {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    public static function put($name, $value, $expiry)
    {
        if(setcookie($name, $value, time() + $expiry, '/'))
        {

            return true;
        }

        return false;
    }

    public static function delete($name)
    {
        unset($_COOKIE[$name]);
        setcookie($name, '', time() -3600, '/');
    }
    // This method checks if the cookie exists and if it does, it returns the value of the cookie. If it doesn't exist, it returns false.
}