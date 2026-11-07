<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

class AutoserviceCalcFormComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule('iblock')) return;

        $this->setFrameMode(true);
        $this->arResult['SERVICES'] = $this->getServices();
        $this->arResult['CARS']     = $this->getCars();
        $this->arResult['FIELDS']   = $this->getFormFields();
        $this->arResult['FIELDS'] = $this->getFormFields();
        $this->arResult['AGREEMENT_ANSWER_IDS'] = $this->getAgreementAnswerIds();

        $this->includeComponentTemplate();
    }

    private function getFormFields(): array
    {
        $fields = [];
        $webFormId = (int)($this->arParams['WEB_FORM_ID'] ?? 0);
        if (!$webFormId || !Loader::includeModule('form')) return $fields;

        $rs = CFormField::GetList($webFormId, 'N');
        while ($f = $rs->Fetch()) {
            if (!empty($f['SID'])) {
                $fields[$f['SID']] = (int)$f['ID'];
            }
        }
        return $fields;
    }

    private function getServices(): array
    {
        $iblockId = (int)($this->arParams['IBLOCK_SERVICES_ID'] ?? 0);
        if (!$iblockId) return [];

        $items = [];
        $rs = CIBlockElement::GetList(
            ['SORT' => 'ASC', 'NAME' => 'ASC'],
            ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
            false,
            false,
            ['ID', 'NAME', 'CODE', 'PROPERTY_PRICE']
        );
        while ($el = $rs->Fetch()) {
            $items[] = [
                'CODE'      => $el['CODE'],
                'NAME'      => $el['NAME'],
                'PRICE_NUM' => (float)($el['PROPERTY_PRICE_VALUE'] ?? 0),
            ];
        }
        return $items;
    }

    private function getCars(): array
    {
        $iblockId = (int)($this->arParams['IBLOCK_CARS_ID'] ?? 0);
        if (!$iblockId) return [];

        $items = [];
        $rs = CIBlockElement::GetList(
            ['SORT' => 'ASC', 'NAME' => 'ASC'],
            ['IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'],
            false,
            false,
            ['ID', 'NAME', 'CODE']
        );
        while ($el = $rs->Fetch()) {
            $items[] = ['CODE' => $el['CODE'], 'NAME' => $el['NAME']];
        }
        return $items;
    }

    private function getAgreementAnswerIds(): array
{
    $ids = [];
    $webFormId = (int)($this->arParams['WEB_FORM_ID'] ?? 0);
    if (!$webFormId || !Loader::includeModule('form')) return $ids;

    // Находим ID вопроса AGREEMENT
    $rs = CFormField::GetList($webFormId, 'N', false, false, ['SID' => 'AGREEMENT']);
    $field = $rs->Fetch();
    if (!$field) return $ids;

    // Получаем варианты ответа
    $rsAns = CFormAnswer::GetList($field['ID']);
    while ($ans = $rsAns->Fetch()) {
        $ids[] = (int)$ans['ID'];  // ANSWER_ID — его и шлём
    }
    return $ids;
}
}