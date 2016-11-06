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
 
//        $dbName = "sqlsrv:Server=183.3.135.77,8899;Database=zdata";   
//        $dbUser = "fsuser";   
//        $dbPassword = "abc123";   
//        $db = new PDO($dbName, $dbUser, $dbPassword);       
//        if ($db)   
//        {       
//                  echo "database connect succeed.<br />";   
//        }
//  exit;
$database2 = new medoo([
    'database_type' => 'mssql',
    'database_name' => 'zdata',
    'server' => '183.3.135.77',
	'port' => '8899',
    'username' => 'fsuser',
    'password' => 'abc123',
    'charset' => 'utf8'
]);
Flight::set('db', $database);
Flight::set('db2', $database2);


$qcmember = new zit\QcSoft\QcMember();
var_dump($qcmember->getMemberList());
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
   echo 'hello world!<hr>';
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
