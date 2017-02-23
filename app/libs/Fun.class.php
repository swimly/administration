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
            if($key=='api' || $key=='table' || $key=='id' || $key=='callback'){
            }else{
                $params[$key]=$value;
            }
            if($key=='password'){
                $params[$key]=md5($value);
            }
        }
        return $params;
    }
    public function classify(){
        $params=Array();
        foreach($_GET as $key => $value){
            if($key=='api' || $key=='page' || $key=='pageSize' || $key=='table' || $key=='id' || $key=='callback'){
                
            }else{
                $params[$key]=$value;
            }
        }
        return $params;
    }
    public function getTable(){
        $table='';
        foreach($_GET as $key => $value){
            if($key=='table'){
                $table=$value;
            }
        }
        return $table;
    }
    public function publicIp(){
        // $ch = curl_init('http://www.ip138.com/ip2city.asp');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $a  = curl_exec($ch);
        // preg_match('/[(.*)]/', $a, $ip);
        // return $a; 
        global $ip;
        if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }
    public function Browser(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){  
            $br = $_SERVER['HTTP_USER_AGENT'];  
            if (preg_match('/MSIE/i',$br)) {      
                $br = 'MSIE';  
            }elseif (preg_match('/Firefox/i',$br)) {  
                $br = 'Firefox';  
            }elseif (preg_match('/Chrome/i',$br)) {  
                $br = 'Chrome';  
            }elseif (preg_match('/Safari/i',$br)) {  
                $br = 'Safari';  
            }elseif (preg_match('/Opera/i',$br)) {  
                $br = 'Opera';  
            }else {  
                $br = '其他';  
            }  
            return $br;  
        }else{
            return "获取浏览器信息失败！";
        }
    }
    public function GetOs(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){  
            $OS = $_SERVER['HTTP_USER_AGENT'];  
            if (preg_match('/win/i',$OS)) {  
                $OS = 'Windows';  
            }elseif (preg_match('/mac/i',$OS)) {  
                $OS = 'MAC';  
            }elseif (preg_match('/linux/i',$OS)) {  
                $OS = 'Linux';  
            }elseif (preg_match('/unix/i',$OS)) {  
                $OS = 'Unix';  
            }elseif (preg_match('/bsd/i',$OS)) {  
                $OS = 'BSD';  
            }else {  
                $OS = '其他';  
            }  
            return $OS;    
        }else{
            return "获取访客操作系统信息失败！";
        }  
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
    public function Select($condition){
        foreach($condition as $key => $value){
            $this->db->where($key,$value);
        }
        $users=$this->db->paginate($this->prefix.$this->getTable(),$this->params['page'],$this->params['pageSize']);
        return $this->jsonp.'('.json_encode($users).')';
    }
    public function Like($condition){
        $page=$this->params['page'];
        $pageSize=$this->params['pageSize'];
        $Last=end($condition);
        $q="select * from ".$this->prefix.$this->getTable()." where ";
        foreach($condition as $k=>$v){
            $q.="$k LIKE '%".$v."%' and ";
            if($Last===$v){
                $q.="$k LIKE '%".$v."%' ";
            }
        }
        $q.="LIMIT $page,$pageSize";
        $result=$this->db->rawQuery($q);
        echo $q;
        return $result;
        // $users=$this->db->paginate($this->prefix.$this->getTable(),$this->params['page'],$this->params['pageSize']);
        // return $this->jsonp.'('.json_encode($users).')';
    }
    public function Count($condition){
        foreach($condition as $key => $value){
            $this->db->where($key,$value);
        }
        $users=$this->db->get($this->prefix.$this->getTable());
        $result=array(
            'count'=>$this->db->count
        );
        return $this->jsonp.'('.json_encode($result).')';
    }
    public function Insert(){
        $id=$this->db->insert($this->prefix.$this->getTable(),$this->params);
        if($id){
            $result=array(
                'id'=>$id
            );
        }else{
            $result=array(
                'id'=>null
            );
        }
        return $this->jsonp.'('.json_encode($result).')';
    }
    public function Edit(){
        $this->db->where('id',$_GET['id']);
        $res=$this->db->update($this->prefix.$this->getTable(),$this->params);
        if($res){
            $result=array(
                'res'=>$res
            );
        }else{
            $result=array(
                'res'=>false
            );
        }
        return $this->jsonp.'('.json_encode($result).')';
    }
    public function Delete(){
        $this->db->where('id',$_GET['id']);
        if($this->db->delete($this->prefix.$this->getTable())){
            $result=array(
                'res'=>true
            );
        }else{
            $result=array(
                'res'=>false
            );
        }
        return $this->jsonp.'('.json_encode($result).')';
    }
    public function Check(){
        $data=$this->getParams();
        foreach($data as $key=>$value){
            $this->db->where($key,$value);
        }
        $id=$this->db->has($this->prefix.$this->getTable());
        if($id){
            $result=array(
                'result'=>$id
            );
        }else{
            $result=array(
                'result'=>false
            );
        }
        return $this->jsonp.'('.json_encode($result).')';
    }
}
$app=new App();
?>