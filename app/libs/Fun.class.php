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
    public function Select($table){
        $users=$this->db->paginate($this->prefix.$table,$this->params['page'],$this->params['pageSize']);
        echo $this->jsonp.'('.json_encode($users).')';
    }
    public function Classify($table){

    }
    public function Insert($table,$data){
        $id=$this->db->insert($this->prefix.$table,$data);
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
    public function Register($table){
        $data=$this->params;
        $data['ip']=$this->publicIp();
        $data['browser']=$this->Browser();
        $data['platform']=$this->GetOs();
        $this->Insert($table,$data);
        $regData=Array(
            'username'=>$data['username'],
            'type'=>'注册',
            'time'=>date('y-m-d h:i:s',time()),
            'ip'=>$this->publicIp()
        );
        $this->Insert('log',$regData);
    }
    public function Check($table){
        $data=$this->getParams();
        foreach($data as $key=>$value){
            $this->db->where($key,$value);
        }
        $id=$this->db->has($this->prefix.$table);
        if($id){
            $result=array(
                'result'=>$id
            );
        }else{
            $result=array(
                'result'=>false
            );
        }
        echo $this->jsonp.'('.json_encode($result).')';
    }
}
$app=new App();
?>