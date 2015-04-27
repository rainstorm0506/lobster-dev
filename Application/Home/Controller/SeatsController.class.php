<?php
namespace Home\Controller;

/**
 * Description of SeatsController
 *
 * @author Administrator
 */
class SeatsController extends \Think\Controller{
    //展示在线订座
    public function index(){
        //从座位表中取出所有数据
        $seats_model=D("Seats");
        $res=$seats_model->showSeats();
        $this->assign("rows",$res);
        $this->display("seat");
    }
    //保存订座信息
    public function chooseSeats(){
        $seats_model=D("Seats");
        $reservation_model=M("reservation");
        $seats_id=I("get.seats_id");
        if(IS_POST){    //保存订座数据
            $datas= $_POST;
            
            $data['seats_id']=$datas['seats_id'];
            $data['custom_name']=$datas['custom_name'];
            $data['phone']=$datas['phone'];
            $data['meals_number']=$datas['meals_number'];
            $data['meals_date']=$datas['meals_date'];
            $data['meals_time']=$datas['meals_time'];
            
            $id=$reservation_model->add($data);
            if($id){
                //$this->success("在线订座成功!",U('finishSeats',array("reservation_id"=>$id)));
                $this->ajaxReturn($id);
            }else{
                $this->ajaxReturn(0);
            }
        }else{  //展示订座页面
            //根据座位ID得倒记录
            $row=$seats_model->getSeatsById($seats_id);
            $this->assign("row",$row);
            $this->assign("seats_id",$seats_id);
            $this->display("seat_ok");
        }
    }
    //展示订座完成页面
    public function finishSeats(){
        $reservation_model=M("reservation");
        $reservation_id=I("get.reservation_id");
        
        $item=$reservation_model->where("id={$reservation_id}")->find();
        $this->assign("row",$item);
        $this->display("seat_wc");
    }
    //判断 某一桌位在某个时间点 是否存在那么一条记录
    public function searshItem(){
        $reservation_model=M("reservation");
        
        $seats_id=$_POST["seats_id"];
        $meals_date=$_POST["meals_date"];
        $meals_time=$_POST["meals_time"];
        //通过上面的三个变量，组装查询条件
        $row=$reservation_model->where(array("seats_id"=>$seats_id,"meals_date"=>$meals_date,"meals_time"=>$meals_time))->find();
        if($row){
            $this->ajaxReturn(1);
        }else{
            $this->ajaxReturn(0);
        }
    }
}
