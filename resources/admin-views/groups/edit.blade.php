@extends('admin::layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">编辑</h3>
                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 10px">
                            <a href="{{ route('admin::groups.index') }}" class="btn btn-sm btn-default"><i class="fa fa-list"></i>&nbsp;列表</a>
                        </div> <div class="btn-group pull-right" style="margin-right: 10px">
                            <a class="btn btn-sm btn-default form-history-back"><i class="fa fa-arrow-left"></i>&nbsp;返回</a>
                        </div>
                    </div>
                </div>
                <form id="post-form" class="form-horizontal" action="{{ route('admin::groups.update',$group->id) }}" method="post" enctype="multipart/form-data" pjax-container>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="fields-group">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">组名</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" id="name" name="name" value="{{ $group->name }}" class="form-control" placeholder="输入 组名">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="commit" class="col-sm-2 control-label">描述</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                        <input type="text" id="commit" name="commit" value="{{ $group->commit }}" class="form-control" placeholder="输入 组描述">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="covers" class="col-sm-2 control-label">组图片</label>
                                <div class="col-sm-8">
                                    <!-- accept指定上传文件的类型 multiple可以上传多个文件 -->
                                    <input type="file" class="covers" name="covers" id="covers" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="covers" class="col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <img src="{{ $group->group_head }}" alt="显示失败" width="100" height="100" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="btn-group pull-left">
                            <button type="reset" class="btn btn-warning">重置</button>
                        </div>
                        <div class="btn-group pull-right">
                            <button type="submit" id="submit-btn" class="btn btn-info pull-right" data-loading-text="<i class='fa fa-spinner fa-spin'></i> 提交">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.form-history-back').on('click', function (event) {
                //取消事件的默认动作
                event.preventDefault();
                history.back();
            });

            ///
            $("#post-form").bootstrapValidator({
                // excluded: [':disabled', ':hidden', ':not(:visible)'],//排除无需验证的控件，比如被禁用的或者被隐藏的
                //:not(:visible) 不可见元素
                //submitButtons: '#btn-test',//指定提交按钮，如果验证失败则变成disabled，但我没试成功，反而加了这句话非submit按钮也会提交到action指定页面
                // live 验证时机 enable(默认) 内容有变化就验证 diaabled和submitted 是提交再验证
                live: 'enable',
                //根据验证结果显示图标
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    name:{
                        validators:{
                            notEmpty:{
                                message: '请输入组名'//验证失败时提示
                            }
                            //stringLength{//检测长度 min: ,max: , message:}
                            //regexp:{//正则验证 regexp: ,message:}
                            //remote:{//将内容发送至指定页面验证，返回验证结果，比如查询用户名是否存在 url: ,message:}
                            //different{//与指定文本框比较内容,内容不能相同 field:指定文本框name,message:}
                            //emailAddress{//判断email地址 message}
                            //identical{//与指定控件内容比较是否相同 ，如判断两次密码是否一致 field:指定文本框name,message:}
                            //date{//验证指定日期格式 format:YYYY/MM/DD,message:}
                            //choice{//check控件选择的数量 min: max: message:}
                        }
                    }
                }
            });

            $("#submit-btn").click(function () {
                var $form = $("#post-form");

                $form.bootstrapValidator('validate');//提交验证
                if ($form.data('bootstrapValidator').isValid()) { //获取验证结果，如果成功。。。。
                    $form.submit();
                }
            })
        });
    </script>
@endsection