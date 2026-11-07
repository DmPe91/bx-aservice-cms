<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Услуги");

$APPLICATION->IncludeComponent(
    "bitrix:news",
    "services",
    [
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => "4",
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/services/",
        "SEF_URL_TEMPLATES" => [
            "news" => "",
            "section" => "",
            "detail" => "#ELEMENT_CODE#/",
        ],
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "NAME",
        "SORT_ORDER2" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "SET_TITLE" => "Y",
        "SET_BROWSER_TITLE" => "Y",
        "ADD_ELEMENT_CHAIN" => "Y",
        "LIST_PROPERTY_CODE" => ["PRICE", "DESCRIPTION"],
        "DETAIL_PROPERTY_CODE" => ["PRICE", "DESCRIPTION"],
    ],
    false
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");