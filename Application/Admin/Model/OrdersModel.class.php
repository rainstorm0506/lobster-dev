<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of OrdersModel
 *
 * @author Administrator
 */
class OrdersModel extends BaseModel{
    //定义改变每一条数据里面的goods_id换成对应的goods_name
    protected function _goodsName(&$rows){
        foreach ($rows as &$row) {
            $goods_id=$row["goods_id"];
            $sql="select * from goods where id={$goods_id}";
            $res=$this->query($sql);
            $row["goods_name"]=$res[0]["name"];
            $row["goods_price"]=$res[0]["goods_price"];
        }
    }
}
