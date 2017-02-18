<?
require_once ("MysqliDb.php");
$prefix = 'admin_';
$db = new MysqliDb ('localhost', 'root', 'root', 'admin');
if(!$db) die("Database error");
$db->setTrace(true);
?>