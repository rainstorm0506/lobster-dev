<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of OrdersController
 *
 * @author Administrator
 */
class OrdersController extends \Think\Controller{
    //判断是否通过审核
    public function check(){
        if(isset($_POST["id"])){    //这是通过审核
            $id=$_POST["id"];
            $ordersModel=D("Orders");
            //改变审核状态，同时需要改变“发货状态”,更新俩两个字段就行了
            $data = array('checked'=>1,'status'=>0,'checked_time'=> date("Y-m-d H:i:s", time()));
            $res=$ordersModel->where(array("id"=>$id))->setField($data);
            if($res!==false){
                $mes="通过审核并开始发货";
            }else{
                $mes="未通过审核";
            }
        }else{  //未通过审核
            $id=$_POST["ids"];
            $ordersModel=D("Orders");
            $res=$ordersModel->where(array("id"=>$id))->setField("checked",-1);
            $mes="未通过审核";
        }
        //根据更新字段的返回值，返回数据
        if($res!==false){
            $this->ajaxReturn($mes);
        }else{
            $this->ajaxReturn($mes);
        }
    }
    //点击“完成送货”按钮，执行的方法
    public function finish(){
        $id=$_POST["id"];
        $ordersModel=D("Orders");
        //根据“订单id”查询出对应的“送货人”，并返回送货人
        $deliver=$ordersModel->where("id={$id}")->getField("deliver");
        //有派送员，才更新“送货完成”状态
        if($deliver!==""){
            //$res=$ordersModel->where(array("id"=>$id))->setField("status",1);
            $data["status"]=1;
            $data["finish_time"]=  date("Y-m-d H:i:s", time());
            $res=$ordersModel->where(array("id"=>$id))->save($data);
            //根据更新字段的返回值，返回数据
            if($res!==false){
                $mes["deliver"]=$deliver;
                $mes["mes"]="完成送货";
                $this->ajaxReturn($mes);
            }
        }else{
            $mes["deliver"]="";
            $mes["mes"]="未完成送货";
            $this->ajaxReturn($mes);
        }
    }
    //当订单页面，确认了送货人之后，要向订单列表中“插入送货人”
    public function addDeliver(){
        //确认订单id
        $id=$_POST["id"];
        $deliver=$_POST["deliver"];
        
        $ordersModel=D("Orders");
        $res=$ordersModel->where(array("id"=>$id))->setField("deliver",$deliver);
        if($res!==false){
            $mes="成功指定派货员!";
        }else{
            $mes="指定派货员失败!";
        }
        $this->ajaxReturn($mes);
    }
    //订单页面的“搜索功能”,根据“订单编号”进行搜索
    public function search(){
        $sn=$_POST["sn"];
        $ordersModel=D("Orders");
        $res=$ordersModel->where("sn={$sn}")->find();
        //判断审核状态
        if($res["checked"]==0){
            $res["checked"]="正在审核";
            $res["status"]="未派送";
        }elseif($res["checked"]==1){
            $res["checked"]="通过审核";
            //判断送货状态
            if($res["status"]==0){
                $res["status"]="正在派送";
            }elseif($res["checked"]==1){
                $res["status"]="已派送";
            }else{
                $res["status"]="未派送";
            }
        }else{
            $res["checked"]="未通过审核";
            $res["status"]="未派送";
        }
        //判断“送货人”
        if($res["deliver"]==""){
            $res["deliver"]="未指派送货员";
        }
        //根据里面的goods_id查询出对应的“产品名字”及“价格”
        $goodsModel=D("Goods");
        $row=$goodsModel->getSomeField($res['goods_id']);
        $res["goods_name"]=$row["name"];
        $res["goods_price"]=$row["goods_price"];

        //$res["goods_name"]=$goodsModel->where("id={$res['goods_id']}")->getField("name");
        if($res){
            $this->ajaxReturn($res);
        }else{
            $this->ajaxReturn("没有该订单记录");
        }
    }
    //执行“订单页面”删除无用的订单
    public function delOrders(){
        //接收Ajax传过来的订单编号
        $sn=$_POST["sn"];
        $ordersModel=D("Orders");
        $res=$ordersModel->where("sn={$sn}")->delete();
        if($res!==false){
            $this->ajaxReturn("删除订单成功");
        }else{
            $this->ajaxReturn("删除订单");
        }
    }
}
