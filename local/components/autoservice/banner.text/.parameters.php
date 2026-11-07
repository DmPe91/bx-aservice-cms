<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'PARAMETERS' => [
        'TITLE' => [
            'PARENT' => 'BASE',
            'NAME' => 'Заголовок (H1)',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Специализированный автосервис японских авто в Магадане',
        ],
        'IMAGE' => [
            'PARENT' => 'BASE',
            'NAME' => 'Изображение',
            'TYPE' => 'FILE',
            'FD_TARGET' => 'F',
            'FD_EXT' => 'jpg,jpeg,png,webp,svg',
            'FD_UPLOAD' => true,
            'FD_USE_MEDIALIB' => true,
        ],
        'IMAGE_ALT' => [
            'PARENT' => 'BASE',
            'NAME' => 'Alt-текст изображения',
            'TYPE' => 'STRING',
            'DEFAULT' => 'Автосервис японских авто',
        ],
    ],
];