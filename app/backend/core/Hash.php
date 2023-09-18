<?php

class Hash
{
    public static function make($string, $salt = null)
    {
        if ($salt === null) {
            $salt = self::salt();
        }

        return hash(Config::get('hash/algo_name'), $string . $salt);
    } // This is the make method. It takes a string and a salt as parameters. If the salt is null, it generates a new salt. It then hashes the string and salt together and returns the result.

    public static function salt($length = 32)
    {
        return bin2hex(random_bytes($length));
    } // This is the salt method. It takes a length as a parameter. It generates a random string of bytes and converts it to hexadecimal. It then returns the result.

    public static function unique()
    {
        return self::make(uniqid());
    } // This is the unique method. It generates a unique id and hashes it. It then returns the result.
}
