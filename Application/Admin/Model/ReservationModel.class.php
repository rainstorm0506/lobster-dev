<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of ReservationModel
 *
 * @author Administrator
 */
class ReservationModel extends BaseModel{
    //put your code here
    protected function _goodsName(&$rows) {
        foreach ($rows as &$row) {
            $seats_id=$row["seats_id"];
            //根据座位id去查询出对应的座位编号“seat_number”
            $sql="select * from seats where seat_number={$seats_id}";
            $data=$this->query($sql);

            if(count($data)==0){
                $row["seat_num"]="暂无该";
            }else{
                $row["seat_num"]=$data[0]["seat_number"];
            }
        }
    }
}
