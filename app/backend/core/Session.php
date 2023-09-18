<?php

class Session
{

    public static function exists($name)
    {
        return (isset($_SESSION[$name])) ? true : false;
    } // It then checks if the name exists in the $_SESSION array. If it does, it returns true. If it doesn't, it returns false.

    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    } // It then sets the name in the $_SESSION array to the value.

    public static function get($name)
    {
        return $_SESSION[$name];
    } // This is the get method. It returns the name from the $_SESSION array.

    public static function delete($name)
    {
        if(self::exists($name))
        {
            unset($_SESSION[$name]);
        }
    } // It then checks if the name exists in the $_SESSION array. If it does, it unsets the name from the $_SESSION array.

    public static function flash($name, $string = '')
    {
        if(self::exists($name))
        {
            $session = self::get($name);
            self::delete($name);
            return $session;
        }
        else
        {
            self::put($name, $string);
        }
    } // It checks if the name exists in the $_SESSION array.
}