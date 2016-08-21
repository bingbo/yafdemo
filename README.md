# yafdemo

this is a demo that tells you how to use yaf framework

## smarty的引入

* 首先要在`ext-yaf.ini`配置里打开`yaf.use_spl_autoload=1`开关

  > 开启的情况下, Yaf在加载不成功的情况下, 会继续让PHP的自动加载函数加载, 从性能考虑, 除非特殊情况, 否则保持这个选项关闭，虽是这样，但为了让其自动加载自定义类，就要打开该设置
  
* 其次编写自己的渲染引擎`Components_Views_Smarty`，实现`Yaf_View_Interface`接口

  ```php
  <?php

Yaf_Loader::import(dirname(__FILE__) . '/smarty-3.1.30/libs/Autoloader.php');
Smarty_Autoloader::register();

class Components_Views_Smarty implements Yaf_View_Interface{

    protected $script_path;
    protected $smarty;

    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->setTemplateDir(APPLICATION_PATH . '/templates/');
        $this->smarty->setPluginsDir('./plugins');
        $this->smarty->setCompileDir(APPLICATION_PATH . '/runtime');
        $this->smarty->setCacheDir(APPLICATION_PATH . '/cache');
        $this->smarty->setConfigDir(null);
        $this->smarty->setLeftDelimiter('{');
        $this->smarty->setRightDelimiter('}');
    }
    public function render($template, $tpl_vars = null){
        if(!empty($tpl_vars)){
            $this->smarty->assign($tpl_vars);
        }
        $this->smarty->display($template);

    }

    public function display($template, $tpl_vars = null){
        //var_dump($template);die;
        if(!empty($tpl_vars)){
            $this->smarty->assign($tpl_vars);
        }
        $this->smarty->display($template);
    }

    public function assign($key, $value = null){
        $this->smarty->assign($key, $value);
    }

    public function setScriptPath($view_directory){
        $this->script_path = $view_directory;
    }

    public function getScriptPath(){
        return $this->script_path;
    }

}
```
