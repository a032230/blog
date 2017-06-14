<?php  

function p($var)
{
	echo "<pre>";
	print_r($var);
	echo "</pre>";
}

/**
 * [removeXss description] // 有选择性的过滤XSS --> 说明：性能非常低-》尽量少用
 * @param  [type] $data [过滤的数据]
 * @return [type]       [description]
 */
function removeXss($data){
	require_once('./htmlpurifier/HTMLPurifier.auto.php');
	$_clean_xss_config = HTMLPurifier_Config::createDefault();
	$_clean_xss_config->set('Core.Encoding', 'UTF-8');
	//设置保留的标签
	$_clean_xss_config->set('HTML.Allowed','div,b,strong,i,em,a[href|title],ul,ol,li,p,span[style],img[width|height|alt|src]');
	$_clean_xss_config->set('CSS.AllowedProperties', 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align');
	$_clean_xss_config->set('HTML.TargetBlank', TRUE);
	$_clean_xss_obj = new HTMLPurifier($_clean_xss_config);
	//执行过滤
	return $_clean_xss_obj->purify($data);

}