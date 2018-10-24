<?php
	require('./data.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title><?php echo e(config('webset.webname')); ?>-<?php echo e(config('webset.websubname')); ?>-<?php echo $__env->yieldContent('title'); ?></title>
	<meta name="keywords" content="<?php echo e(config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'); ?>">
	<meta name="description" content="<?php echo e(config('webset.webname')); ?>-<?php echo e(config('webset.websubname')); ?>-<?php echo $__env->yieldContent('title'); ?>-<?php echo e(config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="stylesheet" href="/public/static/QZHIJIA/css/amazeui.min.css">
	<link rel="shortcut icon" href="/public/static/QZHIJIA/images/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/font/iconfont.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_block.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_default.css" type="text/css" />
	<link rel="stylesheet" href="/public/static/QZHIJIA/css/stui_custom.css" type="text/css" />
	    <link rel="stylesheet" href="/public/static/QZHIJIA/font/fontawesome/css/font-awesome.min.css">
	<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/QZHIJIA/js/stui_default.js"></script>
	<script type="text/javascript" src="/public/static/QZHIJIA/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="/public/static/QZHIJIA/js/lazyload.min.js"></script>
    
    <?php $__env->startSection('other'); ?>
     <?php echo $__env->yieldSection(); ?>
</head>
<body>
  <header class="stui-header__top clearfix" id="header-top">
   <div class="container">
    <div class="row">
     <div class="stui-header_bd clearfix">
      <div class="stui-header__logo">
       <a class="logo" href="/"></a>
      </div>
      <div class="stui-header__side">
       <ul class="stui-header__user">
        <li class="visible-xs"><a href="/ucenter.html"><i class="fa fa-user"></i></a></li>
       </ul>
       <div class="stui-header__search">
		  <form id="homeso" role="search">
      <input type="text" class="form-control ff-wd" id="sos" name="key" placeholder="请输入关键字">
      <button class="submit" id="button" type="button">
          <i class="icon iconfont icon-search"></i>
        </button>
	</form> 
        <div id="word" class="autocomplete-suggestions active" style="display: none;"></div>
       </div>
      </div>
      <ul class="stui-header__menu type-slide nav-gallery">
      			<li id="首页"><a href="/" title="首页">首页</a></li>
		<?php if($navlist): ?>
		<?php $__currentLoopData = $navlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li id="<?php echo e($v['nav_title']); ?>"><a href="<?php echo e($v['nav_addr']); ?>" title="<?php echo e($v['nav_title']); ?>"><?php echo e($v['nav_title']); ?></a></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php endif; ?>
			<li id="<?php echo config('appconfig.appdh'); ?>"><?php echo config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':''; ?></li>
      </ul>
     </div>
    </div>
   </div>
  </header>
  
<?php $__env->startSection('content'); ?>
<?php echo $__env->yieldSection(); ?>
<div class="container">
  <div class="row">
  
    <div class="col-lg-wide stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_26.png" />友情链接</h3>
       </div>
      </div>
      <div class="stui-pannel_bd clearfix">
       <div class="col-xs-1">
        <ul class="stui-link__text clearfix">
    
      <?php if(isset($yqlist)): ?>
                                <?php $__currentLoopData = $yqlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $yq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                                    <li><a class="text-muted"  href="<?php echo e($yq['yq_link']); ?>" target="_blank"><?php echo e($yq['yq_name']); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
        </ul>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  
<div class="container">
   <div class="row">
    <div class="stui-foot clearfix stui-pannel stui-pannel-bg">
       <p class="text-center"   data-am-modal="{target: '#my-popup'}">免责声明</p>
    <p class="text-center">Copyright:<a href="#" target="_blank"><?php echo e(config('webset.webicp')); ?>-<?php echo e(config('webset.copyright')); ?></p>
   <p class="text-center"><?php echo config('webset.webtongji'); ?></p>
                <p class="text-center"> 本站提供的最新电影和电视剧资源均系收集于各大视频网站,本站只提供web页面服务,并不提供影片资源存储,也不参与录制、上传<br/>若本站收录的节目无意侵犯了贵司版权，请给网页底部邮箱地址来信,我们会及时处理和回复<br>如果本站没有您想要的电影或电视剧，请注册后在会员中心发送求片邮件！</p> 
 
    </div>   
  <div class="stui-extra clearfix">
   <li><span><i class="icon iconfont icon-qrcode"></i></span><div class="sideslip"><div class="col-pd"><img class="qrcode" width="150" height="150" src="http://qr.liantu.com/api.php?text=http://<?php echo e(config('webset.webdomin')); ?>"/> <p class="text-center font-12">扫码手机访问</p></div></div></li> 
  </div>
 </div>
</div>

<script>
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).children().children('img').attr('src');
        var title = $(obj).attr('title');
        $.ajax({
            type: "get",
            url: "/history",
            dataType: "json",
            data: {"url": url, "img": img, "title": title},
            success: function () {

            }
        })
    }
</script>
        <script>
            $(function () {
                $('#button').click(function () {
                    var key = $('#sos').val();
                    if (key != '' && key != null) {
                        window.location = '/search/' + key + '.html'
                    }
                });

                $('input').keyup(function () {
                    if (event.keyCode == 13) {
                        $("#button").trigger("click");
                    }
                });
                
        $('.lazyload').lazyload({
            placeholder:"/public/static/QZHIJIA/images/load.gif",
            effect : "fadeIn", //渐现，show(直接显示),fadeIn(淡入),slideDown(下拉)
            threshold : 120, //预加载，在图片距离屏幕180px时提前载入
        });
            })
            
           $(function(){
    $(".pay_item").click(function(){
        $(this).addClass('checked').siblings('.pay_item').removeClass('checked');
    });
});
function dashangToggle(){
    $(".hide_box").fadeToggle();
    $(".shang_box").fadeToggle();
}
        </script>
       
</body>
</html>
