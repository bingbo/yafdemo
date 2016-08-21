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
