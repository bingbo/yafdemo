<?php
/**
 * @name Bootstrap
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract{

    /**
     * 添加自定义类加载器
     */
    public function _initAutoLoad(){
        require_once('front_autoload.php');
        spl_autoload_register('custom_autoload');
    }

    public function _initConfig() {
		//把配置保存起来
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
	}

	public function _initPlugin(Yaf\Dispatcher $dispatcher) {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(Yaf\Dispatcher $dispatcher) {
		//在这里注册自己的路由协议,默认使用简单路由
        $config = new Yaf\Config\Ini('conf/route.ini', 'settings');
        $router = $dispatcher->getRouter();
        foreach($config as $key => $value){
            list($uri, $controller, $action) = explode(';',$value);
            $route = new Yaf\Route\Rewrite(
                $uri,
                array(
                    'controller' => $controller,
                    'action' => $action
                ));
            $router->addRoute($key, $route);
        }
	}
	
	public function _initView(Yaf\Dispatcher $dispatcher){
		//在这里注册自己的view控制器，例如smarty,firekylin
        $dispatcher->disableView();
        $view = new Components_Views_Smarty();
        $dispatcher->setView($view);
	}

    public function _initDefaultName(Yaf\Dispatcher $dispatcher){
        $dispatcher->setDefaultModule("Index")->setDefaultController("Index")->setDefaultAction("index");
    }
}   
