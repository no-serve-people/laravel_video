
<?php $__env->startSection('banner','active opened active'); ?>
<?php $__env->startSection('addbanner','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">添加轮播</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">轮播名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="" name="banner_title" placeholder="请输入轮播名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">轮播图片地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="" name="banner_img" placeholder="请输入轮播图片地址" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">轮播链接地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="banner_link" value="" placeholder="请输入轮播链接地址" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">添加</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var bannername = $('#field-1').val();
                var bannerimg = $('#field-2').val();
                var bannerlink = $('#field-3').val();
                if(bannername==''||bannerlink==''||bannerimg==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/addbanner",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        'token':localStorage.getItem('token'),
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg);
                            var webdir =  "<?php echo e(config('webset.webdir')); ?>";
                            setTimeout(function () {
                                if('<?php echo e(config('cacheconfig.autocache')); ?>'=='on'){
                                    autocache(webdir,'bannerlist');
                                }
                                else {
                                    window.location = '/'+webdir+'/bannerlist'
                                }
                            },1000);
                        }
                        else if(resp.status==500){
                            layer.msg(resp.msg);
                            setTimeout(function(){
                                window.location = window.location.href;
                            },1000)
                        }
                        else {
                            layer.msg(resp.msg);
                        }
                    }
                })
            })
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>