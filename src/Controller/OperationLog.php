<?php

declare (strict_types = 1);

namespace Laket\Admin\OperationLog\Controller;

use Laket\Admin\Flash\Controller as BaseController;
use Laket\Admin\OperationLog\Model\OperationLog as OperationLogModel;

/**
 * 日志
 *
 * @create 2021-3-21
 * @author deatil
 */
class OperationLog extends BaseController
{
    /**
     * 日志首页
     */
    public function index()
    {
        return $this->fetch('laket-operation-log::index');
    }
    
    /**
     * 操作日志数据
     */
    public function indexData()
    {
        $limit = $this->request->param('limit/d', 20);
        $page = $this->request->param('page/d', 1);
        
        $map = $this->buildparams();
        
        $method = $this->request->param('method/s', '');
        if (!empty($method)) {
            $map[] = ['method', '=', $method];
        }
        
        $data = OperationLogModel::where($map)
            ->page($page, $limit)
            ->order('create_time desc')
            ->select()
            ->toArray();
        
        $total = OperationLogModel::where($map)
            ->order('id DESC')
            ->count();
        
        $result = [
            "code" => 0, 
            "count" => $total, 
            "data" => $data,
        ];
        
        return $this->json($result);
    }
    
    /**
     * 详情
     */
    public function view()
    {
        $id = $this->request->param('id');
        if (empty($id)) {
            return $this->error('信息ID错误！');
        }
        
        $data = OperationLogModel::where([
                "id" => $id,
            ])
            ->find();
        if (empty($data)) {
            return $this->error('信息不存在！');
        }
        
        $this->assign("data", $data);
        
        return $this->fetch('laket-operation-log::view');
    }
    
    /**
     * 删除一个月前的操作日志
     */
    public function clear()
    {
        $status = OperationLogModel::deleteAMonthago();
        if ($status === false) {
            return $this->error("删除日志失败！");
        }
        
        return $this->success("删除日志成功！");
    }
}
