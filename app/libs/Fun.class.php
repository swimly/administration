<?
require_once("MysqliDb.php");
require_once("Tables.php");
class App{
    private $prefix = 'admin_';
    private $db =null;
    private $tables=Array();
    private $jsonp="callback";
    private $params=null;
    function __construct(){
        $this->db=new MysqliDb ('localhost', 'root', 'root', 'admin');
        if(isset($_GET['callback'])){
            $this->jsonp=$_GET["callback"];
        }else{
            $this->jsonp="callback";
        }
        $this->params=$this->getParams();
    }
    public function getParams(){
        $params=Array();
        foreach($_GET as $key=>$value){
            if($key!='api'){
                $params[$key]=$value;
            }
            if($key=='password'){
                $params[$key]=md5($value);
            }
        }
        return $params;
    }
    public function CreateTable($name, $data){
        $this->db->rawQuery("DROP TABLE IF EXISTS $name");
        $q = "CREATE TABLE $name (id INT(9) UNSIGNED PRIMARY KEY AUTO_INCREMENT";
        foreach ($data as $k => $v) {
            $q .= ", $k $v";
        }
        $q .= ")";
        $this->db->rawQuery($q);
    }
    public function Init (){
        global $tables;
        foreach ($tables as $name => $fields) {
            $this->db->rawQuery("DROP TABLE ".$this->prefix.$name);
            $this->CreateTable ($this->prefix.$name, $fields);
            echo ($name.'创建完成！');
        }
    }
    public function GetList($table,$data){
        $users=$this->db->paginate($this->prefix.$table,$this->params['page'],$this->params['pageSize']);
        echo $this->jsonp.'('.json_encode($users).')';
    }
    public function Register($table){
        $id=$this->db->insert($this->prefix.$table,$this->params);
        if($id){
            $result=array(
                'id'=>$id
            );
        }else{
            $result=array(
                'id'=>null
            );
        }
        echo $this->jsonp.'('.json_encode($result).')';
    }
    public function Login($table){
        $data=$this->getParams();
        var_dump($data);
        foreach($data as $key=>$value){
            if($key=='password'){
               $this->db->where($key,md5($value)); 
            }else{
                $this->db->where($key,$value);
            }
        }
        $result=$this->db->get($this->prefix.$table);
        var_dump($result);
    }
}
$app=new App();
?>