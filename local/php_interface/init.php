<?
// local/php_interface/init.php

// Константа с ID инфоблока "Настройки" (ЗАМЕНИ 5 на свой ID)
define('SETTINGS_IBLOCK_ID', 3);

function getSiteSettings() {
    static $settings = null;
    if ($settings !== null) return $settings;

    // Значения по умолчанию
    $settings = [
        'SITE_NAME_SMALL' => 'life',
        'SITE_NAME_BIG' => 'АКПП',
        'PHONE' => '+7 (999) 100 1488',
        'EMAIL' => 'info@example.com',
        'ADRESS' => 'г. Магадан, ул. Промышленная, 15',
        'TIME_WORK' => 'без выходных: с 9:00 до 21:00',
        'TELEGRAM' => 'https://web.telegram.org/',
        'MAX' => 'https://max.ru/',
    ];

    if (CModule::IncludeModule("iblock")) {
        $res = CIBlockElement::GetList(
            ["SORT" => "ASC"],
            ["IBLOCK_ID" => SETTINGS_IBLOCK_ID, "ACTIVE" => "Y"],
            false,
            false,
            ["ID", "NAME", "PROPERTY_*"] // Выбираем все свойства
        );
        
        while ($ob = $res->GetNextElement()) {
            $arProps = $ob->GetProperties();
            foreach ($arProps as $code => $prop) {
                if (!empty($prop["VALUE"])) {
                    $settings[$code] = $prop["VALUE"];
                }
            }
        }
    }
    return $settings;
}