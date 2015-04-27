<?php
define("WEB_URL", '');
return array(
	//'配置项'=>'配置值'
    TMPL_PARSE_STRING  =>array(
     '__CSS__' => WEB_URL.'/Public/bootstrap/css', // 更改默认的__PUBLIC__ 替换规则
     '__JS__' => WEB_URL.'/Public/bootstrap/js', // 增加新的JS类库路径替换规则
     '__IMG__' => WEB_URL.'/Public/bootstrap/images', // 增加新的上传路径替换规则
    '__UPLOADIFY__'     => WEB_URL.'/Public/bootstrap/uploadify', // 增加新的JS类库路径替换规则
    '__UPLOADIFY_SWF__'     => WEB_URL.'/Public/bootstrap/uploadify/uploadify.swf' // 增加新的JS类库路径替换规则
    ),
    'DEFAULT_MODULE'        =>  'Home',  // 默认模块 
    //数据库配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'lobster',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8', //设置数据库编码
    "PAGESIZE"              =>10
);