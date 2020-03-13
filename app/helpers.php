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
function model_admin_link($title, $model)
{
    return model_link($title, $model, 'admin');
}

function model_link($title, $model, $prefix = '')
{
    // 获取数据模型的复数蛇形命名
    $model_name = model_plural_name($model);

    // 初始化前缀
    $prefix = $prefix ? "/$prefix/" : '/';

    // 使用站点 URL 拼接全量 URL
    $url = config('app.url') . $prefix . $model_name . '/' . $model->id;

    // 拼接 HTML A 标签，并返回
    return '<a href="' . $url . '" target="_blank">' . $title . '</a>';
}

function model_plural_name($model)
{
    // 从实体中获取完整类名，例如：App\Models\User
    $full_class_name = get_class($model);

    // 获取基础类名，例如：传参 `App\Models\User` 会得到 `User`
    $class_name = class_basename($full_class_name);

    // 蛇形命名，例如：传参 `User`  会得到 `user`, `FooBar` 会得到 `foo_bar`
    $snake_case_name = snake_case($class_name);

    // 获取子串的复数形式，例如：传参 `user` 会得到 `users`
    return str_plural($snake_case_name);
}