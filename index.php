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
$UNISHARE_LNG['VAR_URL'] = "";
$UNISHARE_LNG['VAR_TEXT'] = "";
$UNISHARE_LNG['VAR_TITLE'] = $UNISHARE_LNG["ALERT_No_Title"];


$UNISHARE_LNG['VAR_InstanceUser'] = urldecode($_COOKIE["yourInstance"]);



// Basic Instinct
if(!file_exists("./TPL_index.html"))
    die("Error - Model Page Doesn't Exist !");
else
    $HTMLPage = file_get_contents('./TPL_index.html');

// -- INDEX PAGE --

if(isset($_GET['url']))
{
    $UNISHARE_LNG['VAR_URL'] =  $_GET['url'];
}
else
{
    $UNISHARE_LNG['VAR_URL'] = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";
}

if($UNISHARE_LNG['VAR_URL'] == "")
{
    //Valeur par défaut - Notre Site ! 
    $UNISHARE_LNG['VAR_URL'] = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'];
}

if(isset($_GET['text']))
{
    $UNISHARE_LNG['VAR_TEXT'] = $_GET['text'];
}

if(isset($_GET['title']))
{
    $UNISHARE_LNG['VAR_TITLE'] = $_GET['title'];
}
else{
    if(isset($_GET['text']))
{
    $UNISHARE_LNG['VAR_TITLE'] = $_GET['text'];
}
}

// TRANSLATE !
foreach ($UNISHARE_LNG as $LNG_Key => $LNG_Val)
{
    $HTMLPage = str_replace("%".$LNG_Key."%",$LNG_Val,$HTMLPage);
}
// RUN
echo($HTMLPage);

?>
