<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/public/images/icon.jpg">
    <title>{block name=title}my yaf demo{/block}</title>
    <link href="/public/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/public/css/site.css" rel="stylesheet"/>
    {block name=head}{/block}
</head>
<body>

<div class="wrap">
    
    <nav id="w0" class="navbar-inverse navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">My Yaf Demo</a>
            </div>
            <div id="w0-collapse" class="collapse navbar-collapse">
                <ul id="w1" class="navbar-nav navbar-right nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Login</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">后台管理 <b class="caret"></b></a>
                        <ul id="w2" class="dropdown-menu"><li><a href="/user/index" tabindex="-1">用户管理</a></li>
                            <li class="divider"></li>
                            <li><a href="#" tabindex="-1">权限管理</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="site-index">
            {block name=body}{/block} 
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company 2016-07-12</p>

        <p class="pull-right">Bing</p>
    </div>
</footer>

<script src="/public/js/jquery-3.1.0.min.js"></script>
<script src="/public/js/bootstrap.min.js"></script>
{block name=foot}{/block}
</body>
</html>
