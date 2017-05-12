<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/12
 * Time: 10:10
 */

namespace Admin\Controller;


use Think\Controller;

class GiiController extends Controller
{
    function index(){
        if(IS_POST){

            //>>1.获取表名,得到文件名
            $table_name=I('post.name');
            $filename=parse_name($table_name,1);

            //得到模板文件路径,模板内容
            $controller_path=APP_PATH.'Temple/Controller.tpl';
            require $controller_path;
            $tpl_content="<?php\r\n".ob_get_clean();
            //>>2.生成控制器
            $controller_path=APP_PATH.'Admin/Controller/'.$filename.'Controller.class.php';
            file_put_contents($controller_path,$tpl_content);


            //得到生成验证规则的数据
            $model=M();
            $sql='show full columns from '.$table_name;
            $res=$model->query($sql);
            foreach ($res as $k=> &$re) {
                if($re['field']=='id'){
                    unset($res[$k]);
                }
                $comment=$re['comment'];
                if(strpos($comment,'|')!==false){
                    $pattern  = '/(.*)\|([a-z]*)@?(.*)/';
                    preg_match($pattern,$comment,$result);
                    $re['comment']=$result[1];
                    $re['filed_type']=$result[2];
                    if(!empty($result[3])){
                        parse_str($result[3],$option_value);
                        $re['option_values']=$option_value;
                    }
                }
            }
            unset($re);
            //>>3.生成模型
            $tpl_path=APP_PATH.'Temple/Model.tpl';
            ob_start();
            require $tpl_path;
            $tpl_content="<?php\r\n".ob_get_clean();
            $model_path=APP_PATH.'Admin/Model/'.$filename.'Model.class.php';
            file_put_contents($model_path,$tpl_content);



            //>>4.生成视图
            $tpl_path_index=APP_PATH.'Temple/index.tpl';
            $tpl_path_add=APP_PATH.'Temple/edit.tpl';

            ob_start();
            require $tpl_path_index;
            $index_content=ob_get_clean();
            $index_dir=APP_PATH.'Admin/View/'.$filename;
            if(!is_dir($index_dir)){
                mkdir($index_dir,0777,true);
            }
            $index_path=$index_dir.'/index.html';
            file_put_contents($index_path,$index_content);

            ob_start();
            require $tpl_path_add;
            $add_content=ob_get_clean();
            $add_dir=APP_PATH.'Admin/View/'.$filename;
            if(!is_dir($index_dir)){
                mkdir($index_dir,0777,true);
            }
            $add_path=$add_dir.'/edit.html';
            file_put_contents($add_path,$add_content);


        }else{
            $this->display('edit');
        }


    }

}