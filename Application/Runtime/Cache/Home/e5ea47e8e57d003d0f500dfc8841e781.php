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
        <form id="form1" name="form1" class="fl f_1" method="post" action="<?php echo U('Orders/searchOrders');?>" onsubmit="return jQuery.formValidator.PageIsValid('1')" >
            <h1>查询订单</h1>
            <div>
                <input name="phone_number" id="tell" type="text" class="t1 fl" value="请输入您的手机号"  onclick="this.value='';focus()">
                <span id="tellTip"></span>
            </div>
            <div><input type="submit" id="button" class="fl t2" value="下一步"></div>
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
	$("#tell").formValidator({onshow:"由多位数字组成",onfocus:"由多位数字组成",oncorrect:"填写正确"}).InputValidator({min:11,max:11,onerror:"由11位数字组成"}).RegexValidator({regexp:"^[0-9]*$",onerror:"由11位数字组成"});

});	

</script>

</body>
</html>