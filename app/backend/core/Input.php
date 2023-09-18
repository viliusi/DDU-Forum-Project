<?php

class Input
{
    public static function exists($type = 'POST')
    {
        switch ($type) {
            case 'POST':
                return (!empty($_POST)) ? true : false;
                break;

            case 'get':
                return (!empty($_GET)) ? true : false;
                break;

            default:
                return false;
                break;
        }
    } // This is the exists method. It takes a type as a parameter. It then checks if the type is POST or GET. If it is POST, it checks if the $_POST array is empty. 
    //If it is GET, it checks if the $_GET array is empty. If it is neither, it returns false.

    public static function clear()
    {
        $_POST = array();
        $_GET = array();
    } // This is the clear method. It clears the $_POST and $_GET arrays.

    public static function get($item)
    {
        if (isset($_POST[$item])) {
            return $_POST[$item];
        } elseif (isset($_GET[$item])) {
            return $_GET[$item];
        }
        return '';
    } // This is the get method. It takes an item as a parameter. It then checks if the item exists in the $_POST array. If it does, it returns the item.
}
