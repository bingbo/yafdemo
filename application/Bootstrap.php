<?php
/**
 * @name Bootstrap
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf_Bootstrap_Abstract{

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $arrConfig);
	}

	public function _initPlugin(Yaf_Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(Yaf_Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
        $config = new Yaf_Config_Ini('conf/route.ini', 'settings');
        $router = $dispatcher->getRouter();
        foreach($config as $key => $value){
            list($uri, $controller, $action) = explode(';',$value);
            $route = new Yaf_Route_Rewrite(
                $uri,
                array(
                    'controller' => $controller,
                    'action' => $action
                ));
            $router->addRoute($key, $route);
        }
	}
	
	public function _initView(Yaf_Dispatcher $dispatcher){
		//在这里注册自己的view控制器，例如smarty,firekylin
        $dispatcher->disableView();
        $view = new Components_Views_Smarty();
        $dispatcher->setView($view);
	}

    public function _initDefaultName(Yaf_Dispatcher $dispatcher){
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
}   
