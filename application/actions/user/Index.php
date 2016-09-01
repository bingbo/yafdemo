<?php 
use \services\User;
class User_IndexAction extends Yaf\Action_Abstract{
    public function execute(){
        $userService = new User();
        $users = $userService->getUsers();
        $this->getView()->assign('users', $users);
        $this->getView()->display('user/index.tpl');
    }
}
