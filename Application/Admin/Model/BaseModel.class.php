<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Model;
use Think\Model;
/**
 * Description of BaseModel
 *
 * @author Administrator
 */
class BaseModel extends Model{
    //put your code here
    protected $_validate        =   array(
            );  // 自动验证定义  
    
    protected $_auto     =array(
       );    
    //分页模型层
    public function page($wheres=array()) {
        $totalRows=  $this->where($wheres)->count();
        //数据开始显示的开始位置
        //开始分页
        $page=new \Think\Page($totalRows, C("PAGESIZE"));
        $start=$page->firstRow;
        if($start>=$totalRows){
            $start=$page->totalRows-$page->listRows;
        }
        if($start<=0){
            $start=0;   
        }
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END% ');
        $rows=$this->where($wheres)->limit($start,$page->listRows)->select();
        //改变数据库查询出来的记录的钩子方法
        $this->_goodsName($rows);
        $pageHTML=$page->show();
        return array("pageHTML"=>$pageHTML,"rows"=>$rows);
    } 
    //实现>>2的钩子方法
    protected function _goodsName(&$rows){
        
    }
}
