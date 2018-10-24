
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','电视剧'); ?>
<?php $__env->startSection('content'); ?>
<script>
$("#电视剧").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_25.png"/>电视剧</h3>
						<span class="more text-muted pull-right ">提示：如有侵权 联系后 立马删除</span>
					</div>
						<ul class="stui-screen__list type-slide bottom-line-dot clearfix"><li><span class="text-muted">电视剧分类</span></li><li><a href="/tvlist/all/1.html">全部</a></li>
						<?php $__currentLoopData = $tvtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><a href="/tvlist/<?php echo e($v); ?>/1.html"><?php echo e($key); ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
				</div>
				<div class="stui-pannel_bd">
					<?php echo config('adconfig.list_top'); ?>

				</div>
				<div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   <?php $__currentLoopData = $dsj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($ds['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($ds['title']); ?>" data-src="<?php echo e($ds['img']); ?>">
		  <span class="play hidden-xs"></span><span class="pic-text text-right"><?php echo e($ds['js']); ?></span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/<?php echo e($ds['url']); ?>.html" onclick="jilu(this)" title="<?php echo e($ds['title']); ?>"><?php echo e($ds['title']); ?></a></h4>
		   <p class="text text-overflow text-muted hidden-xs"><?php echo e($ds['star']); ?></p>
          </div>
         </div>
		</li>
		 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </ul>
      </div>
  </div>
</div>   
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
	<?php echo $pagehtml; ?>

	<li><a>共24页</a></li>
    </ul>
    <!-- 列表翻页-->
   </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.QZHIJIA.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>