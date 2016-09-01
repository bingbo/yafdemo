<?php

namespace services;

/**
 * @author zhangbingbing
 */
class User {

    private $userDao = null;
    public function __construct() {
        $this->userDao = new \Dao_UserModel();
        //$this->userDao = new \Dao\User();
    }   
    
    public function getUsers() {
        return $this->userDao->findAll();
    }

    public function insertUser($arrInfo) {
        return true;
    }
}
