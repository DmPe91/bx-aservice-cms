<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arComponentDescription = [
    'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_NAME'),
    'DESCRIPTION' => GetMessage('AUTOSERVICE_FEEDBACK_DESCRIPTION'),
    'SORT' => 50,
    'PATH' => [
        'ID' => 'autoservice',
        'NAME' => GetMessage('AUTOSERVICE_FEEDBACK_PATH_NAME'),
    ],
];