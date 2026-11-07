<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    'PARAMETERS' => [
        'WEB_FORM_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_WEB_FORM_ID'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'IBLOCK_SERVICES_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_IBLOCK_SERVICES'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'IBLOCK_CARS_ID' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_IBLOCK_CARS'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'SHOW_SERVICE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_SHOW_SERVICE'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N',
        ],
        'SHOW_BRAND' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_SHOW_BRAND'),
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'N',
        ],
        'DEFAULT_SERVICE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_DEFAULT_SERVICE'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'DEFAULT_BRAND' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_DEFAULT_BRAND'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'SOURCE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_SOURCE'),
            'TYPE' => 'STRING',
            'DEFAULT' => '',
        ],
        'TITLE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_TITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Оставить заявку',
        ],
        'SUBTITLE' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_SUBTITLE'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Перезвоним в течение 15 минут',
        ],
        'SUBMIT_TEXT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_SUBMIT_TEXT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Отправить заявку',
        ],
        'AGREEMENT_TEXT' => [
            'PARENT' => 'BASE',
            'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_AGREEMENT_TEXT'),
            'TYPE' => 'STRING',
            'DEFAULT' => 'Согласен на обработку персональных данных',
        ],
    ],
];