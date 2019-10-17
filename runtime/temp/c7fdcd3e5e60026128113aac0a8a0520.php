<?php /*a:2:{s:51:"F:\www\kefu\application\admin\view\index\index.html";i:1571109632;s:53:"F:\www\kefu\application\admin\view\layout\header.html";i:1571110702;}*/ ?>
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
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">今天</span>
                    <h5>正在咨询的人数</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($data['is_talking']); ?></h1>
                    <div class="stat-percent font-bold text-navy"></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">今天</span>
                    <h5>正在排队的用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($data['in_queue']); ?></h1>
                    <div class="stat-percent font-bold text-danger"></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">今天</span>
                    <h5>当前在线客服数</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($data['online_kf']); ?></h1>
                    <div class="stat-percent font-bold text-danger"></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">今天</span>
                    <h5>接入会话量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($data['success_in']); ?></h1>
                    <div class="stat-percent font-bold text-danger"></div>
                    <small></small>
                </div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">今天</span>
                    <h5>总会话量</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($data['total_in']); ?></h1>
                    <div class="stat-percent font-bold text-danger"></div>
                    <small></small>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>今日数据分析</h5>
                </div>
                <div class="ibox-content no-padding">
                    <div class="ibox-content" style="height: 350px" id="main">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/static/admin/js/plugins/echarts/echarts.min.js"></script>
<script type="text/javascript">
    var data = <?php echo $show_data; ?>;
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    var option = {
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['正在咨询的会员','排队的会员','接入会话量','总会话量']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00',
                '18:00','19:00','20:00','21:00','22:00']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name:'正在咨询的会员',
                type:'line',
                stack: '总量',
                data: data.is_talking
            },
            {
                name:'排队的会员',
                type:'line',
                stack: '总量',
                data: data.in_queue
            },
            {
                name:'接入会话量',
                type:'line',
                stack: '总量',
                data: data.success_in
            },
            {
                name:'总会话量',
                type:'line',
                stack: '总量',
                data: data.total_in
            }
        ]
    };

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</body>
</html>
