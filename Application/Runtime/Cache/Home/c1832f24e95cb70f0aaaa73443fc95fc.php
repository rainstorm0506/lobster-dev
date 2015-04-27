<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>阿丽小龙虾</title>
<meta name="description" content="阿丽小龙虾,龙虾,阿丽,小龙虾" />
<meta name="keywords" content="阿丽小龙虾" />
<link type="text/css" href="/Public/bootstrap/css/base.css" rel="stylesheet" />
<script type="text/javascript" src="/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/bootstrap/js/formValidator_min.js"></script>
<!--[if lte IE 6]>
<script src="/Public/bootstrap/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
<script type="text/javascript">
DD_belatedPNG.fix('div , a , span');
</script>
<![endif]--> 
</head>
<body>
<div class="header"></div>
<div class="wbanner"><div class="banner">
	<menu class="f18">
		<a href="<?php echo U('Index/index');?>">首页</a>
		<a href="<?php echo U('Seats/index');?>">在线选座</a>
		<a href="<?php echo U('Orders/query');?>">查询订单</a>
		<a href="<?php echo U('Help/index');?>">帮助中心</a>
    </menu>
</div></div>
<div class="main">
    <div class="con fl con2" style="margin-top:30px;">
          	<h1>确认您的联系方式和地址：</h1>
    	    <div class="red f14">
                <p>联系方式：<?php echo ($row["phone_number"]); ?></p>
                <p>联系地址：<?php echo ($row["address"]); ?></p> 
            </div>
            <div class="an f14">
            	<a class="" href="<?php echo U('dinnerAdd');?>">上一步</a>
                <a class="" href="<?php echo U('dinnerFinish',array('orders_id'=>$orders_id));?>">提交订单</a>
            </div>

  </div>
</div>
<div class="footer">
	<div class="bot">
    	<div class="copyright fl">
        <p class="f18">阿丽小龙虾</p>
        <p>地址： 江苏淮安清河区上海路利苑新村二区14幢107号(近利苑路)</p>
        <p>电话： 0517-86210712</p>
        <p>营业时间中午11:00到凌晨2:00，可外卖，市区内60元以上免费外送！</p>
        </div>
        <div class="fr f18">
        	关注我们<br /><img src="/Public/bootstrap/images/er.gif" width="83" height="83" />
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$.formValidator.initConfig({alertMessage:false});
	$("#add").formValidator({onshow:"请输入详细送餐地址",onfocus:"请输入详细送餐地址",oncorrect:"填写正确"}).InputValidator({min:11,max:11,onerror:"请输入详细送餐地址"}).RegexValidator({regexp:"^.*$",onerror:"请输入详细送餐地址"});

});	

</script>

</body>
</html>