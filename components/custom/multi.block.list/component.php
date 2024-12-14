<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;

class MultiBlockListComponent extends CBitrixComponent
{
    private function validateParams()
    {
        if (!Loader::includeModule("iblock")) {
            ShowError("Модуль 'Инфоблоки' не подключен.");
            return false;
        }
        return true;
    }

    private function getElements($filter)
    {
        $result = [];
        $elements = \CIBlockElement::GetList(
            ["SORT" => "ASC"],
            $filter,
            false,
            false,
            ['ID', 'IBLOCK_ID', 'NAME']
        );
        while ($element = $elements->Fetch()) {
            $result[$element['IBLOCK_ID']]['ITEMS'][] = $element;
            $result[$element['IBLOCK_ID']]['NAME'] = "Инфоблок " . $element['IBLOCK_ID'];
        }
        return $result;
    }

    public function executeComponent()
    {
        if ($this->validateParams()) {
            $filter = ["ACTIVE" => "Y"];
            if ($this->arParams['IBLOCK_TYPE']) {
                $filter['IBLOCK_TYPE'] = $this->arParams['IBLOCK_TYPE'];
            }
            if ($this->arParams['IBLOCK_ID']) {
                $filter['IBLOCK_ID'] = $this->arParams['IBLOCK_ID'];
            }
            $this->arResult['ITEMS'] = $this->getElements($filter);
            $this->includeComponentTemplate();
        }
    }
}
