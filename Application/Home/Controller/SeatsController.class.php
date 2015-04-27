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
            $data=I("post.");
            $id=$reservation_model->add($data);
            if($id){
                $this->success("在线订座成功!",U('finishSeats',array("reservation_id"=>$id)));
            }else{
                $this->error("在线订座失败");
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
}
