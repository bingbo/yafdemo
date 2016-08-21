<?php
/**
 * @name UserController
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class UserController extends Yaf_Controller_Abstract {

    public $actions = array(
        'index' => 'actions/user/Index.php',
    );
}
