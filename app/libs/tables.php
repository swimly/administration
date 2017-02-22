<?
$tables = Array (
    'users' => Array (
        'login' => 'char(10)',
        'number'=> 'char(6)',
        'username'=> 'char(16)',
        'face'=> 'char(30)',
        'address'=> 'char(50)',
        'phone'=> 'char(11)',
        'QQ'=> 'char(12)',
        'email'=> 'char(30)',
        'sex'=> 'int(1) default 0',
        'wechat'=> 'char(15)',
        'depart'=> 'int(2) default 0',
        'position'=> 'int(2) default 0',
        'name'=> 'char(10)',
        'password'=> 'char(16)',
        'ip'=>'char(15)',
        'platform'=>"char(20)",
        'browser'=>'char(20)',
        'regAddress'=>'char(10)',
        'address'=>'char(40)',
        'regTime'=> 'datetime',
        'joinTime'=> 'datetime',
        'birthday'=> 'datetime',
        'expires' => 'datetime',
        'loginCount' => 'int(10) default 0',
        'unique key' => 'login (login)'
    ),
    'projects'=>Array(
        'title'=>'char(30)',
        'author'=>'char(10)',
        'join'=>'char(100)',
        'startTime'=>'datetime',
        'endTime'=>'datetime',
        'cover'=>'char(50)',
        'file'=>'char(50)',
        'github'=>'char(40)',
        'preview'=>'char(50)',
        'classify'=>'int(2) default 0',
        'tag'=>'char(50)',
        'see'=>'int(6) default 0',
        'download'=>'int(6) default 0'
    ),
    'log'=>Array(
        'username'=>'char(10) not null',
        'type'=>'char(10)',
        'time'=>'datetime',
        'ip'=>'char(20)'
    )
);
?>