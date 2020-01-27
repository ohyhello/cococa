<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {   

    $fav = new Typecho_Widget_Helper_Form_Element_Text('fav', NULL, NULL, _t('通用图标'), _t('请填入完整链接，作为网站标签页图标，手机建议大小 114x114'));
    $form->addInput($fav);
    $IOSIcon = new Typecho_Widget_Helper_Form_Element_Text('IOSIcon', NULL, NULL, _t('IOS 图标'), _t('请填入完整链接，作为网站图标，手机建议大小 114x114，适用 IOS 全系列'));
    $form->addInput($IOSIcon);
    $themeColor = new Typecho_Widget_Helper_Form_Element_Text('themeColor', NULL, NULL, _t('网站基础色调，用于浏览器搜索头部颜色显示'), _t('请填入完整 RGB（rgb(255, 255, 255)） 色值或者十六进制颜色代码（#fff）'));
    $form->addInput($themeColor);


    $authorImage = new Typecho_Widget_Helper_Form_Element_Text('authorImage', NULL, NULL, _t('网站概要头像'), _t('请填入完整链接，作为网站头像，不填则为默认，建议为方形'));
    $form->addInput($authorImage);
    $liveTime = new Typecho_Widget_Helper_Form_Element_Text('liveTime', NULL, NULL, _t('建站日期'), _t('填写你的建站日期，格式：2017/11/02 11:31:29 '));
    $form->addInput($liveTime);

    /* Social account */
    $GitHubLink = new Typecho_Widget_Helper_Form_Element_Text('GitHubLink', NULL, NULL, _t('GitHub 链接'), _t('请填入完整链接'));
    $form->addInput($GitHubLink);
    $TwitterLink = new Typecho_Widget_Helper_Form_Element_Text('TwitterLink', NULL, NULL, _t('twitter 链接'), _t('请填入完整链接'));
    $form->addInput($TwitterLink);
    $QQLink = new Typecho_Widget_Helper_Form_Element_Text('QQLink', NULL, NULL, _t('QQ 链接'), _t('请填入完整链接'));
    $form->addInput($QQLink);

    $backGroundImage = new Typecho_Widget_Helper_Form_Element_Text('backGroundImage', NULL, NULL, _t('网站 Banner 背景图'), _t('请填入完整链接，作为网站背景，不填则为默认'));
    $form->addInput($backGroundImage);


	
	
	
	
    $WechatQR = new Typecho_Widget_Helper_Form_Element_Text('WechatQR', NULL, NULL, _t('微信二维码'), _t('请填入完整二维码图片链接，用于赞赏'));
    $form->addInput($WechatQR);
    $AlipayQR = new Typecho_Widget_Helper_Form_Element_Text('AlipayQR', NULL, NULL, _t('支付宝二维码'), _t('请填入完整二维码图片链接，用于赞赏'));
    $form->addInput($AlipayQR);
	

    $customCss = new Typecho_Widget_Helper_Form_Element_Textarea('customCss', NULL, NULL, _t('自定义 CSS 代码'), _t('填写你的 CSS 代码，需要 `style` 标签'));
    $form->addInput($customCss);
    $customScript = new Typecho_Widget_Helper_Form_Element_Textarea('customScript', NULL, NULL, _t('自定义 JavaScript 代码'), _t('填写你 JavaScript 代码，不需要 `script` 标签'));
    $form->addInput($customScript);
    $GoogleAnalytics = new Typecho_Widget_Helper_Form_Element_Textarea('GoogleAnalytics', NULL, NULL, _t('Google Analytics 代码'), _t('填写你从 Google Analytics 获取到的 Universal Analytics 跟踪代码，需要 script 标签'));
    $form->addInput($GoogleAnalytics);


    $StyleSettings = new Typecho_Widget_Helper_Form_Element_Checkbox('StyleSettings', 
        array('Banner' => _t('是否显示 Banner'),
        ),
        array(), _t('主题样式设置'));
    $form->addInput($StyleSettings->multiMode());


     /* Theme feature */
    $feature = new Typecho_Widget_Helper_Form_Element_Checkbox('feature', 
        array('showThumb' => _t('首页文章缩略图'),
        'loadNextPagePost' => _t('首页滚动加载'),
        'ribbons' => _t('类彩带背景'),
        'codeHighlight' => _t('代码高亮'),
        'commentEmoji' => _t('评论表情'),
        'fastclick' => _t('解决移动端300ms延迟'),
        /* 'pjax' => _t('mini-pjax'), */
        'lazyImg' => _t('文章内图片懒加载'),
        ),
        array('showThumb'), _t('额外功能设置'));
    $form->addInput($feature->multiMode());

    
    $siderbarOption = new Typecho_Widget_Helper_Form_Element_Checkbox('siderbarOption', 
        array('TopViewPost' => _t('热门文章'),
        'topComnentPost' => _t('热评文章'),
        'randomPost' => _t('随机文章'),),
        array('randomPost'), _t('侧栏相关设置'));
    $form->addInput($siderbarOption->multiMode());


    $codeHighlightTheme = new Typecho_Widget_Helper_Form_Element_Radio('codeHighlightTheme', 
        array('default' => _t('默认高亮，灰底'),
        'okaidia' => _t('sublime 默认配色，黑底'),
        'coy' => _t('MDN 配色，白底蓝边'),
        'Solarized-Light' => _t('淡黄底色'),
        'Tomorrow-Night' => _t('黑底色'),),
        'default',_t('代码高亮主题'), _t('代码高亮主题')
   );
   $form->addInput($codeHighlightTheme);
    

    /* $PWA = new Typecho_Widget_Helper_Form_Element_Radio('PWA',
        array('able' => _t('启用'),
        'disable' => _t('禁用'),),
        'disable',_t('桌面支持'), _t('默认禁止，Pro版可开启')
    );
    $form->addInput($PWA); */

}


function themeFields(Typecho_Widget_Helper_Layout $layout){
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('thumb', NULL, NULL, _t('头图地址(thumb)'), _t('输入图片URL，则优先使用该图片作为头图。'));
    $layout->addItem($thumb);

    $thumbAlt = new Typecho_Widget_Helper_Form_Element_Text('thumbAlt', NULL, NULL, _t('头图描述(alt)'), _t('输入图片的描述。'));
    $layout->addItem($thumbAlt);
}



function showThumb($obj,$size=null,$link=false){

    $fieldThumb = $obj->fields->thumb;
    
    if(isset($fieldThumb)){
        return '<img src="'. $fieldThumb .'" alt="'. $obj->fields->thumbAlt .'" />';
    }

    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?alt=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;

    if(isset($attach->isImage) && $attach->isImage == 1){
        //$thumb = $attach->url;
        $thumb = '<img src="'. $attach->url. '" alt="'. $attach->name. '" />';
    }elseif(isset($matches[1][0])){
        //$thumb = $matches[1][0];
        $thumb = $matches[0][0];
    }

    if(empty($thumb) && empty($options->default_thumb)){
        return '';
    }else{
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if($link){
        return $thumb;
    }
}

function getBrowser($agent){
    if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
        $browserVersion = 'IE';
    } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Firefox/', $regs[0]);
        $FireFox_vern = explode('.', $str1[1]);
        $browserVersion = 'Firefox '. $FireFox_vern[0];
    } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Maxthon/', $agent);
        $Maxthon_vern = explode('.', $str1[1]);
        $browserVersion = 'Maxthon '.$Maxthon_vern[0];
    } else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = 'Sogo';
    } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
        $browserVersion = '360';
    } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Edge/', $regs[0]);
        $Edge_vern = explode('.', $str1[1]);
        $browserVersion = 'Edge '.$Edge_vern[0];
    } else if (preg_match('/UC/i', $agent)) {
        $str1 = explode('rowser/',  $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC '.$UCBrowser_vern[0];
    } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
        $browserVersion = 'Wechat';
    }  else if (preg_match('/WeiBo/i', $agent, $regs)) {
        $browserVersion = 'Weibo';
    }  else if (preg_match('/QQ/i', $agent, $regs) || preg_match('/QQBrowser\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('rowser/',  $agent);
        $QQ_vern = explode('.', $str1[1]);
        $browserVersion = 'QQ '.$QQ_vern[0];
    } else if (preg_match('/BIDU/i', $agent, $regs)) {
        $browserVersion = 'Baidu';
    } else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
        $browserVersion = 'LieBao';
    } else if (preg_match('/TheWorld/i', $agent, $regs)) {
        $browserVersion = '世界之窗';
    } else if (preg_match('/XiaoMi/i', $agent, $regs)) {
        $browserVersion = 'Mi';
    } else if (preg_match('/UBrowser/i', $agent, $regs)) {
        $str1 = explode('rowser/',  $agent);
        $UCBrowser_vern = explode('.', $str1[1]);
        $browserVersion = 'UC '.$UCBrowser_vern[0];
    } else if (preg_match('/mailapp/i', $agent, $regs)) {
        $browserVersion = 'email内嵌';
    } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
        $browserVersion = '2345';
    } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
        $browserVersion = '神马';
    } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
        $browserVersion = 'Yandex';
    }  else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
        $browserVersion = 'Opera';
    } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
        $browserVersion = '魅族';
    } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
        $browserVersion = 'vivo';
    } else if (preg_match('/Quark/i', $agent, $regs)) {
        $browserVersion = '夸克';
    } else if (preg_match('/mixia/i', $agent, $regs)) {
        $browserVersion = '米侠';
    }else if (preg_match('/fusion/i', $agent, $regs)) {
        $browserVersion = '客户端';
    } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
        $browserVersion = '基安内置';
    } else if (preg_match('/Thunder/i', $agent, $regs)) {
        $browserVersion = '迅雷内置';
    } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
        $str1 = explode('Chrome/', $agent);
        $chrome_vern = explode('.', $str1[1]);
        $browserVersion = 'Chrome '.$chrome_vern[0];
    } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
         $str1 = explode('Version/',  $agent);
        $safari_vern = explode('.', $str1[1]);
        $browserVersion = 'Safari '.$safari_vern[0];
    } else{
        $browserVersion = '404 Browser';
    }
    echo $browserVersion;
}

function getOs($agent){
    if (preg_match('/win/i', $agent)) {
        if (preg_match('/nt 6.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> Vista';
        } else if (preg_match('/nt 6.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 7';
        } else if (preg_match('/nt 6.2/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8';
        } else if(preg_match('/nt 6.3/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 8.1';
        } else if(preg_match('/nt 5.1/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> XP';
        } else if (preg_match('/nt 10.0/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-windows"></i> 10';
        } else{
            $OSVersion = '<i class="iconfont icon-windows"></i>';
        }
    } else if (preg_match('/android/i', $agent)) {
        if (preg_match('/android 9/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> P';
        }
        else if (preg_match('/android 8/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> O';
        }
        else if (preg_match('/android 7/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> N';
        }
        else if (preg_match('/android 6/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> M';
        }
        else if (preg_match('/android 5/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i> L';
        }
        else{
            $OSVersion = '<i class="iconfont icon-android"></i>';
        }
    } else if (preg_match('/ubuntu/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-linux"></i>';
        } else if (preg_match('/linux/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-linux"></i>';
        }else if (preg_match('/iPhone/i', $agent)) {
            if(preg_match('/iPhone OS 11/i', $agent)){
                $OSVersion = '<i class="iconfont icon-iphone"></i> 11';
            }else if(preg_match('/iPhone OS 12/i', $agent)){
                $OSVersion = '<i class="iconfont icon-iphone"></i> 12';
            }else{
                $OSVersion = '<i class="iconfont icon-iphone"></i> < 11';
            }
        } else if (preg_match('/mac/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-mac"></i>';
        }else if (preg_match('/fusion/i', $agent)) {
            $OSVersion = '<i class="iconfont icon-android"></i>';
        } else {
            $OSVersion = '404 OS';
        }
    echo $OSVersion;
}

function getSiteViews(){
	$db = Typecho_Db::get();
	$prefix = $db->getPrefix();
	if (array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))){
		$pom = $db->fetchAll("SELECT SUM(VIEWS) FROM `" . $prefix . "contents` WHERE `type`='page' or `type`='post'");
		$num = number_format($pom[0]['SUM(VIEWS)'],0,'','');
		return $num;
	}else{
		return 0; 
	}
}

function getPostView($archive){
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if(empty($views)){
            $views = array();
        }else{
            $views = explode(',', $views);
        }
        if(!in_array($cid,$views)){
            $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views);
        }
    }
    echo $row['views'];
}

function getRandomPosts($limit = 5){
    $db = Typecho_Db::get();

    $adapterName =  $db->getAdapterName();
    $rand = "RAND()";
    
    if($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite'){
        $rand = 'RANDOM()';
    }

    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= ' . Helper::options()->gmtTime, 'post')
        ->limit($limit)
        ->order($rand));
	if($result){
        echo '<ul class="rand-archive list">';
		foreach($result as $val){
			$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_title = htmlspecialchars($val['title']);
			$permalink = $val['permalink'];
			echo '<li><a href="'.$permalink.'" title="'.$post_title.'" >'.$post_title.'</a></li>';
        }
        echo '</ul>';
	}
}

function getTopView($limit = 5){
    $days = 99999999999999;
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('created >= ?', $time)
        ->where('type = ?', 'post')
        ->where('status = ?','publish')
        ->where('created <= ?',time())
        ->limit($limit)
        ->order('views',Typecho_Db::SORT_DESC));
    if($result){
        echo '<ul class="top-view-archive list">';
        foreach($result as $val){
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="'.$permalink.'" title="'.$val['views'].'人看过">'.$post_title.'</a></li>';
        }
        echo '</ul>';
    }
}

function getTopCommentPosts($limit = 5){
    $days = 99999999999999;
    $time = time() - (24 * 60 * 60 * $days);
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('created >= ?', $time)
        ->where('type = ?', 'post')
        ->limit($limit)
        ->order('commentsNum',Typecho_Db::SORT_DESC));
    if($result){
        echo '<ul class="top-comment-archive list">';
        foreach($result as $val){
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<li><a href="'.$permalink.'" title="'.$val['commentsNum'].'条评论">'.$post_title.'</a></li>';
        }
        echo '</ul>';
    }
}

function getRecentComments(){}

function thumbUp(){}

function replaceTag($content,$isLogin = false){
    $config =  Typecho_Widget::widget('Widget_Options')->feature;
    if(in_array('lazyImg', $config)){
        $content = preg_replace("/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?alt=[\'|\"](.*?)[\'|\"].*?[\/|img|IMG]?>/sm",'<div class="lazy-loader" lazy-src="$1" data="$2"><span></span></div>', $content);
    }
    /* if($isLogin){
        $obj->content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'$1',$obj->content);
    }else{
    	$obj->content = preg_replace("/\[hide\](.*?)\[\/hide\]/sm",'<div class="reply2view">隐藏内容评论回复可见。</div>',$obj->content);
    } */

    /* $content = preg_replace("/\[button\s*(.*?)\](.*?)\[\/button\]/sm",'<button class="$1">$2</button>',$content);
    $content = preg_replace("/\[i-button\s*(.*?)\](.*?)\[\/i-button\]/sm",'<div class="$1">$2</div>', $content);
    $content = preg_replace("/\[tip\s*(.*?)\](.*?)\[\/tip\]/sm",'<div class="$1">$2</div>', $content); */

    echo $content;
}