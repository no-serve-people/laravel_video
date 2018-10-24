<?php $__env->startSection('title','播放页'); ?>
<?php $__env->startSection('other'); ?>
<style>
.collapse{display:none}.collapse.in{display:block;}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<script>
$("#动漫").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel-bd">
					<div class="stui-player col-pd">
                     <div style="border: 1px solid #E6D8B9;background:#FEFFE6;color: #080;line-height: 20px;padding: 5px 10px;margin-bottom:10px;">
                    【<span style="color:red">播放提示</span>】：<label>如果无法播放请切换线路或者播放源！
</label>
                     </div>
					<div class="stui-player__video embed-responsive-16by9 embed-responsive clearfi">
						<img id="addid" src="" style="display: none;width:100%;height:100%;border: 0px solid #FF6651">
								<iframe id="video" src="/jzad" allowfullscreen="true" allowtransparency="true" style="width:100%;height:100%;border:none"></iframe>
                            <a style="display:none" id="videourlgo" href=""></a>
						</div>
						<div class="stui-player__detail detail">
						<div class="title">
						<span class="pull-right bdshare-button-style0-24 player_switch" id="xlus">
						<?php $__currentLoopData = $jk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a onclick="xldata(this)" data-jk="<?php echo e($v); ?>" class="btn btn-sm btn-default"><?php echo e($key); ?></a>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
						</div>
							<p class="data margin-0">
<span class="text-muted" id="xuji">正在播放：<?php echo e($pm); ?></span>
							<a class="detail-more" href="javascript:;">详情 <i class="icon iconfont icon-moreunfold"></i></a>	<a href="javascript:;" class="zshang more pull-right" onclick="pop()">打赏</a></p>

							<div class="detail-content" style="display: none;">
								<p class="data"><span class="text-muted">类型：</span>动漫</p>
								<p class="desc margin-0"><span class="left text-muted">简介：</span><span style="font-variant-ligatures: normal; orphans: 2; widows: 2;"><?php echo e($desc); ?></span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php $__currentLoopData = $js; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
<div class="stui-pannel stui-pannel-bg clearfix">
	<div class="stui-pannel-box"><div class="stui-pannel_hd">
		<div class="stui-pannel__head bottom-line active clearfix">
          <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#dm<?php echo e($v['name']); ?>">
			<span class="more text-muted pull-right">无需安装任何插件，点播放源可折叠！</span>
				<h3 class="title"><?php echo e($v['name']); ?></h3>
          </a>
		</div>
	</div>
	<div class="stui-pannel_bd col-pd clearfix">
		<ul class="stui-content__playlist column10 clearfix collapse in" id="dm<?php echo e($v['name']); ?>">
			<?php echo isset($v['data'])?$v['data']:'暂无可用播放源'; ?>

		</ul> 
	</div>
	</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<!--播放历史记录-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_6.png" />播放记录</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       <ul class="stui-vodlist__bd clearfix">
		<?php if($history): ?>
        <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		 <li class="col-md-6 col-sm-4 col-xs-3">
         
           <h4 class="title text-overflow"><a href="<?php echo e($v['url']); ?>" onclick="jilu(this)" title="<?php echo e($v['title']); ?>"><?php echo e($v['title']); ?></a></h4>
		   
		</li>
					<?php if($loop->index==5) break; ?>        
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <h3>暂无历史记录</h3>
        <?php endif; ?>
       </ul>
      </div>
     </div>
    </div>
    <!--影片评论-->
	<div class="stui-pannel stui-pannel-bg clearfix">
     <div class="stui-pannel-box">
      <div class="stui-pannel_hd">
       <div class="stui-pannel__head clearfix">
        <h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_6.png" />影片评论</h3>
       </div>
      </div>
      <div class="stui-pannel_bd">
       <?php echo config('webset.cy'); ?>

      </div>
     </div>
    </div>
	</div>
</div>
<script type="text/javascript" src="/public/static/QZHIJIA/js/jquery.SuperSlide.js"></script>
<script>
	$(function () {
			$('.title.g-clear').remove();
			$('.all.js-show-init').remove();
			$('.js-tab-wrapper').remove();
			
			$.each($('.num-tab.js-tabs'),function () {
					if($(this).children('.num-tab-main').length>1){
							$(this).children('.num-tab-main:eq(0)').remove();
					}
					$(this).children('.num-tab-main').children('a').wrap("<li></li>");
					$(this).children('.num-tab-main').children('li').children('a').addClass('am-btn am-btn-default lipbtn');

			});
			
			$('.ji-tab-content.js-tab-content').css('opacity',1);
			$('.num-tab-main.g-clear.js-tab').removeAttr("style");
			$.each($('.lipbtn'),function () {
					var url = $(this).attr('href');
					$(this).attr('data-href',url);
					$(this).attr('href','javascript:;');
					$(this).attr('onclick','bofang(this)');
			});
			var biaoti = $('#xuji').text();
			$('title').text(biaoti);
			$('#xlus').children('a:eq(0)').addClass('jkbtn');
			var autourl = $('.lipbtn:eq(0)').attr('data-href');
			$('.lipbtn:eq(0)').attr('id','ys');
			var text = $('.lipbtn:eq(0)').text();
			$('.js').text('-第'+text+'集');
			var jiekou = $('#xlus').children('a:eq(0)').attr('data-jk');
			if(autourl!=''||autourl!=null){
					setTimeout(function () {
							$('#video').attr('src', jiekou + autourl);
					},3000)
			}
	})
	function bofang(obj) {
			var href = $(obj).attr('data-href');
			var text = $(obj).text();
			$('.js').text('-第' + text+'集');
			$.each($('.lipbtn'), function () {
					$(this).attr('id','');
			});
			$(obj).attr('id','ys');
			var jiekou = $('.jkbtn').attr('data-jk');
			if (href != '' || href != null) {
					$('#video').attr('src', '/jzad');
					setTimeout(function () {
							$('#video').attr('src', jiekou + href);
			},3000)
	}
	}
	function xldata(obj) {
			var url = $(obj).attr('data-jk');
			$.each($('.jkbtn'), function () {
					$(this).removeClass('jkbtn');
			});
			$(obj).addClass('jkbtn');
			var src = $('#ys').attr('data-href');
			$('#video').attr('src', url + src);
	}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.QZHIJIA.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>