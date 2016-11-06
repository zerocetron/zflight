<?php
require '../../../vendor/autoload.php';
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'we7',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
]);

Flight::set('db', $database);


Flight::route('/', function(){
		echo 'hello world!<hr>';
});
Flight::route('/zflight/zit/qcsoft/admin/@c(/@a)', function($c, $a){
		$ctrl = "zit\\QcSoft\\admin\\controllers\\" . ucfirst($c);
		Flight::register('controller', $ctrl);
		$a || $a = 'index';
		$qcmember = Flight::controller()->{$a}();
});


Flight::start();
?>
