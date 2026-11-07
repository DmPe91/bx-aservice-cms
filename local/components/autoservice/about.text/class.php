<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

class AutoserviceAboutTextComponent extends CBitrixComponent
{
    public function executeComponent()
    {
        $this->setFrameMode(true);
        $this->includeComponentTemplate();
    }
}