<?php
include_once 'controllers/MainController.php';
include_once 'controllers/ArticleController.php';
include_once 'services/htmlgenerator.php';
include_once 'models/ArticleModel.php';
/*echo "<pre>";
var_dump($_GET);
echo "</pre>";*/

$act = isset($_GET['act']) ? $_GET['act'] . 'Action' : 'indexAction';

$ctrl = new ArticleController($_GET, $_POST);
$ctrl->$act();