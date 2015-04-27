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
	<div class="tit f20 bold fl">在线选座</div>
	<div class="con fl">
    	<ul class="seat f14">
            <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li  <?php if($row['status'] == 1): ?>class="dr"<?php else: endif; ?>>
                <a href="<?php echo U('chooseSeats',array('seats_id'=>$row['id']));?>"><?php echo ($row["seat_number"]); ?>号座（<?php echo ($row["person_number"]); ?>人</a>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--        	<li><a href="seat_ok.html">2号座（2人）</a></li>
        	<li><a href="seat_ok.html">3号座（4人）</a></li>
        	<li><a href="seat_ok.html">4号座（4人）</a></li>
        	<li><a href="seat_ok.html">5号座（4人）</a></li>
        	<li class="dr">6号座（2人）</li>
        	<li><a href="seat_ok.html">7号座（4人）</a></li>
        	<li><a href="seat_ok.html">8号座（4人）</a></li>
        	<li><a href="seat_ok.html">9号座（4人）</a></li>
        	<li><a href="seat_ok.html">10号座（2人）</a></li>
        	<li><a href="seat_ok.html">11号座（4人）</a></li>
        	<li class="dr">12号座（4人）</li>-->
        </ul>
        <div class="zy red">注：红色背景代表已选，白色背景代表可以选择</div>
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


</body>
</html>