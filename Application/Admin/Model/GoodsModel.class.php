<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of GoodsModel
 *
 * @author Administrator
 */
class GoodsModel extends BaseModel{
    //put your code here
    public function findOneGoods($id=''){
        $item=$this->where(array("id"=>$id))->find();
        return $item;
    }
    //获取某几个字段的值
    public function getSomeField($id) {
        $sql="select name,goods_price from goods where id={$id}";
        $res=$this->query($sql);
        return $res[0];
    }
}
