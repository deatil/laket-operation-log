<?php

use think\facade\Route;
use Laket\Admin\OperationLog\Controller\OperationLog;
use Laket\Admin\Facade\Flash;

/**
 * 闪存插件路由
 */
Flash::routes(function() {
    Route::get('operation-log/index', OperationLog::class . '@index')->name('admin.operation-log.index');
    Route::get('operation-log/index-data', OperationLog::class . '@indexData')->name('admin.operation-log.index-data');
    Route::get('operation-log/view', OperationLog::class . '@view')->name('admin.operation-log.view');
    Route::post('operation-log/clear', OperationLog::class . '@clear')->name('admin.operation-log.clear');
});