<?php 
class Api_User_ListAction extends Yaf_Action_Abstract{
    public function execute(){
        $service = new Services_UserModel();
        $res = $service->getUsers();
        echo json_encode($res);
        return FALSE;
    }
}
