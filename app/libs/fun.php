<?
require_once("MysqliDb.php");
require_once("tables.php");
class Link{
    private $prefix = 'admin_';
    private $db =null;
    function __construct(){
        $this->db=new MysqliDb ('localhost', 'root', 'root', 'admin');
    }
    public function init (){
        echo ($this->prefix);
    }
    public function get_list($table,$page){
        $users=$this->db->paginate($this->prefix.$table,$page);
        print_r($users);
        //echo $jsonp.'('.json_encode($users).')';
    }
}
function createTable ($name, $data) {
    global $db;
    //$q = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY NOT NULL";
    $db->rawQuery("DROP TABLE IF EXISTS $name");
    $q = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT";
    foreach ($data as $k => $v) {
        $q .= ", $k $v";
    }
    $q .= ")";
    $db->rawQuery($q);
}
function init($db,$prefix){
    foreach ($tables as $name => $fields) {
        $db->rawQuery("DROP TABLE ".$prefix.$name);
        createTable ($prefix.$name, $fields);
        echo ($name.'创建完成！');
    }
}
function get_list($db,$prefix,$jsonp,$table,$page,$pageSize){
    /*
        $db,$tables,$prefix
    */
    $users=$db->paginate($prefix.$table,$page);
    echo $jsonp.'('.json_encode($users).')';
}

?>