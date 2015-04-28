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
                      <li role="presentation" class="active"><a href="<?php echo U('Admin/seats');?>"><h4>座位分布表</h4></a></li>
                      <li role="presentation"><a href="<?php echo U('Admin/reservation');?>"><h4>订座列表</h4></a></li>
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

        
    <div class='container'>
            <p>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-left: 950px">
                    添加座位
                </button>
            </p>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加座位</h4>
                  </div>
                  <div class="modal-body">
                    <!---添加上传产品的表单--->
                    <form action="<?php echo U('Admin/Seats/addSeats');?>" method="post" enctype="multipart/form-data">
                        
                          <div class="form-group">
                            <label>座位号:</label>
                            <input type="text" name="seat_number" class="form-control" placeholder="请输入座位号">
                          </div>

                          <div class="form-group">
                            <label>可就座人数:</label>
                            <input type="text" name="person_number" class="form-control" placeholder="请输入就座人数">
                          </div>

                            <button type="submit" class="btn btn-success" id="confirm">确认提交</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="reset" value="重置" class="btn btn-info">
                        </form>
                    <!---添加用户的form表单--->
                  </div>
                </div>
              </div>
            </div>        
        <!---座位列表------>
        <table class="table table-striped">
            <tr>
                <th>座位编号</th>
                <th>多人座</th>
                <th>是否预定</th>
                <th>操作</th>
            </tr>
            <?php if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!==0) echo "class='info'";echo "class='success'";?>>
                <td><?php echo ($row["seat_number"]); ?>号座</td>
                <td><?php echo ($row["person_number"]); ?>人座</td>
                <td>
                      <?php if($row['status'] == 1): ?><button class="btn btn-success" disabled>已预订</button>
                          <button class="btn btn-danger" onclick="cancle(this)" value="<?php echo ($row["seat_number"]); ?>">取消预订</button>
                          <?php else: ?> 
                          <button class="btn btn-danger">未预订</button><?php endif; ?>                    
                </td>
                <td>
                    <span class="flag">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal2" value="<?php echo ($row["id"]); ?>" onclick="editSeats(this)">编辑</a>
                    </span>
                    <span>
                        <a href="javascript:void(0)" value="<?php echo ($row["id"]); ?>" onclick="delSeats(this)">删除</a>
                    </span>
                </td>                
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <!--分页工具条---->
        <div id="turn-page" class="page">
            <?php echo ($pageHTML); ?>
        </div>
            <!-- 编辑模态框 -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">添加产品</h4>
              </div>
                <div class="modal-body" id="rows">
                  <!---添加上传产品的表单--->
                <!---添加用户的form表单--->
              </div>
            </div>
          </div>
        </div>
        <!-- 编辑模态框 -->
        
    </div>
    <script type="text/html" id="myTemplate">
                <form action="<?php echo U('Admin/Seats/editSeats');?>" method="post" enctype="multipart/form-data">
                      <!----用于隐藏当前产品的ID----->
                      <input type="hidden" name="id" value="${id}">
                      
                      <div class="form-group">
                        <label>座位编号:</label>
                        <input type="text" name="seat_number" class="form-control" value="${seat_number}">
                      </div>

                      <div class="form-group">
                        <label>就座人数:</label>
                        <input type="text" name="person_number" class="form-control" value="${person_number}">
                      </div>
                      
                        <button type="submit" class="btn btn-success" id="confirm">确认提交</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       <input type="reset" value="重置" class="btn btn-info">
                    </form>
     </script>    

        
    <script>	
        //点击“取消订座”按钮时，要触发的事件
        function cancle(demo){
            var seat_number=$(demo).attr("value");
            $.post(
                    "<?php echo U('Seats/changeStatus');?>",
                    {seat_number:seat_number},
                    function(data){
                        //根据回显里面的字段recommended对单选框进行选择
                        console.debug(data);
                        alert(data);
                        location.href="<?php echo U('Admin/seats');?>";
                    }
            );            
        }
        //点击编辑按钮需要触发的事件 
        function editSeats(demo){
            $("#rows").html("");
            var id=$(demo).attr("value");
            $.post(
                    "<?php echo U('Admin/Seats/findSeats');?>",
                    {id:id},
                    function(data){
                        //根据回显里面的字段recommended对单选框进行选择
                        $('#myTemplate').tmpl(data).appendTo('#rows');
                    }
            );            
        }
        //点击删除按钮的时候触发的函数
        function delSeats(item){
            var id=$(item).attr("value");
            var confirms=confirm("你确定要删除吗？");
            if(confirms){
                $.post(
                        "<?php echo U('Admin/Seats/delSeats');?>",
                        {id:id},
                        function(data){
                            alert(data);
                            location.href="<?php echo U('Admin/seats');?>";
                        }
                );                
            }
        }
    </script>

    </body>
</html>