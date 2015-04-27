<?php
namespace Admin\Behavior;
header("Content-Type:text/html;charset=utf-8");
/**
 * Description of CheckPermissionBehavior
 *
 * @author Administrator
 */
class CheckPermissionBehavior  extends \Think\Behavior{
    //put your code here
     public function run(&$params){
         //先判断用户是否登录
         if(!session('userinfo')){
             redirect(U('Login/Index/index'),2,"<h1>请先登录,2秒后自动登录</h1>");
         }else{
             $userinfo=session('userinfo');
             if($userinfo["super_manager"]!=="1"  && $_SERVER["REQUEST_URI"]==U("Admin/Admin/index")){
                 redirect(U('Admin/Admin/lists'),2,"<div style='background-color:orange'><h1>你没有访问“用户管理”的权限</h1></div>");
             }
         }
     }
}
