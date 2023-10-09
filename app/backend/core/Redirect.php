<?php

class Redirect
{
    public static function to($location = null)
    {
        if ($location) {
            if (is_numeric($location)) {
                switch ($location) {
                    case 404:
                        header('HTTP/1.0 404 Not Found');
                        include FRONTEND_INCLUDE_ERROR . '404.php';
                        exit();
                        break;
                }
            }
            header('Location: ' . $location);
            exit();
        }
    } // This is the to method. It takes a location as a parameter. It then checks if the location is numeric. If it is, it checks if the location is 404. If it is, it sets the header to 404 and includes the 404 page. 
    //It then exits the script. If it isn't, it sets the header to the location and exits the script. If the location is not numeric, it sets the header to the location and exits the script.
}
