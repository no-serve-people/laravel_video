
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','会员视频'); ?>
<?php $__env->startSection('content'); ?>
<script>
$("#会员视频").attr("class","active");
</script>
<div class="container">
	<div class="row">
		<div class="stui-pannel stui-pannel-bg clearfix">
			<div class="stui-pannel-box">
				<div class="stui-pannel_hd">
					<div class="stui-pannel__head active bottom-line clearfix">
						<h3 class="title"><img src="/public/static/QZHIJIA/icon/icon_25.png"/>会员专属视频列表</h3>
						<span class="more text-muted pull-right">提示：如有侵权 联系后 立马删除</span>
					</div>
				</div>
				<div class="stui-pannel_hd">
				 <?php echo config('adconfig.list_top'); ?>

				</div>
      <div class="stui-pannel_bd">
       <ul class="stui-vodlist clearfix">
	   <?php if(isset($vipdata)&&!empty($vipdata)): ?>
       <?php $__currentLoopData = $vipdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="col-md-6 col-sm-4 col-xs-3">
         <div class="stui-vodlist__box">
          <a class="stui-vodlist__thumb lazyload img-shadow" href="/play/<?php echo e($dy['dy_id']); ?>.html" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>">
		  <span class="play hidden-xs"></span><span class="pic-text text-right">2018</span></a>
          <div class="stui-vodlist__detail">
           <h4 class="title text-overflow"><a href="/play/<?php echo e($dy['dy_id']); ?>" onclick="jilu(this)" title="<?php echo e($dy['dy_title']); ?>"><?php echo e($dy['dy_title']); ?></a></h4>
          </div>
         </div>
		</li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <?php endif; ?>
       </ul>
      </div>
     </div>
    </div>  
    <!-- 筛选列表 -->
    <ul class="stui-page text-center cleafix">
	<li><a>共1页</a></li>
    </ul>
    <!-- 列表翻页-->
   </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.QZHIJIA.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>