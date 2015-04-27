<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Login\Model;
use Think\Model;
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class UserModel extends Model{
    //put your code here
    protected $_validate        =   array(
                array('username','require','用户名不能够空'),
                array('password','require','密码不能够空'),
            );  // 自动验证定义  
    
    protected $_auto     =array(
           array("password","md5",3,"function")
       );
    
    public function checkLogin(){
          //先通过用户名，查出是否有记录
           $adminName=$this->data["username"];
           $requestPassword=$this->data["password"];

           $row=$this->where(array("username"=>$adminName))->find();
           //如果查到了一条记录，说明用户名是正确的,该判断密码
           if($row){
               if($row['status']==0){
                   return -3;//表示禁用
               }            
               if($requestPassword===$row["password"]){
                   return $row;
               }else{
                   //表示密码错误
                   return -2;
               }
           }else{
               //表示用户名错误
               return -1;
           }
       }
}
