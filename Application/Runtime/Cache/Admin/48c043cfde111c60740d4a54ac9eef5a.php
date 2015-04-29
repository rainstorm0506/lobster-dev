<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="UTF-8">
        <title>阿丽龙虾管理平台</title>
        <!--bootstrap的样式---->
        <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css" type="text/css">
        <!--加载自定义css样式-->
        <link rel="stylesheet" href="/Public/bootstrap/css/self.css" type="text/css">
        <link rel="stylesheet" href="/Public/bootstrap/css/page.css" type="text/css">
        <!--bootstrap的样式---->
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/base1.css" media="all">
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/common.css" media="all">
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/module.css">
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/style.css" media="all">
            <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/blue_color.css" media="all">
         <!--[if lt IE 9]>
        <script type="text/javascript" src="/onethink/Public/static/jquery-1.10.2.min.js"></script>
        <![endif]--><!--[if gte IE 9]><!-->
        <script type="text/javascript" src="/Public/bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="/Public/bootstrap/js/jquery.mousewheel.js"></script>
        <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/Public/bootstrap/js/jquery.tmpl.min.js"></script>
        <!--<![endif]-->
        
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap/uploadify/uploadify.css">

    </head>
    <body style="">
        <!-- 头部 -->
        <div class="header">
            <!-- Logo -->
            <span class="logo" style="margin-left: 0px">
                <img src="/Public/bootstrap/images/view.jpg" style="width:190;height: 48">
            </span>
            <!-- /Logo -->

            <!-- 主导航 -->
            <ul class="main-nav">
                <li class="">
                    <a href="/onethink/index.php?s=/admin/index/index.html">首页</a>
                </li>
                <li class="manager">你好，<em title="admin">admin</em></li>
                <li><a href="/onethink/index.php?s=/admin/public/logout.html">安全退出</a></li>
            </ul>
            <!-- /主导航 -->

            <!-- 用户栏 -->
            <div class="user-bar">
                <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
                <ul class="nav-list user-menu hidden">
                    <li class="manager">你好，<em title="admin">admin</em></li>
                    <li><a href="/onethink/index.php?s=/admin/public/logout.html">安全退出</a></li>
                </ul>
            </div>
        </div>
        <!-- /头部 -->

        <!-- 边栏 -->
        <div class="sidebar" style="width: 184px;margin-left: 0px;">
            <div id="subnav" class="subnav">
                <ul>
                  <li role="presentation"><a href="<?php echo U('Admin/index');?>"><h4>用户管理</h4></a></li>
                  <li role="presentation" class="active"><a href="<?php echo U('Admin/lists');?>"><h4>产品列表</h4></a></li>
                  <li role="presentation" class="item"><a href="<?php echo U('Admin/orders');?>"><h4>订单列表</h4></a></li>
                  <li role="presentation" class="item"><a href="<?php echo U('Admin/seats');?>"><h4>座位分布表</h4></a></li>
                  <li role="presentation" class="item"><a href="<?php echo U('Admin/reservation');?>"><h4>订座列表</h4></a></li>
                  <li role="presentation" class="item"><a href="<?php echo U('Admin/employees');?>"><h4>员工列表</h4></a></li>
                </ul>        
            </div>
        </div>
        <!-- /边栏 -->

        <!-- 内容区 -->
        <div id="main-content" style="margin-top: 8px;margin-left: -25px;">
            
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>座位编号</th>
                <th>客户名字</th>
                <th>客户电话</th>
                <th>用餐人数</th>
                <th>用餐时间</th>
                <th>提交订座时间</th>
            </tr>
            <?php if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!==0) echo "class='info'";echo "class='success'";?>>
                <td><?php echo ($row["seat_num"]); ?>号座</td>
                <td><?php echo ($row["custom_name"]); ?></td>
                <td><?php echo ($row["phone"]); ?></td>
                <td><?php echo ($row["meals_number"]); ?></td>
                <td><?php echo ($row["meals_date"]); ?> <?php echo ($row["meals_time"]); ?></td>
                <td><?php echo ($row["orders_time"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <!--分页工具条---->
        <div id="turn-page" class="page">
            <?php echo ($pageHTML); ?>
        </div>
        
    </div>

        </div>
        <!-- /内容区 -->
        <!----JS代码块----->
        
    </body>
</html>