<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js" lang="Zh-CN">
<head>
    
    <meta charset="<?php $this->options->charset(); ?>">

    <!-- DNS Prefetch -->
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net" />
    <link rel="dns-prefetch" href="//secure.gravatar.com" />
    <link rel="dns-prefetch" href="//i.loli.net" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <meta name="author" content="<?php $this->author() ?>" />
    <?php $this->header('generator=&pingback=&xmlrpc=&wlw='); ?>
    <link rel="icon" href="<?php $this->options->fav() or $this->options->themeUrl('favicon.jpg'); ?>" />
	<!--jscss-->
<!--aplayer-->
<link rel="stylesheet" href="<?php $this->options->themeUrl('./lib/aplayer/dist/APlayer.min.css'); ?>">
<script src="<?php $this->options->themeUrl('./lib/aplayer/dist/APlayer.min.js'); ?>"></script>
<!--dlpayer-->
<link rel="stylesheet" href="<?php $this->options->themeUrl('./lib/DPlayer/dist/DPlayer.min.css'); ?>">
<script src="<?php $this->options->themeUrl('./lib/DPlayer/dist/DPlayer.min.js'); ?>"></script>

<script src="<?php $this->options->themeUrl('/lib/typed.js/dist/typed.min.js'); ?>"></script>
<!--<script src="/lib/jquery-lazyload/jquery.lazyload.js"></script>-->
<!--<script src="/lib/notie/browser/notie.js"></script>-->
<!--<script src="<?php $this->options->themeUrl('./lib/social-share.js/dist/js/jquery.share.min.js'); ?>"></script>-->
	<link rel="stylesheet" href="<?php $this->options->themeUrl('./lib/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
			<!--live2d-->
	<div class="waifu">
    <!--<div class="waifu-tips"></div>-->
    <canvas id="live2d" width="280" height="250" class="live2d"></canvas>
</div>
	
			
			

	
	
	
    <!-- About IOS -->
    <meta name="format-detection" content="telephone=no">

    <!-- IOS Config -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <meta name="apple-mobile-web-app-title" content="<?php $this->options->title() ?>">
    <meta name="theme-color" content="<?php $this->options->themeColor ? $this->options->themeColor() : _e('#fff') ?>">
    <link rel="apple-touch-icon" sizes="32x32 58x58 72x72 96x96 114x114" href="<?php $this->options->IOSIcon(); ?>">
   
    <!-- Disable Baidu transformation -->
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!-- Disable Baidu snapshot -->
    <meta name="Baiduspider" content="noarchive">
    
    
    <!-- OGP https://www.ogp.me/ -->
    <?php if($this->is('post') || $this->is('page')): ?>
    <meta property="og:url" content="<?php $this->permalink() ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php $this->title() ?>" />
    <meta property="og:author" content="<?php $this->author(); ?>" />
    <meta property="og:site_name" content="<?php $this->options->title() ?>" />
    <meta property="og:description" content=" <?php $this->description() ?>" />
    <meta property="og:locale:alternate" content="zh_CN" />
    <?php endif; ?>

    <?php _e($this->options->GoogleAnalytics) ?>     
    
    <!-- CSS Style -->
    <link async rel="stylesheet" href="<?php $this->options->themeUrl('./dist/css/index.min.css?t='). _e(time()); ?>">
    <link async rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('./dist/css/iconfont.min.css'); ?>">
    <link async rel="stylesheet" href="<?php $this->options->themeUrl('./dist/css/_variable.min.css'); ?>">


    <!-- Custom Style -->
    <?php _e($this->options->customCss) ?>

     <!-- Prism -->
     <?php if (!empty($this->options->feature) && in_array('codeHighlight', $this->options->feature)): ?>
    <link href="<?php $this->options->themeUrl('./lib/prism/'. $this->options->codeHighlightTheme . '/prism.css'); ?>" rel="stylesheet" />
    <?php endif; ?>

    <!-- OwO emoji style -->
    <?php if (!empty($this->options->feature) && in_array('commentEmoji', $this->options->feature) && $this->allow('comment')): ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('./lib/OwO/OwO.min.css'); ?>">
    <?php endif; ?>    

    <?php if (empty($this->options->StyleSettings) || !in_array('Banner', $this->options->StyleSettings)): ?>
    <style>
        .header-wrap{
            height: 120px;
        }
        .site-nav{
            background:rgba(255,255,255,.8);
            box-shadow: 0 0 2px 2px rgba(172,172,172,.4);
        }
        @media (max-width: 991px) {
            .header-wrap{
                height: 70px;
            }
        }
        .sidebar-inner.affix{
            top: 70px;
        }
    </style>
    <?php endif; ?>
</head>
<body>
<div id="root">
    <header id="header">
        <nav  role="navigation" class="site-nav">
            <ul id='menu' class="menu">
                <li class="menu-item">
                    <a <?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('<i class="iconfont icon-Home"></i>Home'); ?></a>
                </li>
                <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                <?php while($pages->next()): ?>
                <li class="menu-item">
                    <a <?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" rel="section"><i class="iconfont icon-<?php $pages->title(); ?>"></i><?php $pages->title(); ?></a>
                </li>
				
				
				
                <?php endwhile; ?>
				
				

		 <!--search-->
		 <!--<div class="nav-right">
                <form class="search-form" method="post" action="">
                    <input type="text" name="s" class="search-input" placeholder="站内搜索">
                    <button type="submit" class="search-submit sousuo">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>-->
			
			
                <!--<li class="menu-item search">
                    <a href="<?php $this->options->rewrite ?  $this->options->siteUrl('search.html') :  $this->options->siteUrl('index.php/search.html') ?>"><i class="iconfont icon-search"></i></a> 
                 </li>-->
            </ul>
        </nav>
        
        <div class="header-wrap">
        <?php if (!empty($this->options->StyleSettings) && in_array('Banner', $this->options->StyleSettings)): ?>
            <div class="site-config" style="background-image:url(<?php $this->options->backGroundImage ? $this->options->backGroundImage() : _e('https://i.loli.net/2018/10/05/5bb7144897e8c.jpg') ?>)">
                <div class="site-meta">
				<div class="site-title">
                    <div class="type-wrap">
            <div id="typed-strings">
			<p>welcome</p>
			<p>ohyhello</p>
            <p>喜欢的话就坚持吧</p>
            <!--<div class="site-description"><?php $this->options->description(); ?></div>-->
			 </div>
            </div>
            <span id="typed" style="white-space:pre;"></span>
        </div>
					<!--<div class="site-title"><?php $this->options->title(); ?></div>-->
                   
					
         


    
                </div>
            </div>
        <?php endif; ?>
        </div>
       

    </header>
    

    
    
