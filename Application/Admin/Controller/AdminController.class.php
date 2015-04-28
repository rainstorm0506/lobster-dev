<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Controller;
/**
 * Description of AdminController
 *
 * @author Administrator
 */
class AdminController extends Controller{
    //安全退出登录
    public function logout(){
        //清空session里面的数据
        $_SESSION["userinfo"]="";
        redirect(U('Login/Index/index'));
    }
    //展示后台界面,默认是用户管理
    public function index(){
        $user_model=D("User");
       // $p=  isset(I("get.p"))?1:I("get.p");
        $where=array("status"=>array("EGT",0));
        $result=$user_model->page($where);
        $this->assign($result);
        $this->display();
    }
    //添加用户
    public function addUser(){
        $user_model=D("User");
        if(IS_POST){
            if($user_model->create()!==false){
                $data=$user_model->data();
                if($data["super_manager"]==1){
                    $data["status"]=1;
                }else{
                    $data["status"]=0;
                }
                if($user_model->add($data)!==false){
                    $this->success("保存用户成功", U('Admin/Admin/index'));
                    exit();
                }else{
                    $this->error("保存用户失败", U('Admin/Admin/index'));
                }
            }
        }else{
            $this->display('index');
        }
    }
    //禁止用户
    public function forbidden(){
        $user_model=D("User");
        $id=$_POST["id"];
        
        $user_model->status=0;
        $res=$user_model->where("id=$id")->save();
        
        $mes="禁用失败";
        if($res!==false){
            $mes="禁用成功";
        }
        $this->ajaxReturn($mes);
    }
    
    //删除用户
    public function deluser(){
        $user_model=D("User");
        $id=$_POST["id"];
        
        $user_model->status=-1;
        $res=$user_model->where("id=$id")->save();

        $mes="删除用户失败";
        if($res!==false){
            $mes="删除用户成功";
        }
        $this->ajaxReturn($mes);
    }
    
    //启用用户
    public function openuser(){
        $user_model=D("User");
        $id=$_POST["id"];
        
        $user_model->status=1;
        $res=$user_model->where("id=$id")->save();
        $mes="启用失败";
        if($res!==false){
            $mes="启用成功";
        }
        $this->ajaxReturn($mes);
        
    }

    //展示产品列表
    public function lists(){
        $goodsModel=D("Goods");
        $res=$goodsModel->page();
        $this->assign($res);
        $this->display();
    }
    //订单列表
    public function orders(){
        $ordersModel=D("Orders");
        $res=$ordersModel->page();

        $this->assign($res);
        $this->display();
    }
    //展示在线订座的记录
    public function reservation(){
        $reservationModel=D("Reservation");
        if(IS_POST){    //执行删除一条订座记录 
            $id=$_POST["id"];
            $res=$reservationModel->where("id={$id}")->delete();
            if($res!==false){
                $this->ajaxReturn("删除订座成功");
            }else{
                $this->ajaxReturn("删除订座失败");
            }
        }else{
            $res=$reservationModel->page();

            $this->assign($res);
            $this->display();
        }
    }
    //展示餐厅座位表
    public function seats(){
        $seatsModel=D("Seats");
        $res=$seatsModel->page();

        $this->assign($res);
        $this->display();
    }
    //展示“员工列表”的页面
    public function employees(){
        $employeeModel=D("Employees");
        $res=$employeeModel->page();
        
        $this->assign($res);
        $this->display();
    }
}
