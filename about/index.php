<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("О нас");

$APPLICATION->IncludeComponent(
	"autoservice:about.text", 
	".default", 
	[
		"TITLE" => "О компании",
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

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");