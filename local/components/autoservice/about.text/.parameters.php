<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'GROUPS' => [
        'FEATURES' => [
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_GROUP_FEATURES'),
            'SORT' => 200,
        ],
    ],
    'PARAMETERS' => [
        'TITLE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_TITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'О сервисе',
        ],
        'TEXT_1' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_TEXT_1'),
            'TYPE' => 'TEXTAREA',
            'ROWS' => 4,
            'COLS' => 60,
            'DEFAULT' => '«Life АКПП» — специализированный автосервис в Магадане по ремонту японских автомобилей. Мы работаем с Toyota, Honda, Nissan, Mazda, Mitsubishi, Subaru, Suzuki, Lexus, Infiniti и Acura.',
        ],
        'TEXT_2' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_TEXT_2'),
            'TYPE' => 'TEXTAREA',
            'ROWS' => 4,
            'COLS' => 60,
            'DEFAULT' => 'За 10 лет мы отремонтировали более 5000 автомобилей. Используем оригинальные запчасти и современное диагностическое оборудование. На все работы даём гарантию до 2 лет.',
        ],
        'IMAGE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_IMAGE'),
            'TYPE' => 'FILE',
            'FD_TARGET' => 'F',
            'FD_EXT' => 'jpg,jpeg,png,webp,svg',
            'FD_UPLOAD' => true,
            'FD_USE_MEDIALIB' => true,
        ],
        'IMAGE_ALT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_IMAGE_ALT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Автосервис Life АКПП в Магадане',
        ],

        // --- Цифры ---
        'FEATURE_1_NUMBER' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_1_NUMBER'),
            'TYPE' => 'STRING',
            'DEFAULT' => '10+',
        ],
        'FEATURE_1_LABEL' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_1_LABEL'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'лет опыта',
        ],
        'FEATURE_2_NUMBER' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_2_NUMBER'),
            'TYPE' => 'STRING',
            'DEFAULT' => '5000+',
        ],
        'FEATURE_2_LABEL' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_2_LABEL'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'довольных клиентов',
        ],
        'FEATURE_3_NUMBER' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_3_NUMBER'),
            'TYPE' => 'STRING',
            'DEFAULT' => '15',
        ],
        'FEATURE_3_LABEL' => [
            'PARENT' => 'FEATURES',
            'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_FEATURE_3_LABEL'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'мастеров',
        ],
    ],
];