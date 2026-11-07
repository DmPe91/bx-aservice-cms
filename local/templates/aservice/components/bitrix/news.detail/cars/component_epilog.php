<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/** @var array $arResult */
/** @var array $arParams */
global $APPLICATION;

$name = $arResult['NAME'] ?? '';
if (!$name) {
    return; // нет имени — не трогаем заголовок
}

$pageTitle = 'Ремонт ' . $name . ' — Life АКПП';

// Основной заголовок страницы (H1, если header.php использует ShowTitle(false))
$APPLICATION->SetTitle($pageTitle);

// Заголовок окна браузера (<title>)
$APPLICATION->SetPageProperty('title', $pageTitle);