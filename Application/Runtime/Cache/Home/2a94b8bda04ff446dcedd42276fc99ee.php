<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>阿丽小龙虾</title>
<meta name="description" content="阿丽小龙虾,龙虾,阿丽,小龙虾" />
<meta name="keywords" content="阿丽小龙虾" />
<link type="text/css" href="/Public/bootstrap/css/base.css" rel="stylesheet" />
<link rel="stylesheet" href="/Public/bootstrap/css/page.css" type="text/css">
<!--[if lte IE 6]>
<script src="script/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script>
<script type="text/javascript">
DD_belatedPNG.fix('div , a');
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
	<div class="tit f20 bold fl">推荐美味</div>
    <div class="con fl">
    	<ul class="pro">
          <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li>
            	<a class="jg fl" href="<?php echo U('Index/details');?>">
                    <img src="<?php echo ($row["goods_big_img"]); ?>" width="210" height="132"/>
                </a>
                <div>
                    <span class="f14"><?php echo ($row["goods_price"]); ?></span>
                        <a href="<?php echo U('Index/details',array('id'=>$row['id']));?>" class="f16">
                            <?php echo ($row["name"]); ?>
                        </a>
                        <a class="gm f14" href="<?php echo U('Orders/dinner',array('id'=>$row['id']));?>">
                            开始购买
                        </a>
                </div>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      
        <!--分页工具条---->
        <div id="turn-page" class="page">
            <?php echo ($pageHTML); ?>
        </div>
    </div>
    
    <div class="tit f20 bold fl">订餐须知</div>
    <div class="con fl">
    	<ul class="liucheng f20">
        	<li>输入电话</li>
        	<li>订购菜品</li>
        	<li>确认订单</li>
        	<li>等待配送</li>
        </ul>
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