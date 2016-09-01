<?php
/**
 * @name UserController
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class UserController extends Yaf\Controller_Abstract {

    public $actions = array(
        'user_index' => 'actions/user/Index.php',
    );
}
