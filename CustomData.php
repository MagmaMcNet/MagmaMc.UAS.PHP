<?php
require_once 'Include.php';

class CustomData 
{
    public string $DevToken = "";
    public string $Token = "";

    public static function GetS(string $DevToken, string $Token, string $Filename): string
    {
        return WebRequest(UASAPI."CustomData.php?DevToken=$DevToken&Filename=$Filename&Token=$Token");
    }
    public static function SetS(string $DevToken, string $Token, string $Filename, string $Data): string
    {
        return WebRequest(UASAPI."CustomData.php?DevToken=$DevToken&Filename=$Filename&Token=$Token");
    }
    public function Get(string $Filename): string
    {
        return WebRequest(UASAPI."CustomData.php?DevToken=".$this->DevToken."&Filename=$Filename&Token=".$this->Token);
    }
    public function Set(string $Filename, string $Data)
    {
       WebRequest(UASAPI."CustomData.php?DevToken=".$this->DevToken."&Filename=$Filename&Token=".$this->Token."&Data=$Data");
    }

    function curl_post_async($url, $params)
    {
        foreach ($params as $key => &$val) {
        if (is_array($val)) $val = implode(',', $val);
            $post_params[] = $key.'='.urlencode($val);
        }
        $post_string = implode('&', $post_params);

        $parts=parse_url($url);

        $fp = fsockopen($parts['host'],
            isset($parts['port'])?$parts['port']:80,
            $errno, $errstr, 30);

        $out = "POST ".$parts['path']." HTTP/1.1\r\n";
        $out.= "Host: ".$parts['host']."\r\n";
        $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out.= "Content-Length: ".strlen($post_string)."\r\n";
        $out.= "Connection: Close\r\n\r\n";
        if (isset($post_string)) $out.= $post_string;

        fwrite($fp, $out);
        fclose($fp);
    }
}