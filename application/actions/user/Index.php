<?php 
class IndexAction extends Yaf_Action_Abstract{
    public function execute(){
        $userModel = new Services_User_UserModel();
        $res = $userModel->selectUser();
        echo 'user action...' . $res;
    }
}
