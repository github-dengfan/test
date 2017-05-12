<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/15
 * Time: 21:08
 */
function show_model_error($model){
    $errors=$model->getError();
    $errorMsg='<ul>';
    if(is_array($errors)){
        foreach ($errors as $error) {
            $errorMsg.="<li>$error</li>";
        }
    }else{
        $errorMsg.="<li>$errors</li>";
    }
    $errorMsg.="</ul>";
    return $errorMsg;
}
//function dump($var){
//    echo '<pre>';
//    var_dump($var);
//}