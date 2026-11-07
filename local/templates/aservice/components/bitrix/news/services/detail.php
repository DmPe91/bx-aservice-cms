<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "services",
    [
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "USE_SHARE" => "N",
        "FIELD_CODE" => ["", ""],
        "PROPERTY_CODE" => ["PRICE", "LINK", ""],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "ADD_ELEMENT_CHAIN" => $arParams["ADD_ELEMENT_CHAIN"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "SET_BROWSER_TITLE" => $arParams["SET_BROWSER_TITLE"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    ],
    $component
);