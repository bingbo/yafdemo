<?php 
class User_IndexAction extends Yaf_Action_Abstract{
    public function execute(){
        $userService = new Services_UserModel();
        $users = $userService->getUsers();
        $this->getView()->assign('users', $users);
        $this->getView()->display('user/index.tpl');
    }
}
