<?php

return [
    "api" => [
        "response" => [
            "login" => [
                "403" => "Tài khoản chưa được xác nhận, vui lòng check email để lấy mã xác nhận",
                "200" => "Đăng nhập thành công",
                "401" => "Tài khoản hoặc mật khổng không đúng"
            ]
        ]
    ],
    "web" => [
        "common" => [
            ACTIVE => "Đã kích hoạt",
            INACTIVE => "Chưa kích hoạt",
            "list" => 'Danh sách',
            "detail" => "Chi tiết",
            "create" => "Thêm mới",
            "edit" => "Chỉnh sửa",
            "delete" => "Xoá",
            'null' => 'Không có dữ liệu'
        ],
        "auth" => [
            "login" => "Đăng nhập"
        ],
        "home" => [
            "title" => "Trang chủ"
        ],
        "customer" => [
            "title" => "Khách hàng",
            "placeholder" => [
                "search" => "Tên khách hàng"
            ]
        ]
    ]
];