<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta charset="utf-8">
        <title>阿丽龙虾后台管理</title>
        <link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.min.css" type="text/css">
        <!--加载自定义css样式-->
        <link rel="stylesheet" href="/Public/bootstrap/css/self.css" type="text/css">
        <link rel="stylesheet" href="/Public/bootstrap/css/page.css" type="text/css">
        <script type="text/javascript" src="/Public/bootstrap/js/jquery.js"></script>
        <script type="text/javascript" src="/Public/bootstrap/js/bootstrap.min.js"></script>
         <script type="text/javascript" src="/Public/bootstrap/js/jquery.tmpl.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/Public/bootstrap/uploadify/uploadify.css">

    </head>
    <body>
        
    <nav class="navbar navbar-default">
        <div class="container-fluid">        
              <div class="container">
                  <!----导航栏开始------->
                  <ul class="nav nav-pills">
                      <li role="presentation"><a href="<?php echo U('Admin/index');?>"><h4>用户管理</h4></a></li>
                      <li role="presentation"><a href="<?php echo U('Admin/lists');?>"><h4>产品列表</h4></a></li>
                      <li role="presentation"><a href="<?php echo U('Admin/orders');?>"><h4>订单列表</h4></a></li>
                      <li role="presentation"><a href="<?php echo U('Admin/seats');?>"><h4>座位分布表</h4></a></li>
                      <li role="presentation" class="active"><a href="<?php echo U('Admin/reservation');?>"><h4>订座列表</h4></a></li>
                      <li role="presentation"><a href="<?php echo U('Admin/employees');?>"><h4>员工列表</h4></a></li>
                      <li role="presentation">
                          <button type="button" class="btn btn-warning navbar-btn" style="margin-left: 320px">
                              <a href="<?php echo U('Admin/logout');?>">安全退出</a>
                          </button>
                      </li>
                  </ul>  
                  <!----导航栏结束----->
              </div> 
        </div>
    </nav>

        
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>座位编号</th>
                <th>客户名字</th>
                <th>客户电话</th>
                <th>用餐人数</th>
                <th>用餐时间</th>
                <th>订座时间</th>
            </tr>
            <?php if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!==0) echo "class='info'";echo "class='success'";?>>
                <td><?php echo ($row["seat_num"]); ?>号座</td>
                <td><?php echo ($row["custom_name"]); ?></td>
                <td><?php echo ($row["phone"]); ?></td>
                <td><?php echo ($row["meals_number"]); ?></td>
                <td><?php echo ($row["meals_time"]); ?></td>
                <td><?php echo ($row["orders_time"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <!--分页工具条---->
        <div id="turn-page" class="page">
            <?php echo ($pageHTML); ?>
        </div>
        
    </div>

        
    </body>
</html>