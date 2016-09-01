<?php
namespace dao;
/**
 * @name UserModel
 * @desc sample数据获取类, 可以访问数据库，文件，其它系统等
 * @author zhangbingbing
 */
class User {

    private $helper;
    public function __construct() {
        $this->helper = \Components_Db_SqliteHelper::getConnection(); 
    }   
    
    public function findAll() {
        $res = $this->helper->query('select * from user;');
        return $res;
    }

    public function insertUser($arrInfo) {
        return true;
    }
}
