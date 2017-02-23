<?
//error_reporting(0);
header('Access-Control-Allow-Origin:*');/*允许跨域访问*/
require_once("libs/Fun.class.php");
$api=$_GET['api'];
switch($api){
  case 'init':
    $app->Init();
  break;
  case 'select':
    $condition=$app->classify();
    $value=$app->Select($condition);
    echo $value;
  break;
  case 'add':
    $value=$app->Insert();
    echo $value;
  break;
  case 'check':
    $result=$app->Check();
    echo $result;
  break;
  case 'edit':
    $value=$app->Edit();
    echo $value;
  break;
  case 'delete':
    $value=$app->Delete();
    echo $value;
  break;
  case 'count':
    $condition=$app->classify();
    $value=$app->Count($condition);
    echo $value;
  break;
  case 'like':
    $condition=$app->classify();
    $value=$app->Like($condition);
    echo($value);
  break;
}
?>