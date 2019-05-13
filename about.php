<?php 

// Get Langage
include('./lang/default.php');

$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if(file_exists("./lang/{$lang}.php"))
    include("./lang/{$lang}.php");

if (isset($_GET['lng'])){
    $lang = $_GET['lng'];
    if(file_exists("./lang/{$lang}.php")){
        include("./lang/{$lang}.php");
    };
};

//VARS
$HTMLPage = "";


// Basic Instinct
if(!file_exists("./TPL_about.html"))
    die("Error - Model Page Doesn't Exist !");
else
    $HTMLPage = file_get_contents('./TPL_about.html');


// TRANSLATE !
foreach ($UNISHARE_LNG as $LNG_Key => $LNG_Val)
{
    $HTMLPage = str_replace("%".$LNG_Key."%",$LNG_Val,$HTMLPage);
}


// RUN
echo($HTMLPage);

?>