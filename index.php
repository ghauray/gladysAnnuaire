<?php

header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ALL ^ E_NOTICE);

require './model/Bdd.php';
require './model/ModelRecord.php';
require './model/ModelCategory.php';
require './model/ModelLink.php';

require './controller/ControllerMain.php';
require './controller/ControllerRecord.php';
require './controller/ControllerCategory.php';
require './controller/ControllerLink.php';

function render($view, $vars=array()){
	extract($vars);
	ob_start();
	include "./view/".$view."";
	$content = ob_get_clean();
	include "./view/layout.php";
}

switch($_GET['uri']){
	case '/home':
		$view = controller_main_home();
		break;
	case '/manageCategories':
		$view = controller_main_manageCategory();
		break;
	case '/addRecord':
		$view = ctrl_record_add($_POST);
		break;
	case '/editRecord':
		$view = ctrl_record_edit($_POST);
		break;
	case '/delRecord':
		$view = ctrl_record_del($_GET['id']);
		break;
	case '/record':
		$view = ctrl_record_detail($_GET['id']);
		break;
	case '/addCategory':
		$view = ctrl_category_add($_POST);
		break;
	case '/editCategory':
		$view = ctrl_category_edit($_POST);
		break;
	case '/delCategory':
		$view = ctrl_category_del($_GET['id']);
		break;
	case '/resolveDelete':
		$view = ctrl_category_resolveDelete($_POST);
		break;
	default:
		echo '404';
		break;
}
