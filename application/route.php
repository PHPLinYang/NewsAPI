<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;

Route::get('api/:version/category/[:id]','api/:version.category/index');
Route::resource('api/:version/user','api/:version.user');
Route::resource('api/test','api/test');

Route::get('api/:version/index','api/:version.index/index');
Route::resource('api/:version/articles','api/:version.articles');

