<?
//error_reporting (E_ALL|E_STRICT);
header('Access-Control-Allow-Origin:*');/*允许跨域访问*/
require_once("libs/fun.php");
// $api=$_GET['api'];
// if(isset($_GET['callback'])){
//   $jsonp=$_GET["callback"];
// }else{
//   $jsonp="callback";
// }
// switch($api){
//   case 'init':
//     init($db,$prefix);
//   break;
//   case 'get_list':
//     $page=$_GET['page'];
//     $pageSize=$_GET['pageSize'];
//     get_list($db,$prefix,$jsonp,'users',$page,$pageSize);
//   break;
// }
$link=new Link();
$link->get_list('users',1);
?>