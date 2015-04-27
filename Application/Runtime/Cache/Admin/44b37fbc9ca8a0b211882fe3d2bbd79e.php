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
                <li role="presentation"><a href="<?php echo U('Admin/index');?>"><h4>用户管理</h4></a></li>
                <li role="presentation"><a href="<?php echo U('Admin/lists');?>"><h4>产品列表</h4></a></li>
                <li role="presentation" class="active"><a href="<?php echo U('Admin/orders');?>"><h4>订单列表</h4></a></li>
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
    
        
        <!--显示搜索框----->
        <div style="width: 85%;margin: 0 auto">
            <form class="navbar-form navbar-left" role="search">
               <div class="form-group">
                   <i class="glyphicon glyphicon-search"><strong>订单搜索:</strong></i>
                   <input type="text" class="form-control" placeholder="请输入要查询的订单" id="sn">
               </div>
                <button type="submit" class="btn btn-default" id="search">开始查询</button>
                <button type="submit" class="btn btn-success">
                    <a href="<?php echo U('Admin/orders');?>">返回订单列表</a>
                </button>
            </form>
        </div>
        <!--显示搜索框----->
        <div style="width: 85%;margin: 0 auto">
            <table class="table table-striped table-condensed table-bordered">
            <thead>
              <tr>
                  <th>订单编号</th>
                  <th>订单产品</th>
                  <th>订单数量</th>
                  <th>订单金额</th>
                  <th>订单时间</th>
                  <th>联系电话</th>
                  <th>送货地址</th>
                  <th>订单审核</th>
                  <th>状态</th>
                  <th>送货人</th>
              </tr>
            </thead>
            <!--表的主体-->
            <tbody id="search-result">
              <?php if(is_array($rows)): $k = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($k % 2 );++$k;?><tr <?php if($k%2!==0) echo "class='info'";echo "class='success'";?>>
                    <td><?php echo ($row["sn"]); ?></td>
                    <td><?php echo ($row["goods_name"]); ?></td>
                    <td><?php echo ($row["orders_num"]); ?>份/<?php echo ($row["goods_price"]); ?></td>
                    <td><?php echo ($row["orders_num"]*$row["goods_price"]); ?>元</td>
                    <td><?php echo ($row["orders_time"]); ?></td>
                    <td><?php echo ($row["phone_number"]); ?></td>
                    <td>
                        <textarea class="form-control" rows="1"><?php echo ($row["address"]); ?></textarea>
                    </td>
                    <!----送货地址--->
                    <td>
                        <?php if($row['checked'] == 1): ?><button class="btn btn-success" disabled="disabled">通过审核</button>
                            <?php elseif($row['checked'] == 0): ?>
                                <button class="btn btn-warning btn-xs" onclick="pass(this)" value="<?php echo ($row["id"]); ?>">通过</button>
                                <button class="btn btn-warning btn-xs" onclick="unpass(this)" value="<?php echo ($row["id"]); ?>">未通过</button>
                            <?php else: ?> 
                                <button class="btn btn-danger" disabled="disabled">未通过审核</button><?php endif; ?>                        
                    </td>
                    <!----送货地址--->
                    <!----送货状态--->
                    <td>  
                        <?php if(($row['status'] == 1) and ( $row['checked'] == 1)): ?><button class="btn btn-success" disabled="disabled">已送货</button>
                            <?php elseif(($row['status'] == 0) and ( $row['checked'] == 1)): ?>
                            <!---如果审核成功，默认就开始送货,此时需要显示“完成送货的按钮”----->
                            <button class="btn btn-warning btn-xs" disabled="disabled">已开始送货</button>
                            <button class="btn btn-success btn-xs" onclick="finish(this)" value="<?php echo ($row["id"]); ?>">完成送货</button>
                            <?php else: ?> 
                            <button class="btn btn-danger" disabled="disabled">未送货</button><?php endif; ?>                        
                    </td>
                    <!----送货状态--->
                    <!----送货人--->
                    <td>
                        <!---如果已经指派了“送货员”就直接显示---->
                        <?php if($row['deliver'] != ''): ?><select class="form-control" disabled>
                                <option><?php echo ($row['deliver']); ?></option>
                            </select>
                            <?php else: ?>
                            <!--审核通过， 开始发货-->
                            <?php if(($row['status'] == 0) and ( $row['checked'] == 1)): ?><select name="emp_name" class="form-control" id="rows" onchange="confirmEmp(this)" flag="<?php echo ($row["id"]); ?>">
                                    <option>请选择</option>
                                </select>
                            <!--审核通过，并且已完成发货,直接显示“送货人”就行了-->
                            <?php elseif(($row['status'] == 1) and ( $row['checked'] == 1)): ?>
                                <select class="form-control" disabled="disabled">
                                    <option value="<?php echo ($row["deliver"]); ?>"><?php echo ($row["deliver"]); ?></option>
                                </select>
                            <!--其他任何情形，都默认是空的 -->
                            <?php else: ?>
                                <select class="form-control">
                                    <option>---</option>
                                </select>
                                <!--再该情况下，可以删除“订单记录”---->
                                <span><a href="javascript:void(0)" value="<?php echo ($row["sn"]); ?>" onclick="delOrders(this)">删除</a></span><?php endif; endif; ?>                        
                    </td>
                    <!----送货人--->
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            </table>
            <!--分页工具条---->
            <div id="turn-page" class="page">
                <?php echo ($pageHTML); ?>
            </div>

        </div>
        <!---分派送货人的时候，需要加入的--->
        <script type="text/html" id="deliver">
            <option value="${emp_name}">${emp_name}</option>
        </script>
        <!--订单搜索出来的记录，应该放在tbody下面---->
        <script type="text/html" id="search-item">
            <tr class="success">
                <td>${sn}</td>
                <td>${goods_name}</td>
                <td>${orders_num}份/${goods_price}</td>
                <td>${orders_num*goods_price}元</td>
                <td>${orders_time}</td>
                <td>${phone_number}</td>
                <td>
                    <textarea class="form-control" rows="1">${address}</textarea>
                </td>
                <!--审核状态---->
                <td>
                    <button class="btn btn-info" disabled="disabled">${checked}</button>
                </td>
                <!---送货状态----->
                <td>
                    <button class="btn btn-info" disabled="disabled">${status}</button>
                </td>
                <!--送货人--->
                <td>
                    <strong>${deliver}</strong>
                </td>
            </tr> 
        </script>
    
        
    <script>
        //执行无用的订单删除
        function delOrders(item){
            var sn=$(item).attr("value");
            var confirms=window.confirm("你确定要删除订单号为:"+sn+"的订单吗");
            if(confirms){   //确定要删除一条订单记录
                $.post(
                        "<?php echo U('Admin/Orders/delOrders');?>",
                        {sn:sn},
                        function(data){
                            alert(data);
                            location.href="<?php echo U('Admin/Admin/orders');?>";
                        }
                );                
            }
        }
        //页面“订单查询的功能”
        $("#search").click(function(){
            var sn=$("#sn").val();
            $.post(
                    "<?php echo U('Admin/Orders/search');?>",
                    {sn:sn},
                    function(data){
                        console.debug(data);
                        $("#search-result").html("");
                        $('#search-item').tmpl(data).appendTo('#search-result');
                    }
            );             
            return false;
        });
        //选择送货人触发的函数
        function confirmEmp(demo){
            $(demo).attr("selected",true);
            var value=$(demo).val();
            var flag=$(demo).attr("flag");
            var confirms=confirm("你确定选择"+value+"派送吗?");
            if(confirms){   //点击确认让该“员工送货时” 要往数据表"orders"表中,加入"deliver"="员工名"
                $.post(
                        "<?php echo U('Admin/Orders/addDeliver');?>",
                        {id:flag,deliver:value},
                        function(data){
                            //根据回显里面的字段recommended对单选框进行选择
                           alert(data);
                           $(demo).attr("disabled",true);
                           //location.href="<?php echo U('Admin/Admin/orders');?>";
                        }
                );                
            }
        }
        //发送Ajax请求，获取到所有的送货人
        window.onload=function(){
            $.post(
                    "<?php echo U('Admin/Employees/findAll');?>",
                    function(data){
                         $('#deliver').tmpl(data).appendTo('#rows');
                         $('#deliver').tmpl(data).appendTo('#rows2');
                    }
            );            
        };
        //如果状态处于“送货”，添加“完成送货按钮”
        function finish(demo){
            var id=$(demo).attr("value");
            $.post(
                    "<?php echo U('Admin/Orders/finish');?>",
                    {id:id},
                    function(data){
                        //点击完成按钮之前，应该先判断“是否已经指定派送员”
                        if(data.deliver){
                            //要更新订单列表中的"status"=1，表示成功
                           alert(data.mes);
                           location.href="<?php echo U('Admin/Admin/orders');?>";
                        }else{
                            alert("还未指定派送员");
                            location.href="<?php echo U('Admin/Admin/orders');?>";
                        }
                    }
            );
    }
        //点击通过审核
        function pass(demo){
            var id=$(demo).attr("value");
            $.post(
                    "<?php echo U('Admin/Orders/check');?>",
                    {id:id},
                    function(data){
                        //只要一通过审核就准备“开始发货”
                        alert(data);
                        location.href="<?php echo U('Admin/Admin/orders');?>";
                    }
            );            
        }
        //点击未通过审核
        function unpass(demo){
            var id=$(demo).attr("value");
            $.post(
                    "<?php echo U('Admin/Orders/check');?>",
                    {ids:id},
                    function(data){
                        //根据回显里面的字段recommended对单选框进行选择
                        alert(data);
                        location.href="<?php echo U('Admin/Admin/orders');?>";
                    }
            );            
        }
    </script>

    </body>
</html>