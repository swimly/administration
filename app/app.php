<?
error_reporting (E_ALL|E_STRICT);
header('Access-Control-Allow-Origin:*');/*允许跨域访问*/
require_once("libs/Fun.class.php");
$api=$_GET['api'];
switch($api){
  case 'init':
    $app->Init();
  break;
  case 'get_list':
    $app->getList('users');
  break;
  case 'register':
    $app->Register('users');
  break;
  case 'login':
    $app->Login('users');
  break;
}
?>