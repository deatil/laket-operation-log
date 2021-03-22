<?php

declare (strict_types = 1);

namespace Laket\Admin\OperationLog\Middleware;

use Closure;
use think\App;
use think\helper\Arr;
use Laket\Admin\OperationLog\Model\OperationLog as OperationLogModel;

/**
 * 记录日志
 *
 * @create 2021-3-22
 * @author deatil
 */
class RecordLog
{
    /** @var App */
    protected $app;
    
    public function __construct(App $app)
    {
        $this->app  = $app;
    }
    
    /**
     * @var
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // 记录日志
        $msg = request()->param();
        
        // 过滤密码
        Arr::forget($msg, [
            'password',
            'password_confirm',
            'password2',
            'password2_confirm',
        ]);
        
        OperationLogModel::record(json_encode($msg), 1);
        
        return $response;
    }
}
