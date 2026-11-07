<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_NAME'),
    'DESCRIPTION' => GetMessage('AUTOSERVICE_ABOUT_TEXT_DESCRIPTION'),
    'SORT' => 20,
    'PATH' => [
        'ID' => 'autoservice',
        'NAME' => GetMessage('AUTOSERVICE_ABOUT_TEXT_PATH_NAME'),
    ],
];