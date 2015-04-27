<?php
namespace Login\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        if(IS_POST){
            $data=I("post.");
            $user_model=D("User");
            if($user_model->create()!==false){
                $result=$user_model->checkLogin();

                //根据返回值，判断用户是什么出错
                if(is_array($result)){  //表示正确登录
                    login($result);
                    redirect(U('Admin/Admin/lists'));
                }else{  //分几种情况
                    switch ($result) {
                        case -1:
                            $error="用户名错误";
                        break;
                        case -2:
                            $error="用户密码错误";
                        break;
                        case -3:
                            $error="用户被禁用";
                            break;
                    }
                    $this->error("登录失败".$error,U('Login/Index/index'));
                }
            }else{
                $this->error("登录失败".$user_model->getError(),U('Login/Index/index'));
            }
        }else{
            $this->display();
        }
    }
}