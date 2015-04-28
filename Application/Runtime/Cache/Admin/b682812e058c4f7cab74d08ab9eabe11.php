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
    
    </head>
    <body>
        
<nav class="navbar navbar-default">
  <div class="container-fluid">        
            
        <div class="container">
            <!----导航栏开始------->
            <ul class="nav nav-pills">
              <li role="presentation" class="active"><a href="<?php echo U('Admin/index');?>"><h4>用户管理</h4></a></li>
              <li role="presentation"><a href="<?php echo U('Admin/lists');?>"><h4>产品列表</h4></a></li>
              <li role="presentation"><a href="<?php echo U('Admin/orders');?>"><h4>订单列表</h4></a></li>
              <li role="presentation"><a href="<?php echo U('Admin/seats');?>"><h4>座位分布表</h4></a></li>
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
        
        
        <div class="container">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-left: 950px">
              添加用户
            </button>
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加用户</h4>
                  </div>
                  <div class="modal-body">
                    <!---添加用户的form表单--->
                    <form action="<?php echo U('Admin/Admin/addUser');?>" method="post">
                          <div class="form-group">
                            <label for="exampleInputEmail1">用户名</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="请输入用户名">
                          </div>
                          
                          <div class="form-group">
                            <label for="exampleInputPassword1">密码</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="请输入你的密码">
                          </div>
                        <!----是否为超级管理员---->
                        <div class="radio">
                          <lable><strong>是否为超级管理员:</strong></lable>&nbsp;&nbsp;
                          <label>
                              <input type="radio" name="super_manager"  value=1>
                            管理员
                          </label>
                            
                          <label>
                            <input type="radio" name="super_manager" value=0 checked>
                            普通员工
                          </label>
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
            <!-- Button trigger modal -->

            <table class="table table-bordered">
              <tr>
                  <th>用户名</th>
                  <th>状态</th>
                  <th>操作</th>
              </tr>
              <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($row["username"]); ?></td>
                  <td>
                        <?php if($row['status']==1): ?><button class="btn btn-success">正常用户</button>
                            <?php else: ?> 
                            <button class="btn btn-danger">用户已被禁止</button>
                            <button class="btn btn-warning openuser" value="<?php echo ($row["id"]); ?>">启用该用户</button><?php endif; ?>                      
                  </td>
                  <td>
                      <span>
                          <a href="javascript:void(0)" value="<?php echo ($row["id"]); ?>" class="forbidden">禁用该用户</a>
                      </span>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span>
                          <a href="javascript:void(0)" value="<?php echo ($row["id"]); ?>" class="deluser">永久删除用户</a>
                      </span>
                  </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            
            <div id="turn-page" class="page">
                <?php echo ($pageHTML); ?>
            </div>
        </div>
    
        
    <script type="text/javascript"> 
        $(function(){
            //检查输入框是否为空
            $("#confirm").click(function(){
                var username=$("#username").val();
                var password=$("#password").val();
                if(username==""||password==""){
                    alert('请检查登录信息是否完整!');
                    return false;
                }
            });
            //启用用户
            $(".openuser").click(function(){
                var res=confirm("确定要启用该用户吗？");
                if(res){
                    var id=$(this).attr("value");
                    $.post(
                            "<?php echo U('Admin/Admin/openuser');?>",
                            {id:id},
                            function(data){
                                alert(data);
                                location.href="<?php echo U('Admin/Admin/index');?>";
                            }
                    );
                }
            });            
            //禁止用户
            $(".forbidden").click(function(){
                var res=confirm("确定要禁用该用户吗？");
                if(res){
                    var id=$(this).attr("value");
                    $.post(
                            "<?php echo U('Admin/Admin/forbidden');?>",
                            {id:id},
                            function(data){
                                alert(data);
                                location.href="<?php echo U('Admin/Admin/index');?>";
                            }
                    );
                }
            });
            //删除用户
            $(".deluser").click(function(){
                var res=confirm("确定要永久删除该用户吗？");
                if(res){
                    var id=$(this).attr("value");
                    $.post(
                            "<?php echo U('Admin/Admin/deluser');?>",
                            {id:id},
                            function(data){
                                alert(data);
                                location.href="<?php echo U('Admin/Admin/index');?>";
                            }
                    );                
                }
            });
            
        });
    </script>

    </body>
</html>