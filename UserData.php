<?php
require_once 'Include.php';
class UserData
{
    public static function Login(string $Callback)
    {
        if (!isset($_COOKIE["Token"]))
            return header("Location: https://accounts.magma-mc.net/Account.php?login&Callback=$Callback");
        if (UserData->GetUserData($_COOKIE["Token"]) == null)
            return header("Location: https://accounts.magma-mc.net/Account.php?login&Callback=$Callback");
    }

    public static function GetUserData(string $Token): string | null
    {
        return WebRequest(UASAPI."UserData.php?Token=".$Token);
    }
    
    public static function GetToken(string $Username, string $Password): string | null
    {
        return WebRequest(UASAPI."Token.php?Username=".$Username."&Password=".$Password);
    }
}
define("UserData", new UserData());
