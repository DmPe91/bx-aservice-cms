<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Марки авто");

$APPLICATION->IncludeComponent(
    "bitrix:news",
    "cars",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "6",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/cars/",
        "SEF_URL_TEMPLATES" => [
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_CODE#/",
        ],
        "NEWS_COUNT" => "50",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "NAME",
        "SORT_ORDER2" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "LIST_PROPERTY_CODE" => ["LOGO", "DESCRIPTION"],
        "DETAIL_PROPERTY_CODE" => ["LOGO", "DESCRIPTION"],
    ],
    false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");