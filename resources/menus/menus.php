<?php

return [
    "title" => "操作日志",
    "url" => "operation-log/index",
    "method" => "GET",
    "slug" => $this->slug,
    "icon" => "icon-createtask",
    "listorder" => 1025,
    "menu_show" => 1,
    "remark" => "",
    "children" => [
        [
            "title" => "操作日志",
            "url" => "operation-log/index",
            "method" => "GET",
            "slug" => "admin.operation-log.index",
            "icon" => "icon-neirongguanli",
            "listorder" => 5,
            "menu_show" => 1,
            "children" => [
                [
                    "title" => "操作日志",
                    "url" => "operation-log/index",
                    "method" => "GET",
                    "slug" => "admin.operation-log.index",
                    "menu_show" => 0,
                    "listorder" => 5,
                ],
                [
                    "title" => "操作日志数据",
                    "url" => "operation-log/index-data",
                    "method" => "GET",
                    "slug" => "admin.operation-log.index-data",
                    "menu_show" => 0,
                    "listorder" => 10,
                ],
                [
                    "title" => "日志详情",
                    "url" => "operation-log/view",
                    "method" => "GET",
                    "slug" => "admin.operation-log.view",
                    "menu_show" => 0,
                    "listorder" => 15,
                ],
                [
                    "title" => "清除日志",
                    "url" => "operation-log/clear",
                    "method" => "POST",
                    "slug" => "admin.operation-log.clear",
                    "menu_show" => 0,
                    "listorder" => 20,
                ],
            ],
        ],
    ],
];
