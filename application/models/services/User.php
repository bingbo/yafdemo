<?php
/**
 * @name UserModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author zhangbingbing
 */
class Services_UserModel {

    private $userDao = null;
    public function __construct() {
        $this->userDao = new Dao_UserModel();
    }   
    
    public function getUsers() {
        return $this->userDao->findAll();
    }

    public function insertUser($arrInfo) {
        return true;
    }
}
