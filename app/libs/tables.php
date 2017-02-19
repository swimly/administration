<?
$tables = Array (
    'users' => Array (
        'login' => 'char(10)',
        'number'=> 'char(6)',
        'username'=> 'char(10) not null',
        'face'=> 'char(30)',
        'address'=> 'char(50)',
        'phone'=> 'char(11)',
        'QQ'=> 'char(12)',
        'email'=> 'char(30)',
        'sex'=> 'int(1)',
        'wechat'=> 'char(15)',
        'depart'=> 'int(2)',
        'position'=> 'int(2)',
        'name'=> 'char(10)',
        'password'=> 'char(50)',
        'regTime'=> 'datetime',
        'joinTime'=> 'datetime',
        'birthday'=> 'datetime',
        'expires' => 'datetime',
        'loginCount' => 'int(10) default 0',
        'unique key' => 'login (login)'
    )
);
?>