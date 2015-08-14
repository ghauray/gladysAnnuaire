<?php

function ctrl_record_add($entries){
	$record = new Record();
	$record->saveRecord($entries);
	header('Location: home');
}

function ctrl_record_del($id){
	$record = new Record();
	$record->getRecord($id);
	$record->deleteRecord();
	header('Location: home');
}

function ctrl_record_detail($id) {
	$record['record'] = new Record();
	$record['record']->getRecord($id);
	render('detail.php', $record);
}

function ctrl_record_edit($entries) {
	$record['record'] = new Record();
	$record['record']->editRecord($entries);
	render('detail.php', $record);
}