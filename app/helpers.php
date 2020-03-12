<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}


function category_nav_active($category_id)
{
	/**
	 *扩展包 active_class 的用法
	 如果 $condition 不为 True 即会返回字符串 `active`
	 *
	 * @param        $condition
	 * @param string $activeClass
	 * @param string $inactiveClass
	 *
	 * @return string
	 */
	//function active_class($condition, $activeClass = 'active', $inactiveClass = '')
    return active_class((if_route('categories.show') && if_route_param('category', $category_id)));
}

function project_nav_active($type)
{
    return active_class((if_route('projects.list') && if_route_param('projects/list',$type)));
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}

function get_project_type_name($type){
	$name = '';
	switch ($type) {
		case 'qycg':
			$name = '企业采购';
			break;
		case 'zczl':
			$name = '资产租赁';
			break;
		case 'zzkg':
			$name = '增资扩股';
			break;
		case 'zczr':
			$name = '资产转让';
			break;
		case 'cqzr':
			$name = '产权转让';
			break;
		
		default:
			# code...
			break;
	}
	return $name;
}