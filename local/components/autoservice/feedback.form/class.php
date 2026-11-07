<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

class AutoserviceFeedbackFormComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!Loader::includeModule('iblock')) return;

        $this->setFrameMode(true);

        $this->arResult['FIELDS'] = $this->getFormFields();
        $this->arResult['SERVICES'] = $this->getServices();
        $this->arResult['CARS'] = $this->getCars();

        $this->includeComponentTemplate();
    }

    /**
     * ID всех полей веб-формы по их SID
     * Например: $arResult['FIELDS']['NAME'] = 10
     */
    private function getFormFields(): array
    {
        $fields = [];
        $webFormId = (int)($this->arParams['WEB_FORM_ID'] ?? 0);
        if (!$webFormId || !Loader::includeModule('form')) {
            return $fields;
        }

        $rs = CFormField::GetList($webFormId, '');
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
            ['ID', 'NAME', 'CODE']
        );
        while ($el = $rs->Fetch()) {
            $items[] = ['CODE' => $el['CODE'], 'NAME' => $el['NAME']];
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
}