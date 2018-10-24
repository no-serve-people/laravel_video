
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','尝鲜视频'); ?>
<?php $__env->startSection('content'); ?>
<script>
$("#尝鲜视频").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_25.png"/>尝鲜视频</h3>
						<span class="more text-muted pull-right">提示：如有侵权 联系后 立马删除</span>
					</div>
						<ul class="stui-screen__list type-slide bottom-line-dot clearfix"><li><span class="text-muted">尝鲜分类</span></li><li><a href="/autocxlist/5/1.html">全部</a></li>
						<?php $__currentLoopData = $cxtype; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><a href="/autocxlist/<?php echo e($v); ?>/1.html"><?php echo e($key); ?></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
				</div>
				<div class="stui-pannel_hd">
					<?php echo config('adconfig.list_top'); ?>

				</div>
				<div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   <?php if(isset($dydata)&&!empty($dydata)): ?>
       <?php $__currentLoopData = $dydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>">
		  <span class="play hidden-xs"></span><span class="pic-text text-right">2018</span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/<?php echo e($dy['dy_addr']); ?>.html" onclick="jilu(this) title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a></h4>
		   <p class="text text-overflow text-muted hidden-xs"></p>
          </div>
         </div>
		</li>
		<?php if($loop->index==29) break; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php endif; ?>
       </ul>
      </div>
  </div>
</div> 
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
	<?php echo $pagehtml; ?>

    </ul>
    <!-- 列表翻页-->
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.QZHIJIA.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>