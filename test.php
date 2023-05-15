<?php
include 'MagmaMc.UAS.php';

$CD = new CustomData();
$CD->DevToken = "Public_Test02.DevToken";
$CD->Token = UserData->GetToken("testaccount", "testaccount");
$CD->Set("test1", "l");
echo var_dump($_REQUEST);