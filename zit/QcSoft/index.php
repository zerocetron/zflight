<?php
require '../../vendor/autoload.php';
$database = new medoo([
    'database_type' => 'mysql',
    'database_name' => 'we7',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'charset' => 'utf8'
]);

$database2 = new medoo([
    'database_type' => 'mssql',
    'database_name' => 'zdata',
    'server' => '183.3.135.77',
    'port' => '8899',
    'username' => 'fsuser',
    'password' => 'abc123',
    'charset' => 'utf8'
]);
 

Flight::set('db2', $database2);
Flight::set('db', $database);


$qcmember = new zit\qcsoft\QcMember();
//var_dump($qcmember->getMemberList());
//var_dump($qcmember->syncMembers(1));
var_dump($qcmember->getMemberInfo('00000701'));

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
//   echo 'hello world!<hr>';
});

//也不过是定义一下就可以了
Flight::view()->path = __DIR__. '/admin/views';

Flight::route('/zflight/zit/qcsoft/@c(/@a)', function($c, $a){
		$ctrl = "zit\\qcsoft\\admin\\controllers\\" . ucfirst($c);
		Flight::register('controller', $ctrl);
		$a || $a = 'index';
		$qcmember = Flight::controller()->{$a}();
});

//
//
//$pozen = new zit\Pozen();
//
//Flight::route('/@name/@id', function($name, $id){
//    echo "hello, $name ($id)!<hr>";
//});
//
//Flight::route('/@name/@id/base64', function($name, $id){
//    echo base64_encode("hello, $name ($id)!<hr>");
//});

Flight::start();
?>
