<?php

function ctrl_link_add($entries){
	$link = new Link();
	$link->saveLink($entries);
	header('Location: home');
}

function ctrl_link_del($id){
	$link = new Record();
	$link->getLink($id);
	$link->deleteLink();
	header('Location: home');
}

function ctrl_link_edit($entries) {
	$link['link'] = new Link();
	$link['link']->editLink($entries);
	//render('detail.php', $link);
}