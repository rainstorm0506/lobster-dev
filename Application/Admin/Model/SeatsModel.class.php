<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;

/**
 * Description of SeatsModel
 *
 * @author Administrator
 */
class SeatsModel extends BaseModel{
    //put your code here
    public function findOneSeats($id=''){
        $item=$this->where(array("id"=>$id))->find();
        return $item;
    }
}
