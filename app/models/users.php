<?php
/**
 * To make IDEs autocomplete happy
 *
 * @property int id
 * @property string login
 * @property bool active
 * @property string customerId
 * @property string firstName
 * @property string lastName
 * @property string password
 * @property string createdAt
 * @property string updatedAt
 * @property string expires
 * @property int loginCount
 */
class user extends dbObject {
    protected $dbTable = "users";
    protected $dbFields = Array (
        'number' => Array ('int'),
        'username' => Array ('text'),
        'face' => Array ('text'),
        'address' => Array ('text'),
        'phone' => Array ('text'),
        'QQ' => Array ('text'),
        'email'=> Array('text'),
        'sex'=>Array('int'),
        'wechat'=>Array('text'),
        'depart'=>Array('int'),
        'position'=>Array('int'),
        'name'=>Array('text'),
        'password'=>Array('text'),
        'addTime' => Array ('datetime'),
        'enterTime' => Array ('datetime'),
        'birthday' => Array ('datetime'),
        'expires' => Array ('datetime'),
        'loginCount' => Array ('int')
    );
    protected $timestamps = Array ('createdAt', 'updatedAt');
    protected $relations = Array (
        'products' => Array ("hasMany", "product", 'userid')
    );
}
?>