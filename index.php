<?php
require 'vendor/autoload.php';
//require 'flight/Flight.php';
//// Initialize
//$database = new medoo([
//    'database_type' => 'mysql',
//    'database_name' => 'we7',
//    'server' => 'localhost',
//    'username' => 'root',
//    'password' => 'root',
//    'charset' => 'utf8'
//]);
//
//$database->insert('ims_account', [
//	'uniacid' => 2,
//	'hash' => 'xxx',
//	'type' => 0,
//	'isconnect' => 0,
//	'isdeleted' => 1
//]);
//
//$datas = $database->select('ims_account', '*');
//var_dump($datas);

Flight::route('/', function(){
    echo 'hello world!<hr>';
});

Flight::render('header', array('heading' => 'Hello World'), 'header_content');
Flight::render('body', array('body' => var_export(@$datas, true)), 'body_content');
Flight::render('layout', array('title' => 'Home Page'));

$pozen = new zit\Pozen();

Flight::route('/@name/@id', function($name, $id){
    echo "hello, $name ($id)!<hr>";
});

Flight::route('/@name/@id/base64', function($name, $id){
    echo base64_encode("hello, $name ($id)!<hr>");
});

Flight::start();
?>
