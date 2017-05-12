<?php
defined('HOST_NAME') or define('HOST_NAME','http://admin.shop.com/');
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING'=>array(
        '__CSS__'=>HOST_NAME.'Public/Admin/css',
        '__JS__'=>HOST_NAME.'Public/Admin/js',
        '__IMG__'=>HOST_NAME.'Public/Admin/images',
        '__LAYER__'=>HOST_NAME.'Public/Admin/layer/layer.js',

    ),
);