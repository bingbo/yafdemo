<?php
/**
 * @author zhangbingbing
 */
class Service_User {

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
