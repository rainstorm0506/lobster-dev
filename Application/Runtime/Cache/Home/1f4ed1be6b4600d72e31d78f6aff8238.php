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
    <div class="con fl" style="margin-top:30px;">
        <form id="form1" name="form1" class="fl f_2" method="post" action="<?php echo U('dinnerAdd');?>" onsubmit="return jQuery.formValidator.PageIsValid('1')" >
            <!--隐藏域，用于存放“订单ID”--->
            <input type="hidden" name='id' value="<?php echo ($orders_id); ?>">
            <h1>欢迎您，请填送餐地址:</span></h1>
            <dl>
                <dt>送餐城市：</dt>
                <dd><input name="ctry" id="ctry" type="text" class="t3 fl" value="北京" readonly><span class="red">目前只配送北京</span></dd>
            </dl>
            <dl>
                <dt>送餐地址：</dt>
                <dd><input name="address" id="add" type="text" class="t4 fl" ><span id="addTip"></span></dd>
            </dl>
            <dl>
                <dt>分量：</dt>
                <dd><input name="orders_num" id="fenliang" type="text" class="t3 fl" ><span id="fenliangTip"></span></dd>
            </dl>
            <dl>
                <dt>&nbsp;</dt>
                <dt><input type="submit" id="button" class="fl t2" value="下一步"></dt>
            </dl>
        </form>

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
	$("#add").formValidator({onshow:"请输入详细送餐地址",onfocus:"请输入详细送餐地址",oncorrect:"填写正确"}).InputValidator({min:2,onerror:"请输入详细送餐地址"}).RegexValidator({regexp:"^[a-zA-Z0-9\u4e00-\u9fa5]",onerror:"请输入详细送餐地址"});
//	$("#fenliang").formValidator({onshow:"请输入分量，只能是数字",onfocus:"请输入分量，只能是数字",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"请输入分量，只能是数字"}).RegexValidato({regexp:"^[1-9]*$",onerror:"只能是数字"});
        $("#fenliang").formValidator({onshow:"请输入分量，只能是数字",onfocus:"请输入分量，只能是数字",oncorrect:"填写正确"}).InputValidator({onerror:"请输入分量，只能是数字"}).RegexValidator({regexp:"^[1-9][0-9]*$",onerror:"请输入分量，只能是数字"});
});	

</script>

</body>
</html>