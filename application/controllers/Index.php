<?php
/**
 * @name IndexController
 * @author zhangbingbing
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf\Controller_Abstract {

	/** 
     * 默认动作
     * Yaf支持直接把Yaf_Request_Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/demo/index/index/index/name/zhangbingbing 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
        $this->getView()->display('index.tpl');
		//1. fetch query
		//$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		//$model = new SampleModel();
        //$res = Services_TestModel::test();
        //var_dump($res);die;

		//3. assign
		//$this->getView()->assign("content", $model->selectSample());
		//$this->getView()->assign("name", $name . Utils_Common::sayHi());

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}

    public function smartyAction(){
        $this->getView()->assign('data',array('name'=>'bill.zhang'));
        $this->getView()->display('index.tpl');
    }
}
