<?
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
function init($db,$tables,$prefix){
    foreach ($tables as $name => $fields) {
        $db->rawQuery("DROP TABLE ".$prefix.$name);
        createTable ($prefix.$name, $fields);
        echo ($name.'创建完成！');
    }
}
?>