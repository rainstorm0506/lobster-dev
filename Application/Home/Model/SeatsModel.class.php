<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Home\Model;

/**
 * Description of SeatsModel
 *
 * @author Administrator
 */
class SeatsModel extends \Think\Model{
   protected $_validate = array(
       array('custom_name', 'require', '客户姓名必须填写！'), 
       array('phone', 'require', '联系电话必须填写！'), 
       array('meals_number', 'require', '就餐人数必须填写！'),
       array('meals_date', 'require', '就餐日期必须填写！'),
       array('meals_time', 'require', '就餐时间必须填写！')
    );    
    //展示所有座位
    public function showSeats(){
        $sql="select * from seats";
        $res=$this->query($sql);
        return $res;
    }
    //根据具体的座位ID，查询出记录
    public function getSeatsById($id=""){
        $item=$this->where("id={$id}")->find();
        return $item;
    }
}
