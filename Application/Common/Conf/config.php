<?php
return array(
	//'配置项'=>'配置值*/
	/**********数据库配置*************/
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	//'DB_PREFIX' => 'think_', // 数据库表前缀 
	'DB_DSN'    => 'mysql:host=localhost;dbname=blog;charset=utf8',
	'DEFAULT_FILTER'        =>  'trim,htmlspecialchars', // 默认参数过滤方法 用于I函数...

	// 'SHOW_PAGE_TRACE' =>TRUE,
	/**
	// 错误页面模板 
		'TMPL_ACTION_ERROR'     =>  MODULE_PATH.'View/Public/error.html', // 默认错误跳转对应的模板文件
		'TMPL_ACTION_SUCCESS'   =>  MODULE_PATH.'View/Public/success.html', // 默认成功跳转对应的模板文件
		'TMPL_EXCEPTION_FILE'   =>  MODULE_PATH.'View/Public/exception.html',// 异常页面的模板文件

	**/

	//配置路径变量
	"VIEWS" => "/Home/View/Public",
);