<?
//error_reporting (E_ALL|E_STRICT);
header('Access-Control-Allow-Origin:*');/*允许跨域访问*/
require_once ("libs/MysqliDb.php");
require_once("libs/tables.php");
require_once("libs/fun.php");
$prefix = 'admin_';
$db = new MysqliDb ('localhost', 'root', 'root', 'admin');
if(!$db) die("Database error");
$db->setTrace(true);
$api=$_GET['api'];
if(isset($_GET['callback'])){
  $jsonp=$_GET["callback"];
}else{
  $jsonp="callback";
}
switch($api){
  case 'init':
    init($db,$tables,$prefix);
  break;
  case 'get_list':
    get_list($db,$tables,$prefix,$jsonp,'users');
  break;
}
?>