
<?php $__env->startSection('zb','active opened active'); ?>
<?php $__env->startSection('addzb','active'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">增加直播</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">直播名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="" name="zb_title" placeholder="请输入直播名称" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">直播地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="zb_addr" value="" placeholder="请填写可直接播放的视频地址,否则无法进行播放" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">直播排序</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-8" name="zb_sort" value="" placeholder="请填写排序数字,数字越大越靠前" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">直播类型</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="zb_type" id="field-9">
                                    <option value="1">央视频道</option>
                                    <option value="2">卫视频道</option>
                                    <option value="3">其他频道</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">增加</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var zbname = $('#field-1').val();
                var zbaddr = $('#field-7').val();
                var zbsort = $('#field-8').val();
                var zbtype = $('#field-9').val();
                if(zbname==''||zbaddr==''||zbsort==''||zbtype==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/addzb",
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
                            window.location = '/<?php echo e(config('webset.webdir')); ?>/zblist'
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