<?php
namespace zit\QcSoft\admin\controllers;

use Flight;

class Settings{

	public function index()
	{
		Flight::render('header', array('heading' => 'Hello World'), 'header_content');
		Flight::render('settings', array('body' => var_export(@$datas, true)), 'body_content');
		Flight::render('layout', array('title' => 'Home Page'));
	}

}
