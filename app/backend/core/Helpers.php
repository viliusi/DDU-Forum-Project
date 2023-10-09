<?php

function escape($string)
{
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
} // This is the escape function. It takes a string as a parameter. It then returns the string with all special characters converted to HTML entities.

function autoload($class_name)
{
    if (is_file('app/backend/core/' . $class_name . '.php'))
    {
        require_once 'app/backend/core/' . $class_name . '.php';
    }
    else if
    (is_file('app/backend/classes/' . $class_name . '.php'))
    {
        require_once 'app/backend/classes/' . $class_name . '.php';
    }
}// This is the autoload function. It takes a class name as a parameter. It then checks if the class file exists in the core folder. 
//If it does, it requires it. If it doesn't, it checks if the class file exists in the classes folder. If it does, it requires it.

function cleaner($string)
{
    return ucfirst(preg_replace('/_/', ' ', $string));
} // This is the cleaner function. It takes a string as a parameter. It then replaces all underscores with spaces and capitalizes the first letter of each word. It then returns the result.

function appName()
{
    echo Config::get('app/name');
} // This is the appName function. It echoes the app name from the config file.


