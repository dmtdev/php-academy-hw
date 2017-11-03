<?php
/**
 * Created by PhpStorm.
 * User: gendos
 * Date: 9/27/17
 * Time: 20:13
 */
$salt = sha1('MySalt');
return [
    'salt' => $salt,
    'company' => 'Наша Компания',
    'pageIdParam' => 'page',
    'usersdb' => 'usersdb',
    'pages' => [
        'main' => [
            'title' => 'Наша Компания',
            'private' => false,
            'show' => false,
        ],
        'products' => [
            'title' => 'Продукция',
            'private' => true,
            'show' => true
        ],
        'contacts' => [
            'title' => 'Контакты',
            'private' => true,
            'show' => true
        ],
        'auth' => [
            'title' => 'Вход',
            'private' => false,
            'show' => true,
            'forauth' => false,
        ],
        'registration' => [
            'title' => 'Регистрация',
            'private' => false,
            'show' => true,
            'forauth' => false,
        ],
        'exit' => [
            'title' => 'exit',
            'private' => false,
            'show' => false,
            'forauth' => true,
        ],

    ],
    'users' => [
        ['admin', sha1($salt . '123456')],
        ['user1', sha1($salt . '87654')],
    ]
];