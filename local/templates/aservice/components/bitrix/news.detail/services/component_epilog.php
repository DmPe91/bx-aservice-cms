<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/** @var array $arResult */
global $APPLICATION;

$elementName = $arResult['NAME'] ?? '';
if (!$elementName) {
    return;
}

$pageTitle = $elementName . ' — Life АКПП';

// Основной заголовок (H1, если header.php использует ShowTitle(false))
$APPLICATION->SetTitle($pageTitle);

// Заголовок вкладки браузера (<title>)
$APPLICATION->SetPageProperty('title', $pageTitle);