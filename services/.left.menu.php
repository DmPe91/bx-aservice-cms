<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!CModule::IncludeModule('iblock')) {
    return;
}

$aMenuLinks = [];

$rsElements = CIBlockElement::GetList(
    ["SORT" => "ASC"],
    ["IBLOCK_ID" => 4, "ACTIVE" => "Y"],
    false,
    false,
    ["NAME", "DETAIL_PAGE_URL"]
);

while ($arElement = $rsElements->GetNext()) {
    $aMenuLinks[] = [
        $arElement["NAME"],
        $arElement["DETAIL_PAGE_URL"],
        [],
        [],
        ""
    ];
}
?>