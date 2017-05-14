<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/14
 * Time: 12:50
 */

namespace Admin\Controller;


use Think\Controller;
use Think\Upload;

class UploadController extends Controller
{
    public function index(){
        $dir=$_POST['dir'];

        $config=array(
//            'rootPath'     => './Uploads/', //保存根路径
            'rootPath'     => './',
//            'savePath'     => $dir.'/', //保存路径
//
            'driver'       => 'Upyun', // 文件上传驱动
            'driverConfig' => array(
                'host'     => 'v0.api.upyun.com', //又拍云服务器
                'username' => 'admin222', //又拍操作员用户
                'password' => 'admin223', //又拍云操作员密码
                'bucket'   => 'admin111', //空间名称
                'timeout'  => 90, //超时时间
            ), // 上传驱动配置
        );
        $upload=new Upload($config);
        $res=$upload->uploadOne($_FILES['Filedata']);
        if($res!==false){
            //将上传后的路径发送给浏览器
            echo $res['savepath'].$res['savename']; //保存到upyun上的地址
        }else{
            echo $upload->getError();
        }



    }

}