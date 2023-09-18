<?php

class Password
{
    public static function hash($password)
    {
        return password_hash(
            $password,
            Config::get('password/algo_name'),
            array(
                'cost' => Config::get('password/cost')
            )
        );
    } // This is the hash method. It takes a password as a parameter. It then hashes the password and returns the result.

    public static function check($password, $hash)
    {
        return password_verify($password, $hash);
    } //It takes a password and a hash as parameters. It then checks if the password matches the hash. If it does, it returns true. If it doesn't, it returns false.

    public static function getInfo($hash)
    {
        return password_get_info($hash);
    } // This is the getInfo method. It takes a hash as a parameter. It then returns an array of information about the hash.
}
