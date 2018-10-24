
<?php $__env->startSection('nav','active opened active'); ?>
<?php $__env->startSection('navlist','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑导航</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">导航名称</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="<?php echo e($nav['nav_id']); ?>" name="nav_id">
                                <input type="text" class="form-control" id="field-1" value="<?php echo e($nav['nav_title']); ?>" name="nav_title" placeholder="请输入导航名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">导航地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="<?php echo e($nav['nav_addr']); ?>" name="nav_addr" placeholder="请输入导航地址" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">导航排序</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="nav_sort" value="<?php echo e($nav['nav_sort']); ?>" placeholder="数字越大越靠前" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">更新</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var navname = $('#field-1').val();
                var navaddr = $('#field-2').val();
                var navsort = $('#field-3').val();
                if(navname==''||navaddr==''||navsort==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/editnav",
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
                                    autocache(webdir,'navlist');
                                }
                                else {
                                    window.location = '/'+webdir+'/navlist'
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