<?php if (!defined('THINK_PATH')) exit();?><html lang="en"><head>
        <meta charset="UTF-8">
        <title>欢迎您登录阿丽龙虾</title>
        <link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/login.css" media="all">
       	<link rel="stylesheet" type="text/css" href="/Public/bootstrap/css/blue_color.css" media="all">
    </head>
    <body id="login-page" style="">
        <div id="main-content">

            <!-- 主体 -->
            <div class="login-body">
                <div class="login-main pr">
                    <form action="<?php echo U('Login/Index/index');?>" method="post" class="login-form">
                        <h3 class="welcome"><i class="login-logo"></i>阿丽龙虾管理平台</h3>
                        <div id="itemBox" class="item-box">
                            <div class="item">
                                <i>用户名</i>
                                <input type="text" name="username" placeholder="请填写用户名" autocomplete="off" id="username">
                            </div>
                            <span class="placeholder_copy placeholder_un">请填写用户名</span>
                            <div class="item b0">
                                <i>密码</i>
                                <input type="password" name="password" placeholder="请填写密码" autocomplete="off" id="password">
                            </div>
                            <span class="placeholder_copy placeholder_pwd">请填写密码</span>
                        </div>
                        <div class="login_btn_panel">
                            <button class="login-btn" type="submit">
                                <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                                <span class="on">登 录</span>
                            </button>
                            <div class="check-tips"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	<!--[if lt IE 9]>
    <script type="text/javascript" src="/onethink/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/bootstrap/js/jquery.js"></script>
    <!--<![endif]-->
    <script type="text/javascript">
        //检查输入框是否为空
        $(".login-btn").click(function(){
            var username=$("#username").val();
            var password=$("#password").val();
            if(username==""||password==""){
                alert('请检查登录信息是否完整!');
                return false;
            }
        });        
    	/* 登陆表单获取焦点变色 */
    	$(".login-form").on("focus", "input", function(){
            $(this).closest('.item').addClass('focus');
        }).on("blur","input",function(){
            $(this).closest('.item').removeClass('focus');
        });

    	//表单提交
    	$(document)
	    	.ajaxStart(function(){
	    		$("button:submit").addClass("log-in").attr("disabled", true);
	    	})
	    	.ajaxStop(function(){
	    		$("button:submit").removeClass("log-in").attr("disabled", false);
	    	});


		$(function(){
			//初始化选中用户名输入框
			$("#itemBox").find("input[name=username]").focus();
			//刷新验证码
			var verifyimg = $(".verifyimg").attr("src");
            $(".reloadverify").click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });

            //placeholder兼容性
                //如果支持 
            function isPlaceholer(){
                var input = document.createElement('input');
                return "placeholder" in input;
            }
                //如果不支持
            if(!isPlaceholer()){
                $(".placeholder_copy").css({
                    display:'block'
                })
                $("#itemBox input").keydown(function(){
                    $(this).parents(".item").next(".placeholder_copy").css({
                        display:'none'
                    })                    
                })
                $("#itemBox input").blur(function(){
                    if($(this).val()==""){
                        $(this).parents(".item").next(".placeholder_copy").css({
                            display:'block'
                        })                      
                    }
                })
                
                
            }
		});
    </script>

<div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	    <span style="color: rgb(0, 0, 0); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">基本</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">文件</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">流程</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">错误</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">SQL</span>
        <span style="color: rgb(153, 153, 153); padding-right: 12px; height: 30px; line-height: 30px; display: inline-block; margin-right: 3px; cursor: pointer; font-weight: 700;">调试</span>
    </div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		    <div style="display: block;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2015-04-28 14:58:18 HTTP/1.1 GET : /onethink/index.php?s=/admin/public/login.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.1333s ( Load:0.0676s Init:0.0170s Exec:0.0054s Template:0.0433s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 7.50req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,133.61 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 0 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 36</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 2 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 164</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=1gajsugmfh6mvp6uf5d5emmn24</li>    </ol>
    </div>
        <div style="display: none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\index.php ( 1.05 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\ThinkPHP.php ( 5.33 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Think.class.php ( 11.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Storage.class.php ( 1.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.52 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Conf\Mode\common.php ( 2.95 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Common\functions.php ( 42.99 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Common\Common\function.php ( 23.16 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Hook.class.php ( 4.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\App.class.php ( 11.58 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Route.class.php ( 10.67 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Controller.class.php ( 10.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\View.class.php ( 7.12 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior.class.php ( 1.62 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\ReadHtmlCacheBehavior.class.php ( 6.26 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\ShowPageTraceBehavior.class.php ( 5.48 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\ParseTemplateBehavior.class.php ( 5.87 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\ContentReplaceBehavior.class.php ( 2.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\TokenBuildBehavior.class.php ( 2.45 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Behavior\WriteHtmlCacheBehavior.class.php ( 1.05 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Conf\convention.php ( 8.94 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Common\Conf\config.php ( 1.96 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Common\Conf\tags.php ( 0.07 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Lang\zh-cn.php ( 2.59 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Common\Behavior\InitHookBehavior.class.php ( 1.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Cache.class.php ( 3.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Cache\Driver\File.class.php ( 5.88 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Admin\Conf\config.php ( 5.24 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Admin\Common\function.php ( 12.90 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Application\Admin\Controller\PublicController.class.php ( 2.74 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Template.class.php ( 28.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\ThinkPHP\Library\Think\Template\TagLib.class.php ( 8.93 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">F:\phpEnve\Apache\htdocs\OneThink\Runtime\Cache\Admin\3c5566b2bfbf6ef00ac5366ba47246fe.php ( 5.56 KB )</li>    </ol>
    </div>
        <div style="display: none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Common\Behavior\InitHook [ RunTime:0.006000s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.006198s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ path_info ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ path_info ] --END-- [ RunTime:0.000077s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Think\Behavior\ReadHtmlCache [ RunTime:0.000170s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000325s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ action_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ action_begin ] --END-- [ RunTime:0.000135s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_begin ] --END-- [ RunTime:0.000083s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Think\Behavior\ContentReplace [ RunTime:0.000354s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000617s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Think\Behavior\ParseTemplate [ RunTime:0.031839s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.032036s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Think\Behavior\TokenBuild [ RunTime:0.000217s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Think\Behavior\WriteHtmlCache [ RunTime:0.000052s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000500s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_end ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_end ] --END-- [ RunTime:0.000045s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display: none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[8] Undefined index: m F:\phpEnve\Apache\htdocs\OneThink\Application\Common\Behavior\InitHookBehavior.class.php 第 21 行.</li>    </ol>
    </div>
        <div style="display: none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display: none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
</div>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
(tab_tit[history[1]] || tab_tit[0]).click();
})();
</script>
</body></html>