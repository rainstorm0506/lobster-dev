<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;

/**
 * Description of EmployeesController
 *
 * @author Administrator
 */
class EmployeesController extends \Think\Controller{
    //put your code here
    public function addEmployee(){
        $employee_model=D("Employees");
        //自动生成编号
        $_POST["sn"]= (string)rand(201500, 2015000);
        if($employee_model->create()!==false){
            if($employee_model->add()!==false){
                $this->success("保存员工成功", U('Admin/Admin/employees'));
                exit();
            }else{
                $this->error("保存员工失败", U('Admin/Admin/employees'));
            }
        }            
    }
    //点击编辑"修改员工"的执行方法
    public function editEmployee(){
        $employee_model=D("Employees");
        if(isset($_POST["ids"])){   //编辑按钮进行回显 
            $id=$_POST["ids"];
            $data=$employee_model->where(array("id"=>$id))->find();
            $this->ajaxReturn($data);
        }else{  //保存修改员工列表的数据
            $datas=I("post.");

            //更新数据库中的指定字段
            $data["emp_name"]=$datas["emp_name"];
            $data["phone"]=$datas["phone"];

            //更新员工表数据
            $res=$employee_model->where("id={$datas['id']}")->save($data);
            if($res!==false){
                $this->success("修改员工成功", U('Admin/Admin/employees'));
                exit();
            }else{
                $this->error("保存员工失败", U('Admin/Admin/employees'));
            }
        }
    }
    //下面的方法用于执行删除一条“员工信息”
    public function delEmployee(){
        $id=$_POST["id"];
        $employee_model=D("Employees");
        $res=$employee_model->where("id={$id}")->delete();
        if($res!==false){
            $this->ajaxReturn("删除员工成功");
        }else{
            $this->ajaxReturn("删除员工失败");
        }
    }
    //查询出所有员工，供“订单”页面下拉框准备数据
    public function findAll(){
        $employee_model=D("Employees");
        $res=$employee_model->page();
        $temp=array();
        foreach ($res["rows"] as $row) {
            unset($row["sn"]);
            unset($row["phone"]);
            $temp[]=$row;
        }
        $this->ajaxReturn($temp);
    }
}
