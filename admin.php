<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

include_once "models/Page_Data.class.php";
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog demo";
$pageData->addCSS("css/blog.css");
$pageData->addScript("js/editor.js");
//load navigation
$pageData->content = include_once "views/admin/admin-navigation.php";

//DB Connection
$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "eda0fc3e";
$db = new PDO($dbInfo, $dbUser, $dbPassword);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$navigationIsClicked = isset($_GET['page']);
if ($navigationIsClicked) {
    //prepare to load corresponding controller
    $contrl = $_GET['page'];
} else {
    //prepare to load default controller
    $contrl = "entries";
}
//load the controller
$pageData->content .= include_once "controllers/admin/$contrl.php";
$page = include_once "views/page.php";
echo $page;
