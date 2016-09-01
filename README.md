# yafdemo

this is a demo that tells you how to use yaf framework

## 命名空间的使用


* 首先要在`ext-yaf.ini`配置里打开`yaf.use_namespace=1`开关

* 其次在bootstrap.php文件中以_initAutoLoad()的方法使用加载自定义的autoload函数，如

    ```php
    /**
     * 添加自定义类加载器
     */
    public function _initAutoLoad(){
        require_once('front_autoload.php');
        spl_autoload_register('custom_autoload');
    }

    #front_autoload.php
    function custom_autoload($class){
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $file = APPLICATION_APP_PATH . DIRECTORY_SEPARATOR . $class . '.php';
        if(file_exists($file)){
            Yaf\Loader::import($file);
        }
    }
    ```

> 注：类加载的时候先会去用自定义加载器去查找加载，其次再用yaf的加载器去加载，如果需要yaf加载处理的则要用完全限定名称，即\xxx等,注意访问任意全局类、函数或常量，都可以使用完全限定名称，例如 \strlen() 或 \Exception 或 \INI_ALL。

## Smarty的引入

* 首先要在`ext-yaf.ini`配置里打开`yaf.use_spl_autoload=1`开关

    > 开启的情况下, Yaf在加载不成功的情况下, 会继续让PHP的自动加载函数加载, 从性能考虑, 除非特殊情况, 否则保持这个选项关闭，虽是这样，但为了让其自动加载自定义类，就要打开该设置

* 其次编写自己的渲染引擎`Components_Views_Smarty`，实现`Yaf_View_Interface`接口

    ```php
    <?php

    Yaf_Loader::import(dirname(__FILE__) . '/smarty-3.1.30/libs/Autoloader.php');
    Smarty_Autoloader::register();

    class Components_Views_Smarty implements Yaf_View_Interface{

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

        ........
    }
```

## 目录结构

![a](https://github.com/bingbo/blog/blob/master/images/yaf/layout.png)

## Nginx配置

```nginx
#vhost/yafdemo.conf
server {
    listen       8008;
    server_name  localhost;

    charset utf-8;

    root    html/yafdemo;
    index index.html index.htm index.php;

    location /public{
    
    }
    
    location /{
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_index  index.php;
        fastcgi_param  SCRIPT_FILENAME  $document_root$fastcgi_script_name;
        include        fastcgi_params;
        rewrite ^/(.*)  /index.php/$1 break;
    }

    error_page   500 502 503 504  /50x.html;
    location = /50x.html {
        root   html;
    }

    location ~ /\.ht {
        deny  all;
    }
}
```
