<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        //实例化goods表对象
        $goods_model=D("Goods");
        $res=$goods_model->page();
        $this->assign($res);
        $this->display();
    }
    //产品详情
    public function details(){
        $goods_model=D("Goods");
        $id=$_GET["id"];
        //根据产品ID取出对应的“产品记录”
        $item=$goods_model->findRow($id);
        //底部要显示“推荐产品”
        $res=$goods_model->page();
        $this->assign($res);
        $this->assign("row",$item);
        $this->display();
    }
}