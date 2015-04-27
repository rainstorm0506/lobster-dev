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
                <li role="presentation" class="active"><a href="<?php echo U('Admin/lists');?>"><h4>产品列表</h4></a></li>
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
            <p>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-left: 950px">
                    添加产品
                </button>
            </p>
            
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加产品</h4>
                  </div>
                  <div class="modal-body">
                    <!---添加上传产品的表单--->
                    <form action="<?php echo U('Admin/Goods/addGoods');?>" method="post" enctype="multipart/form-data">
                        
                          <div class="form-group">
                            <label>产品名称:</label>
                            <input type="text" name="name" class="form-control" id="goodsName" placeholder="请输入产品名">
                          </div>
                          
                          <div class="form-group">
                            <label>产品价格:</label>
                            <input type="text" name="goods_price" class="form-control" id="goodsPrice" placeholder="请输入价格">
                          </div>                          
                        
                          <div class="form-group">
                            <label>产品简介</label>
                            <textarea class="form-control" rows="3" name="intro"></textarea>
                          </div>
                        
                          <div class="form-group">
                            <label>供应时间</label>
                            <input type="text" name="supply_time" class="form-control"  placeholder="格式为:09:00-21:00">
                          </div>

                          <div class="form-group">
                            <label>供应日期</label>
                            <input type="text" name="supply_data" class="form-control"  placeholder="格式为:全年或者其他">
                          </div>

                          <div class="form-group">
                            <label>供应地区</label>
                            <input type="text" name="supply_area" class="form-control"  placeholder="请输入供应的地区">
                          </div>
                        
                          <div class="form-group">
                            <label>产品图片</label>
                            <input type="file" name="logo">
                          </div>                        
 
                        <div class="radio">
                          <lable><strong>是否是推荐产品:</strong></lable>&nbsp;&nbsp;
                          <label>
                            <input type="radio" name="recommended" id="optionsRadios1" value="1" checked>
                            推荐
                          </label>
                            
                          <label>
                            <input type="radio" name="recommended" id="optionsRadios1" value="0">
                            不推荐
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
            <!---产品列表显示的表格--->
            <table class="table table-striped">
              <tr>
                  <th>产品名称</th>
                  <th>产品单价</th>
                  <th>产品简介</th>
                  <th>供应时间</th>
                  <th>供应日期</th>
                  <th>供应地区</th>
                  <th>产品图片</th>
                  <th>是否推荐</th>
                  <th>操作</th>
              </tr>
              <?php if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!==0) echo "class='info'";echo "class='success'";?>>
                  <td><?php echo ($row["name"]); ?></td>
                  <td><?php echo ($row["goods_price"]); ?>/份</td>
                  <td>
                      <textarea class="form-control" rows="1"><?php echo ($row["intro"]); ?></textarea>
                  </td>
                  <td><?php echo ($row["supply_time"]); ?></td>
                  <td><?php echo ($row["supply_data"]); ?></td>
                  <td><?php echo ($row["supply_area"]); ?></td>
                  <td>
                      <img src="<?php echo ($row["goods_small_img"]); ?>" alt="<?php echo ($row["name"]); ?>">
                  </td>
                  <td>
                      <?php if($row['recommended'] == 1): ?>推荐产品
                          <?php else: ?> 普通产品<?php endif; ?>
                  </td>
                  <td>
                      <span class="flag">
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#myModal2" value="<?php echo ($row["id"]); ?>" onclick="editGoods(this)">编辑</a>
                      </span>
                      <span>
                          <a href="javascript:void(0)"value="<?php echo ($row["id"]); ?>" onclick="delGoods(this)">删除</a>
                      </span>
                  </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table> 
            <!--分页工具条---->
            <div id="turn-page" class="page">
                <?php echo ($pageHTML); ?>
            </div>
            <!---产品列表显示的表格--->
            <!-- 编辑模态框 -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改产品</h4>
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
                    <form action="<?php echo U('Admin/Goods/editGoods');?>" method="post" enctype="multipart/form-data">
                          <!----用于隐藏当前产品的ID----->
                          <input type="hidden" name="id" value="${id}">
                          <div class="form-group">
                            <label>产品名称:</label>
                            <input type="text" name="name" class="form-control" id="goodsName" placeholder="请输入产品名" value="${name}">
                          </div>
                          
                          <div class="form-group">
                            <label>产品价格:</label>
                            <input type="text" name="goods_price" class="form-control" id="goodsPrice" placeholder="请输入价格" value="${goods_price}">
                          </div>                          
                            
                          <div class="form-group">
                            <label>产品简介</label>
                            <input type="text" name="intro" class="form-control" id="intro" value="${intro}">
                          </div>

                          <div class="form-group">
                            <label>供应时间</label>
                            <input type="text" name="supply_time" class="form-control" id="intro" value="${supply_time}">
                          </div>
                          
                          <div class="form-group">
                            <label>供应日期</label>
                            <input type="text" name="supply_data" class="form-control" id="intro" value="${supply_data}">
                          </div>
                          
                          <div class="form-group">
                            <label>供应地区</label>
                            <input type="text" name="supply_area" class="form-control" id="intro" value="${supply_area}">
                          </div>

                          <div class="form-group">
                            <label>产品图片</label>
                            <input type="file" name="logo">
                          </div>  
                        <!----回显是否是推荐的产品------->
                        <div class="radio">
                          <lable><strong>是否是推荐产品:</strong></lable>&nbsp;&nbsp;
                          <label>
                              <input type="radio" name="recommended" class="editRadio"  value="1">
                            推荐
                          </label>
                            
                          <label>
                            <input type="radio" name="recommended" class="editRadio" value="0">
                            不推荐
                          </label>
                        </div> 
                        <!----回显是否是推荐的产品------->
                            <button type="submit" class="btn btn-success" id="confirm">确认提交</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           <input type="reset" value="重置" class="btn btn-info">
                        </form>
         </script>
    
        
    <script>	
        //点击编辑按钮需要触发的事件 
        function editGoods(demo){
            $("#rows").html("");
            var id=$(demo).attr("value");
            $.post(
                    "<?php echo U('Admin/Goods/findGoods');?>",
                    {id:id},
                    function(data){
                        //根据回显里面的字段recommended对单选框进行选择
                        $('#myTemplate').tmpl(data).appendTo('#rows');
                        $(".editRadio").val([data.recommended]);
                    }
            );
        }
        //点击删除按钮的时候触发的函数
        function delGoods(item){
            var id=$(item).attr("value");
            var confirms=confirm("你确定要删除吗？");
            if(confirms){
                $.post(
                        "<?php echo U('Admin/Goods/delGoods');?>",
                        {id:id},
                        function(data){
                            alert(data);
                            location.href="<?php echo U('Admin/lists');?>";
                        }
                );                
            }
        }
    </script>

    </body>
</html>