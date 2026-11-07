<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Картинка детальная: DETAIL_PICTURE или SERVICE_IMG
$imageSrc = '';
if (!empty($arResult['DETAIL_PICTURE'])) {
    $pic = $arResult['DETAIL_PICTURE'];
    $imageSrc = CFile::GetPath(is_array($pic) ? $pic['ID'] : $pic);
} elseif (!empty($arResult['PROPERTIES']['SERVICE_IMG']['VALUE'])) {
    $imageSrc = CFile::GetPath($arResult['PROPERTIES']['SERVICE_IMG']['VALUE']);
}

// Текст: DETAIL_TEXT или FULL_DESCRIPTION
$detailText = $arResult['DETAIL_TEXT'] ?? '';
if (empty($detailText) && !empty($arResult['PROPERTIES']['FULL_DESCRIPTION']['VALUE'])) {
    $detailText = $arResult['PROPERTIES']['FULL_DESCRIPTION']['VALUE']['TEXT']
        ?? $arResult['PROPERTIES']['FULL_DESCRIPTION']['VALUE'];
}

$elementName = $arResult['NAME'] ?? '';
?>
<main>
    <!-- HERO -->
    <section class="page-hero">
        <div class="page-hero__inner container">
            <div class="page-hero__content">
                <nav class="breadcrumbs" aria-label="Хлебные крошки">
                    <a href="/">Главная</a>
                    <span>/</span>
                    <a href="/services/">Услуги</a>
                    <span>/</span>
                    <span><?= htmlspecialchars($elementName) ?></span>
                </nav>
                <h1 class="page-hero__title"><?= htmlspecialchars($elementName) ?></h1>
            </div>
        </div>
    </section>

    <!-- ДЕТАЛИ + ФОРМА -->
    <section class="service-detail">
        <div class="service-detail__inner container">
            <div class="service-detail__content">
                <h2 class="service-detail__title">Что входит в услугу</h2>
                <div class="service-detail__text">
                    <?= $detailText ?>
                </div>
                <?php if ($imageSrc): ?>
                    <div class="service-detail__image">
                        <img src="<?= htmlspecialchars($imageSrc) ?>"
                             alt="<?= htmlspecialchars($elementName) ?>">
                    </div>
                <?php endif; ?>
            </div>

           <?php
$APPLICATION->IncludeComponent(
    "autoservice:feedback.form",
    ".default",
    [
        "WEB_FORM_ID" => "3",              // ID формы FEEDBACK
        "IBLOCK_SERVICES_ID" => "4",       // если нужно
        "IBLOCK_CARS_ID" => "6",           // ID инфоблока марок
        "SHOW_SERVICE" => "N",              // услуга уже известна
        "SHOW_BRAND" => "Y",                // пусть выберет марку
        "DEFAULT_SERVICE" => $arResult['NAME'],   // «Ремонт трансмиссии»
        "SOURCE" => "Услуга: " . $arResult['NAME'],
        "TITLE" => "Оставить заявку",
        "SUBTITLE" => "Перезвоним в течение 15 минут",
    ],
    false
);
?>
        </div>
    </section>
</main>