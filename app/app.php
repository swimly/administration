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
    $condition=$app->classify();
    $app->Select($condition);
  break;
  case 'add':
    $app->Insert(function(){
      
    });
  break;
  case 'check':
    $app->Check();
  break;
  case 'edit':
    $app->Edit(function(){});
  break;
}
?>