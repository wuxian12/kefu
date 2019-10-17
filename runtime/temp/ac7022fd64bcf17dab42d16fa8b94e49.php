<?php /*a:1:{s:53:"F:\www\kefu\application\service\view\login\index.html";i:1571122069;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?php echo htmlentities($version); ?>客服登录页面</title>
    <script type="text/javascript" src="/static/service/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="/static/service/js/layui/layui.js"></script>
    <link href="/static/service/css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="login_box">
    <div class="login_l_img"><img src="/static/service/images/login-img.png" /></div>
    <div class="login">
        <div class="login_logo"><a href="javascript:;"><img src="/static/service/images/login_logo.png" /></a></div>
        <div class="login_name">
            <p>laykefu 登录页面</p>
        </div>
        <div class="login-form">
            <input name="username" type="text" placeholder="用户名" id="u" >
            <input name="password" type="password" id="p" placeholder="密码"/>
            <input value="登录" style="width:100%;" type="button" id="btn">
        </div>
    </div>
    <div class="copyright">&copy; 2018-<?php echo date('Y');?> <a href="https://github.com/shmilylbelva/laykefu" target="_blank">laykefu</a> <?php echo htmlentities($version); ?></div>
</div>
<script>
    document.onkeydown=function(event){
        var e = event || window.event || arguments.callee.caller.arguments[0];
        if(e && e.keyCode==13){ // enter 键
            doLogin();
        }
    };

    $(function(){
        $("#btn").click(function(){
            doLogin();
        });
    });

    function doLogin(){
        layui.use(['layer'], function(){
            var layer = layui.layer;
            layer.ready(function(){
                var user_name = $("#u").val();
                var password = $("#p").val();

                if('' == user_name){
                    layer.tips('请输入用户名', '#u');
                    return false;
                }

                if('' == password){
                    layer.tips('请输入密码', '#p');
                    return false;
                }

                var index = layer.load(0, {shade: false});
                $.post("<?php echo url('login/doLogin'); ?>", {username: user_name, password: password}, function(res){
                    layer.close(index);
                    if(1 == res.code){
                        window.location.href = res.data;
                    }else{
                        return layer.msg(res.msg, {icon: 2, anim: 6});
                    }
                }, 'json');
            });
        });
    }
</script>
</body>
</html>
