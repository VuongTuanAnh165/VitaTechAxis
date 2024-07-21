<?php

return [
    'api' => [
        'response' => [
            'login' => [
                '403' => 'Tài khoản chưa được xác nhận, vui lòng check email để lấy mã xác nhận',
                '200' => 'Đăng nhập thành công',
                '401' => 'Tài khoản hoặc mật khổng không dúng'
            ]
        ]
    ],
    'web' => [
        'auth' => [
            'login' => 'Đăng nhập'
        ],
        'home' => [
            'title' => 'Trang chủ'
        ],
        'customer' => [
            'title' => 'Khách hàng'
        ]
    ]
];