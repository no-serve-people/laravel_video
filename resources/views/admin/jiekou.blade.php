@extends('public.admin')
@section('set','active opened active')
@section('jkset','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">接口设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">接口1</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="{{$jkset['XL～①']}}" name="XL～①" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">接口2</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="{{$jkset['XL～②']}}" name="XL～②" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">接口3</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="{{$jkset['XL～③']}}" name="XL～③" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">接口4</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-4" value="{{$jkset['XL～④']}}" name="XL～④" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">接口5</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-5" value="{{$jkset['XL～⑤']}}" name="XL～⑤" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">接口6</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-6" value="{{$jkset['XL～⑥']}}" name="XL～⑥" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">接口7</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" value="{{$jkset['XL～⑦']}}" name="XL～⑦" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">接口8</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-8" value="{{$jkset['XL～⑧']}}" name="XL～⑧" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">接口9</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" value="{{$jkset['XL～⑨']}}" name="XL～⑨" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-10">接口10</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-10" value="{{$jkset['XL～⑩']}}" name="XL～⑩" placeholder="请输入接口地址" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">修改</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                for(var i=1;i<11;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写十个完整接口')
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/jkset",
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
                            window.location = window.location.href
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
@endsection