<?php

declare (strict_types = 1);

namespace Laket\Admin\OperationLog\Model;

use think\Model;

use Laket\Admin\Facade\AuthData;

/**
 * 操作日志
 *
 * @create 2021-3-21
 * @author deatil
 */
class OperationLog extends Model
{
    // 设置当前模型对应的数据表名称
    protected $name = 'operation_log';
    
    // 设置主键名
    protected $pk = 'id';
    
    // 时间字段取出后的默认时间格式
    protected $dateFormat = false;

    public static function onBeforeInsert($model)
    {
        $id = md5(mt_rand(10000, 99999) . microtime());
        $model->setAttr('id', $id);
        
        $model->setAttr('add_time', time());
        $model->setAttr('add_ip', request()->ip());
    }

    /**
     * 记录日志
     * @param type $message 说明
     * @param  integer $status  状态
     */
    public static function record($message, $status = 0)
    {
        $admin = AuthData::getInfo();
        if (! empty($admin)) {
            $adminId = $admin['id'];
            $adminUsername = $admin['name'];
        } else {
            $adminId = 0;
            $adminUsername = '';
        }
    
        $data = [
            'admin_id' => $adminId,
            'admin_username' => $adminUsername,
            'info' => $message,
            'method' => request()->method(),
            'url' => request()->url(),
            'ip' => request()->ip(),
            'useragent' => request()->server('HTTP_USER_AGENT'),
            'status' => $status,
        ];
        return self::create($data);
    }

    /**
     * 删除一个月前的日志
     * @return boolean
     */
    public static function deleteAMonthago()
    {
        return self::where('create_time', '<= time', time() - (86400 * 30))->delete();
    }

}
