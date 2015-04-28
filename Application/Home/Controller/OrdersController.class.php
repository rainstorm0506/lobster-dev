<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Controller;

/**
 * Description of OrdersController
 *
 * @author Administrator
 */
class OrdersController extends \Think\Controller{
    //put your code here
    public function index(){
        $this->display();
    }
    //查询订单
    public function query(){
        $this->display();
    }
    //开始购买
    public function dinner(){
        if(IS_POST){
           //该方法如果收到了“订单页面”过来的数据,向“订单表”添加数据
            //自定义“订单编号”
            $data["sn"]=  date("Ymd", time()).rand(100, 1000);
            $data["orders_time"]=date("Y-m_d H:i:s",  time());
            $data["goods_id"]=I("post.goods_id");
            $data["phone_number"]=I("post.phone_number");
            
            $orders_model=D("Orders");
            //添加一些数据到数据库
            $orders_id=$orders_model->addSome($data);
            if($orders_id){  //添加数据成功,展示“添加订单”的界面
                $this->success("请填写具体送餐位置！",U('dinnerAdd',array("orders_id"=>$orders_id)));
            }else{
                $this->error("订单未保存成功!");
            }              
        }else{
            $id=$_GET["id"];
            $goods_model=D("Goods");
            $item=$goods_model->findRow($id);
            $this->assign("row",$item);
            $this->display();
        }
    }
    //添加订单"单独搞一个方法"防止刷新
    public function dinnerAdd(){
        //接收订单“添加成功”返回的“订单ID”
        $orders_id=$_GET["orders_id"];
        $orders_model=D("Orders");
        
        if(IS_POST){
            $datas=I("post.");
            $data["address"]=$datas["address"];
            $data["orders_num"]=$datas["orders_num"];
            //更新orders列表
            $res=$orders_model->updateById($datas["id"],$data);
            if($res!==false){
                $this->success("请点击下面的‘确认订单’以便生效!",U("dinnerOk",array("orders_id"=>$datas["id"])));
            }else{
                $this->error("订单数据有误，请仔细审查订单数据");
            }
        }else{
            $this->assign("orders_id",$orders_id);
            $this->display("dinner_add");
        }
    }
    //用于展示“确认订单的页面”
    public function dinnerOk(){
        $orders_id=$_GET["orders_id"];
        //根据orders_id查询出“订单人”的“联系方式”和“联系地址”
        $orders_model=D("Orders");
        
        $item=$orders_model->findItem($orders_id);
        $this->assign("orders_id",$orders_id);
        $this->assign("row",$item);
        $this->display("dinner_ok");
    }
    //确认订单，改变orders表中"confirm_orders"的状态
    public function dinnerFinish(){
        $orders_id=$_GET["orders_id"];
        $orders_model=D("Orders");
        $res=$orders_model->where("id={$orders_id}")->setField("confirm_orders", 1);

        if($res!==false){
            $this->success("确认订单成功",U("dinnerConfirm",array("orders_id"=>$orders_id)));
        }else{
            $this->error("确认订单有误");
        }
    }
    //确认订单
    public function dinnerConfirm(){
        $orders_id=$_GET["orders_id"];
        $orders_model=D("Orders");
        
        $row=$orders_model->readyData($orders_id);
        $this->assign("row",$row);
        $this->display("dinner_wc");
    }
    //展示“查询订单”页面
    public function searchOrders(){
        $orders_model=D("Orders");
        $employee_model=M("Employees");
        if(IS_POST){
            $phone_number=I("post.phone_number");
            //根据订单“电话号码”查询出对应的订单信息
            $rows=$orders_model->getInfoByPhone($phone_number);
            //$rows=$orders_model->where("phone_number={$phone_number}")->find();
            //根据deliver查询出对应的“电话号码”
            $employee_model=M("Employees");
            foreach ($rows as &$row) {
                if($row['deliver']==""){
                    $row["deliver"]="未指定送货员";
                    $row["emp_phone"]="暂无号码";
                }else{
                    $row["emp_phone"]=$employee_model->where(array("emp_name"=>$row["deliver"]))->getField("phone");
                }                
            }
            $this->assign("rows",$rows);
            $this->display("searchOrders");
        }else{
            $this->dinner("query");
        }
    }
}
