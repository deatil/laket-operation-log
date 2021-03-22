<?php

use think\facade\Route;
use Laket\Admin\OperationLog\Controller\OperationLog;
use Laket\Admin\Facade\Flash;

/**
 * 闪存插件路由
 */
Flash::routes(function() {
    Route::get('operation-log/index', OperationLog::class . '@index')->name('admin.operation-log.index');
    Route::post('operation-log/index', OperationLog::class . '@index')->name('admin.operation-log.index-post');
    Route::get('operation-log/view', OperationLog::class . '@view')->name('admin.operation-log.view');
    Route::post('operation-log/clear', OperationLog::class . '@clear')->name('admin.operation-log.clear-post');
});