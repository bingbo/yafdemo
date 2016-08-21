<?php
/**
 * @name UserModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author zhangbingbing
 */
class Services_User_UserModel {
    public function __construct() {
    }   
    
    public function selectUser() {
        return 'Hello World!';
    }

    public function insertUser($arrInfo) {
        return true;
    }
}
