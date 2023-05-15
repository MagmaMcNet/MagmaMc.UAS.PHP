<?php  
define('UASAPI', 'http://play.magma-mc.net:5555/Accounts/API/');

/**
 * The function makes a web request to a given URL and returns an HTTP response object.
 * 
 * @param string url The URL of the web page or API endpoint that you want to make a request to.
 * 
 * @return string or null if no response
 */

function WebRequest(string $url): string | null
{
    $response = @file_get_contents($url, false);
    if ($response === false)
        return null;
    $httpStatus = intval(explode(' ', $http_response_header[0])[1]);

    if (($httpStatus >= 200 && $httpStatus < 300)) {
        return $response;
    }

    return null;
}
