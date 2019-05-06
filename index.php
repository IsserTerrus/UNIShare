<?php
/*
UNISHARE - Create by IsserTerrus (https://blog.teddybeard.eu)
Licence MIT - See LICENCE
*/

//Get Config
require_once('./config.php');

// Get Langage
include('./lang/default.php');
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if(file_exists("./lang/{$lang}.php"))
    include("./lang/{$lang}.php");

//VARS
$HTMLPage = "";
$VAR_URL = "";
$VAR_TEXT = "";
$VAR_TITLE = $UNISHARE_LNG["ALERT_No_Title"];

// Basic Instinct
if(!file_exists("./TPL_index.html"))
    die("Error - Model Page Doesn't Exist !");
else
    $HTMLPage = file_get_contents('./TPL_index.html');

// -- INDEX PAGE --

if(isset($_GET['url']))
{
   $VAR_URL =  $_GET['url'];
}

if(isset($_GET['text']))
{
    $VAR_TEXT = $_GET['text'];
}

if(isset($_GET['title']))
{
    $VAR_TITLE = $_GET['title'];
}

// TRANSLATE !
foreach ($UNISHARE_LNG as $LNG_Key => $LNG_Val)
{
    $HTMLPage = str_replace("%".$LNG_Key."%",$LNG_Val,$HTMLPage);
}
// RUN
echo($HTMLPage);

?>
