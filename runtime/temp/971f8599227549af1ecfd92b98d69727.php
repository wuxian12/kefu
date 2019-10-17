<?php /*a:2:{s:57:"F:\www\kefu\application\admin\view\admins\edit_admin.html";i:1571112017;s:53:"F:\www\kefu\application\admin\view\layout\header.html";i:1571110702;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <title>laykefu-<?php echo htmlentities($version); ?>管理后台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html"/>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css?v=4.1.0" rel="stylesheet">
    <link href="/static/admin/js/layui/css/layui.css" rel="stylesheet">
    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <link href="/static/admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <script src="/static/admin/js/content.min.js?v=1.0.0"></script>
    <script src="/static/admin/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="/static/admin/js/plugins/validate/messages_zh.min.js"></script>
    <script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/static/admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
    <script src="/static/admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
    <script src="/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="/static/admin/js/contabs.js"></script>
    <script src="/static/admin/js/plugins/pace/pace.min.js"></script>
    <script src="/static/admin/js/layui/layui.js"></script>
    <script src="/static/admin/js/jquery.form.js"></script>
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑管理员</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t layui-form" id="commentForm" method="post" action="<?php echo url('admins/editadmin'); ?>">
                        <input type="hidden" value="<?php echo htmlentities($info['id']); ?>" name="id"/>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">管理员名称：</label>
                            <div class="input-group col-sm-4">
                                <input id="username" type="text" class="form-control" name="user_name" required="" aria-required="true" value="<?php echo htmlentities($info['user_name']); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">登录密码：</label>
                            <div class="input-group col-sm-4">
                                <input id="password" type="text" class="form-control" name="password" placeholder="重新输入则为修改">
                            </div>
                        </div>
                        <div class="form-group layui-form-item">
                            <label class="col-sm-3 control-label">是否启用：</label>
                            <div class="input-group col-sm-6">
                                <?php if(!empty($status)): if(is_array($status) || $status instanceof \think\Collection || $status instanceof \think\Paginator): if( count($status)==0 ) : echo "" ;else: foreach($status as $key=>$vo): ?>
                                <input type="radio" name="status" value="<?php echo htmlentities($key); ?>" title="<?php echo htmlentities($vo); ?>" <?php if($key == $info['status']): ?>checked<?php endif; ?>>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-6">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">

    layui.use(['form', 'upload'], function(){
        var form = layui.form;
    });

    var index = '';
    function showStart(){
        index = layer.load(0, {shade: false});
        return true;
    }

    function showSuccess(res){

        layer.ready(function(){
            layer.close(index);
            if(1 == res.code){
               layer.alert(res.msg, {title: '友情提示', icon: 1, closeBtn: 0}, function(){
                   window.location.href = res.data;
               });
            }else if(111 == res.code){
                window.location.reload();
            }else{
                layer.msg(res.msg, {anim: 6});
            }
        });
    }

    $(document).ready(function(){
        // 添加管理员
        var options = {
            beforeSubmit:showStart,
            success:showSuccess
        };

        $('#commentForm').submit(function(){
            $(this).ajaxSubmit(options);
            return false;
        });
    });

    // 表单验证
    $.validator.setDefaults({
        highlight: function(e) {
            $(e).closest(".form-group").removeClass("has-success").addClass("has-error")
        },
        success: function(e) {
            e.closest(".form-group").removeClass("has-error").addClass("has-success")
        },
        errorElement: "span",
        errorPlacement: function(e, r) {
            e.appendTo(r.is(":radio") || r.is(":checkbox") ? r.parent().parent().parent() : r.parent())
        },
        errorClass: "help-block m-b-none",
        validClass: "help-block m-b-none"
    });

</script>
</body>
</html>
