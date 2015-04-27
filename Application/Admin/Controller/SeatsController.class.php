<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of SeatsController
 *
 * @author Administrator
 */
class SeatsController extends \Think\Controller{
    //put your code here
    public function addSeats(){
        $data=I("post.");
        $seatsModel=D("Seats");
        if($seatsModel->create()!==false){
            if($seatsModel->add()!==false){
                $this->success("保存座位成功",U('Admin/Admin/seats'));
                exit();
            }else{
                $this->error("保存座位失败",U('Admin/Admin/seats'));
            }
        }else{
                $this->error("保存数据有误",U('Admin/Admin/seats'));
        }
        //$datas=$seatsModel->create();
    }
    //编辑的时候，需要查出对应id的那一条记录
    public function findSeats(){
        $id=$_POST["id"];
        $seatsModel=D("Seats");
        $data=$seatsModel->findOneSeats($id);
        $this->ajaxReturn($data);
    }
    //编辑表单提交的时候，需要去改变更新seats表中的数据
    public function editSeats(){
        $seatsModel=D("Seats");
        $datas=I("post.");
        //更新数据库中对应的记录
        $res=$seatsModel->where(array("id"=>$datas["id"]))->save($datas);
        //保存成功之后，会有返回值
        if($res===false){
            $this->error("更新座位表失败".$seatsModel->getError(),U('Admin/seats'));
        }else{
            $this->success("更新座位表成功成功",U('Admin/seats'));
        }
    }
    //点击删除的时候需要，删除一条记录
    public function delSeats(){
        $id=$_POST["id"];
        $seatsModel=D("Seats");
        $res=$seatsModel->where(array("id"=>$id))->delete();
        if($res){
            $this->ajaxReturn("删除产品成功");
        }
        $this->ajaxReturn("删除产品失败");
    }
    //通过“订座列表”中点击“取消订座”改变座位的状态
    public function  changeStatus(){
        $seats_number=$_POST["seat_number"];
        $seatsModel=D("Seats");
        $res=$seatsModel->where(array("seat_number"=>$seats_number))->setField("status",0);
        if($res!==false){
            $this->ajaxReturn("取消订座成功");
        }else{
            $this->ajaxReturn("取消订座失败");
        }
    }
}
