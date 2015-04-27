<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Admin\Controller;
use Think\Upload;
/**
 * Description of GoodsController
 *
 * @author Administrator
 */
class GoodsController extends \Think\Controller{
    //put your code here
    //添加产品的方法
    public function addGoods(){
            $data=  $this->dealPic();

            $_POST["goods_big_img"]=$data["goods_big_img"];
            $_POST["goods_small_img"]=$data["goods_small_img"];
            //将表单提交的数据保存到数据库，以及图片的路径
            $goods_model=D("Goods");

            if($goods_model->create()!==false){
                if($goods_model->add()!==false){
                    $this->success('保存成功',U('Admin/Admin/lists'));
                }else{
                    //保存失败...提示给用户错误信息
                    $this->error('保存失败!'.$goods_model->getError(),U('Admin/Admin/lists'));
                }
            }else{
                $this->error("保存失败!".$goods_model->getError(),U('Admin/Admin/lists'));
            }

    }
    //该函数用于上传图片之后返回图片路径
    private function dealPic(){
            /**
             * 处理上传表单元素的文件
             */
            $config = array(
                'exts'          =>  array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
                'autoSub'       =>  true, //自动子目录保存文件
                'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
                'rootPath'      =>  './Uploads/', //保存根路径
                'savePath'      =>  'goods/', //保存路径
                'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
            );

            $upload =new Upload($config);
            $result = $upload->uploadOne($_FILES['logo']);
            
            if($result!==false){
                //上传后的路径... 例如: "/Uploads/goods/2015-01-06/54aba3ea75415.png
               $goods_big_img =  substr($config['rootPath'],1).$result['savepath'].$result['savename'];
               $_POST['goods_big_img'] = $goods_big_img;
                //根据大图片生成小图片..
//                /Uploads/goods/2015-01-06/54aba3ea75415.png
//                /Uploads/goods/2015-01-06/54aba3ea75415_small.png

                //先准备路径
                $pathinfo   = pathinfo($goods_big_img);
                $goods_small_img = $pathinfo['dirname'].'/'.$pathinfo['filename'].'_small.'.$pathinfo['extension'];

                 $image = new \Think\Image();
                //>>1.先打开图片
                 $image->open(ROOT_PATH.$goods_big_img);//它需要的是一个绝对路径(带盘符)
                //>>2.生成缩略图
                $image->thumb(50,50);
                //>>3.保存缩略图
                $image->save(ROOT_PATH.$goods_small_img);//也需要绝对路径

                $_POST['goods_small_img'] = $goods_small_img; //
            }else{
                $this->error("上传失败".$upload->getError());
            } 
            return $_POST;
    }
    //根据一个产品的ID查出对应的产品,为Ajax提供返回数据
    public function findGoods(){
        $id=$_POST["id"];
        $goods_model=D("Goods");
        $data=$goods_model->findOneGoods($id);
        $this->ajaxReturn($data);
    }
    //用于修改产品
    public function editGoods(){
        $goods_model=D("Goods");
        $logo=  isset($_FILES["logo"])?$_FILES["logo"]:" ";
        $datas=I("post.");

        //指定更新的每一条数据的具体值
        $data["name"]=$datas["name"];
        $data["goods_price"]=$datas["goods_price"];
        $data["intro"]=$datas["intro"];
        $data["supply_time"]=$datas["supply_time"];
        $data["supply_data"]=$datas["supply_data"];
        $data["supply_area"]=$datas["supply_area"];
        $data["recommended"]=$datas["recommended"];
        
        if($logo["name"]!==""){   //存在logo就需要更新logo
            $picInfo=$this->dealPic();
            $data["goods_big_img"]=$picInfo["goods_big_img"];
            $data["goods_small_img"]=$picInfo["goods_small_img"];
            $res=$goods_model->where(array("id"=>$datas["id"]))->save($data);
        }else{
            $res=$goods_model->where(array("id"=>$datas["id"]))->save($data);
        }
        //保存成功之后，会有返回值
        if($res===false){
            $this->error("更新产品失败".$goods_model->getError(),U('Admin/lists'));
        }else{
            $this->success("更新产品成功",U('Admin/lists'));
        }
    }
    //下面的方法用于删除产品
    public function delGoods(){
        $id=$_POST["id"];
        $goods_model=D("Goods");
        $res=$goods_model->where(array("id"=>$id))->delete();
        if($res){
            $this->ajaxReturn("删除产品成功");
        }
        $this->ajaxReturn("删除产品失败");
    }
}
