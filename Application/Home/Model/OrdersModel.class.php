<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of OrdersModel
 *
 * @author Administrator
 */
class OrdersModel extends \Think\Model{
    //保存订单的部分数据
    public function addSome($data){
            $orders_id=  $this->add($data);
            return $orders_id;
    }
    //更新指定“订单ID”的那一条数据
    public function updateById($id,$data){
        $res=$this->where("id={$id}")->save($data);
        return $res;
    }
    //根据订单ID，查询出“订货人”的 联系方式和联系地址
    public function findItem($orders_id=""){
        $sql="select phone_number,address from orders where id={$orders_id}";
        $data=$this->query($sql);
        return $data[0];
    }
    //为订单完成界面准备数据
    public function readyData($orders_id=""){
        //根据订单编号，查询出一条记录
        $row=$this->where("id={$orders_id}")->find();
        //根据goods_id查询出对应的“产品名”
        $sql="select name,goods_price from goods where id={$row['goods_id']}";
        $data=$this->query($sql);
        //组装数据
        $row["goods_name"]=$data[0]['name'];
        $row["goods_price"]=$data[0]['goods_price'];
        return $row;
    }
    //根据电话号码查询出所有的订单信息
    public function getInfoByPhone($phone){
        $sql="select * from orders where phone_number={$phone}";
        $res=$this->query($sql);
        return $res;
    }
}
