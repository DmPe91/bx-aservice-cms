<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'PARAMETERS' => [
        'IBLOCK_SERVICES_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_IBLOCK_SERVICES'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'IBLOCK_CARS_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_IBLOCK_CARS'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'TITLE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_TITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Рассчитайте стоимость ремонта',
        ],
        'SUBTITLE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_SUBTITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Предварительная оценка за 30 секунд',
        ],
        'URGENT_RATE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_URGENT_RATE'),
            'TYPE' => 'STRING',
            'DEFAULT' => '1.3',
        ],
        'RESULT_LABEL' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_RESULT_LABEL'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Предварительная стоимость:',
        ],
        'SUBMIT_TEXT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_SUBMIT_TEXT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Узнать точную стоимость',
        ],
        'AGREEMENT_TEXT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_AGREEMENT_TEXT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Согласен на обработку персональных данных',
        ],
        'WEB_FORM_ID' => [
        'PARENT' => 'BASE',
        'NAME' => GetMessage('AUTOSERVICE_CALC_FORM_WEB_FORM_ID'),
        'TYPE' => 'STRING',
        'DEFAULT' => '',
        ],
    ],
];