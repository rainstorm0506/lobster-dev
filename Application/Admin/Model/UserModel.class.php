<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of UserModel
 *
 * @author Administrator
 */
class UserModel extends BaseModel{
    //put your code here
    protected $_validate        =   array(
                array('username','require','用户名不能够空'),
                array('password','require','密码不能够空'),
            );  // 自动验证定义  
    
    protected $_auto     =array(
           array("password","md5",3,"function")
       );
   
}
