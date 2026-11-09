<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Life АКПП — Автосервис в Магадане");
$APPLICATION->SetTitle("Life АКПП — Автосервис в Магадане");
?>
<section class="banner">
    <div class="banner-box container">
        <?php
        $APPLICATION->IncludeComponent(
	"autoservice:banner.text", 
	".default", 
	[
		"TITLE" => "Специализированный автосервис японских авто в Магадане",
		"IMAGE_ALT" => "Автосервис японских авто",
		"COMPONENT_TEMPLATE" => ".default",
		"IMAGE" => "/upload/medialibrary/3b9/gn1orgh8f09v3fjoq3j27cecq4c145n3.jpeg"
	],
	false
);
        ?>

       <div class="banner-box__form">
 <?php
$APPLICATION->IncludeComponent(
    "autoservice:calc.form",
    ".default",
    [
        "IBLOCK_SERVICES_ID" => "4",
        "IBLOCK_CARS_ID" => "6",
        "WEB_FORM_ID" => "2", // ID веб-формы CALC
        "URGENT_RATE" => "1.3",
        "TITLE" => "Рассчитайте стоимость ремонта",
        "SUBTITLE" => "Предварительная оценка за 30 секунд",
        "RESULT_LABEL" => "Предварительная стоимость:",
        "SUBMIT_TEXT" => "Узнать точную стоимость",
        "AGREEMENT_TEXT" => "Согласен на обработку персональных данных",
    ],
    false
);
?>
</div>
    </div>
</section>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "services",
    [
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => "4",
        "NEWS_COUNT" => "20",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "NAME",
        "SORT_ORDER2" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "TITLE" => "Услуги",
        "DESCRIPTION" => "В нашей мастерской вы найдете решение для любых задач, от диагностики и профилактики до комплексного ремонта японского автомобиля",
        "DETAIL_URL" => "/services/#ELEMENT_CODE#/",
		"PROPERTY_CODE" => ["PRICE", "LINK"], 
    ],
    false
);
?>

<?php
$APPLICATION->IncludeComponent(
	"autoservice:about.text", 
	".default", 
	[
		"TITLE" => "О сервисе",
		"TEXT_1" => "«Life АКПП» — специализированный автосервис в Магадане по ремонту японских автомобилей. Мы работаем с Toyota, Honda, Nissan, Mazda, Mitsubishi, Subaru, Suzuki, Lexus, Infiniti и Acura.",
		"TEXT_2" => "За 10 лет мы отремонтировали более 5000 автомобилей. Используем оригинальные запчасти и современное диагностическое оборудование. На все работы даём гарантию до 2 лет.",
		"IMAGE_ALT" => "Автосервис Life АКПП в Магадане",
		"FEATURE_1_NUMBER" => "10+",
		"FEATURE_1_LABEL" => "лет опыта",
		"FEATURE_2_NUMBER" => "5000+",
		"FEATURE_2_LABEL" => "довольных клиентов",
		"FEATURE_3_NUMBER" => "15",
		"FEATURE_3_LABEL" => "мастеров",
		"COMPONENT_TEMPLATE" => ".default",
		"IMAGE" => "/upload/medialibrary/5a5/0whrl6zhn7uwarg0fj1p0lnsr05u7drl.jpeg"
	],
	false
);
?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "steps", 
    [
        "IBLOCK_TYPE" => "content", 
        "IBLOCK_ID" => "5", 
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "NAME",
        "SORT_ORDER2" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "TITLE" => "Как мы работаем",
        "SUBTITLE" => "Прозрачный процесс от заявки до выдачи автомобиля",
        "PROPERTY_CODE" => ["STEP_TEXT"], 
    false
);
?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "cars",
    [
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "6",
        "NEWS_COUNT" => "50",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "PROPERTY_CODE" => ["CARS_LOGO"],
        "DETAIL_URL" => "/cars/#ELEMENT_CODE#/",
        "TITLE" => "Обслуживаемые марки",
        "SUBTITLE" => "Работаем с японскими автомобилями всех марок",
    ],
    false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>