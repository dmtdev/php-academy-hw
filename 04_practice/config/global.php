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
    'usersdb' => 'inc'.DS.'usersdb',
    'pages' => [
        'main' => [
            'title' => 'Наша Компания',
            'private' => false,
            'show' => false,
        ],
        'products' => [
            'title' => 'Продукция',
            'private' => true,
            'show' => 'forall',
        ],
        'contacts' => [
            'title' => 'Контакты',
            'private' => true,
            'show' => 'forall',
        ],
        'auth' => [
            'title' => 'Вход',
            'private' => false,
            'show' => 'fornotauth',
        ],
        'registration' => [
            'title' => 'Регистрация',
            'private' => false,
            'show' => 'fornotauth',
        ],
        'exit' => [
            'title' => 'Выход',
            'private' => false,
            'show' => 'forauth',
        ],

    ],
    'users' => [
        ['admin', sha1($salt . '123456')],
        ['user1', sha1($salt . '87654')],
    ]
];