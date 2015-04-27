<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>阿丽小龙虾</title>
<meta name="description" content="阿丽小龙虾,龙虾,阿丽,小龙虾" />
<meta name="keywords" content="阿丽小龙虾" />
<link type="text/css" href="/Public/bootstrap/css/base.css" rel="stylesheet" />
<link type="text/css" href="/Public/bootstrap/css/jquery-ui.css" rel="stylesheet" />
<script type="text/javascript" src="/Public/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="/Public/bootstrap/js/formValidator_min.js"></script>
<script type="text/javascript" src="/Public/bootstrap/js/jquery-ui-datepicker.js"></script>
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
	<div class="tit f20 bold fl">在线选座</div>
	<div class="con fl" style="margin-top:30px;">
            <form id="form1" name="form1" class="fl f_2" method="post" action="<?php echo U('chooseSeats');?>" onsubmit="return jQuery.formValidator.PageIsValid('1')" >
                <!--保存座位的编号-->
                <input type="hidden" name='seats_id' value="<?php echo ($row["seat_number"]); ?>" id="seat_number">
                <h1>你选择的是：<?php echo ($row["seat_number"]); ?>号座（<?php echo ($row["person_number"]); ?>人）</span></h1>
                <dl>
                    <dt>姓名：</dt>
                    <dd><input name="custom_name" id="ymane" type="text" class="t1 fl" ><span id="ymaneTip"></span></dd>
                </dl>
                <dl>
                    <dt>联系电话：</dt>
                    <dd><input name="phone" id="phone" type="text" class="t1 fl" ><span id="tellTip"></span></dd>
                </dl>
                <dl>
                    <dt>就餐人数：</dt>
                    <dd><input name="meals_number" id="renshu" type="text" class="t3 fl" ><span id="renshuTip"></span></dd>
                </dl>
                <dl>
                    <dt>就餐日期：</dt>
                    <dd><input name="meals_date" id="date_1" type="text" class="t3 fl" ><span id="date_1Tip"></span></dd>
                </dl>

                <dl>
                    <dt>就餐时间：</dt>
                    <dd><input name="meals_time" id="shijian" type="text" class="t3 fl" ><span id="shijianTip"></span></dd>
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
    //根据“座位编号”和“订餐时间”去比对该座位是否“已经订座”
    $("#button").click(function(){
       var seat_number=$("#seat_number").val();
       var meals_date=$("#date_1").val();
       var meals_time=$("#shijian").val();
       console.debug(seat_number+"=="+meals_date+"=="+meals_time);
       return false;
    });
$(document).ready(function(){
	$.formValidator.initConfig({alertMessage:false});
	$("#ymane").formValidator({onshow:"请输入真实姓名,由汉字组成",onfocus:"请输入真实姓名,由汉字组成",oncorrect:"填写正确"}).InputValidator({min:4,onerror:"请输入一个由汉字组成的真实姓名"}).RegexValidator({regexp:"^[\u4e00-\u9fa5]{0,}$",onerror:"真实姓名由汉字组成"});
	$("#tell").formValidator({onshow:"由11位数字组成",onfocus:"由11位数字组成",oncorrect:"填写正确"}).InputValidator({min:11,max:11,onerror:"由11位数字组成"}).RegexValidator({regexp:"^[0-9]*$",onerror:"由11位数字组成"});
	$("#renshu").formValidator({onshow:"只能是数字",onfocus:"只能是数字",oncorrect:"填写正确"}).InputValidator({min:1,onerror:"只能是数字"}).RegexValidator({regexp:"^[1-9]*$",onerror:"只能是数字"});
	$("#date_1").formValidator({onshow:"1",onfocus:"",oncorrect:"填写正确"}).InputValidator({onerror:"1"}).RegexValidator({regexp:"^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$",onerror:"1"});
	$("#shijian").formValidator({onshow:"请输入时间，如：17:30",onfocus:"请输入时间，如：17:30",oncorrect:"填写正确"}).InputValidator({min:5,max:5,onerror:"请输入时间，如：17:30"}).RegexValidator({regexp:".*$",onerror:"请输入时间，如：17:30"});

});	
	

 $(function(){
	$("#date_1").datepicker();
});

</script>
</body>
</html>