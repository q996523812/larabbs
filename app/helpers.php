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