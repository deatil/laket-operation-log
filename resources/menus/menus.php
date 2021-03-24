<?php

return [
    "title" => "操作日志",
    "url" => "admin/operation-log/index",
    "method" => "GET",
    "slug" => $this->slug,
    "icon" => "icon-createtask",
    "listorder" => 25,
    "menu_show" => 1,
    "remark" => "",
    "children" => [
        [
            "title" => "操作日志",
            "url" => "admin/operation-log/index",
            "method" => "GET",
            "slug" => "admin.operation-log.index",
            "icon" => "icon-neirongguanli",
            "listorder" => 5,
            "menu_show" => 1,
            "children" => [
                [
                    "title" => "操作日志",
                    "url" => "admin/operation-log/index",
                    "method" => "GET",
                    "slug" => "admin.operation-log.index",
                    "menu_show" => 0,
                    "listorder" => 5,
                ],
                [
                    "title" => "操作日志",
                    "url" => "admin/operation-log/index",
                    "method" => "POST",
                    "slug" => "admin.operation-log.index-post",
                    "menu_show" => 0,
                    "listorder" => 10,
                ],
                [
                    "title" => "日志详情",
                    "url" => "admin/operation-log/view",
                    "method" => "GET",
                    "slug" => "admin.operation-log.view",
                    "menu_show" => 0,
                    "listorder" => 15,
                ],
                [
                    "title" => "清除日志",
                    "url" => "admin/operation-log/clear",
                    "method" => "POST",
                    "slug" => "admin.operation-log.clear-post",
                    "menu_show" => 0,
                    "listorder" => 20,
                ],
            ],
        ],
    ],
];
