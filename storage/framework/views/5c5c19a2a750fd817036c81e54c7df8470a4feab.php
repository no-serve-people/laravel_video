
<?php $__env->startSection('body','vod-type apptop'); ?>
<?php $__env->startSection('title','会员专属视频'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="hy-cascade clearfix">
                <div class="left-head hidden-sm hidden-xs">
                    <ul class="clearfix">
                        <li class="text"><span class="text-muted">当前频道</span></li>
                        <li><a href="/viplist.html"  class="active">会员专属视频</a></li></ul>
                </div>
            </div>
            <div class="hy-layout clearfix">
                <?php echo config('adconfig.list_top'); ?>

            </div>
            <div class="hy-layout clearfix" style="margin-top: 0;">
                <div class="hy-switch-tabs active clearfix">
                    <span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">会员专属视频</a></li>
                    </ul>
                </div>
                <div class="hy-video-list">
                    <div class="item">
                        <ul class="clearfix">
                            <div class="item">
                            <?php if(isset($vipdata)&&!empty($vipdata)): ?>
                                <?php $__currentLoopData = $vipdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$dy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <a class="videopic lazy" href="/play/<?php echo e($dy['dy_id']); ?>.html" title="<?php echo e($dy['dy_title']); ?>" data-src="<?php echo e($dy['dy_img']); ?>" onclick="jilu(this)">
                                        <span class="play hidden-xs"></span><span class="score"></span></a>
                                    <div class="title">
                                        <h5 class="text-overflow"><a href="/play/<?php echo e($dy['dy_id']); ?>.html" title="<?php echo e($dy['dy_title']); ?>" src="<?php echo e($dy['dy_img']); ?>" onclick="jilu(this)"><?php echo e($dy['dy_title']); ?></a></h5>
                                    </div>
                                    <div class="subtitle text-muted text-muted text-overflow hidden-xs"></div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="hy-page clearfix">
                    <ul class="cleafix">
                        <li><a>共1页</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.wapian.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>