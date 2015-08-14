<?php

function controller_main_home(){
	$recordsAndCategories['records'] = Record::getRecords();
	$recordsAndCategories['categories'] = Category::getCategories();
	$recordsAndCategories['links'] = Link::getLinks();
	render('home.php', $recordsAndCategories);
}

function controller_main_manageCategory() {
	$categories['categories'] = Category::getCategories();
	render("manageCategories.php",$categories);
}

