<?php
/**
 * @name UserController
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class Api_UserController extends Yaf_Controller_Abstract {

    public $actions = array(
        'api_user_list' => 'actions/api/user/list.php',
    );
}
