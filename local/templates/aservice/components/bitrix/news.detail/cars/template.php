<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Логотип
$logo = '';
if (!empty($arResult['PROPERTIES']['LOGO']['VALUE'])) {
    $logo = CFile::GetPath($arResult['PROPERTIES']['CARS_LOGO']['VALUE']);
}

// Описание — HTML-свойство, берём ['TEXT'], НЕ экранируем
$description = $arResult['PROPERTIES']['CARS_DESCRIPTION']['~VALUE']['TEXT'] ?? '';

$name = $arResult['NAME'] ?? '';
?>
<main>
    <!-- HERO -->
    <section class="page-hero">
        <div class="page-hero__inner container">
            <div class="page-hero__content">
                <nav class="breadcrumbs" aria-label="Хлебные крошки">
                    <a href="/">Главная</a>
                    <span>/</span>
                    <a href="/cars/">Марки авто</a>
                    <span>/</span>
                    <span><?= htmlspecialchars($name) ?></span>
                </nav>
                <h1 class="page-hero__title">Ремонт <?= htmlspecialchars($name) ?></h1>
            </div>
        </div>
    </section>

    <!-- ДЕТАЛИ + ФОРМА -->
    <section class="service-detail">
        <div class="service-detail__inner container">
            <div class="service-detail__content">
                <h2 class="service-detail__title">Что мы делаем</h2>
                <?php if ($description): ?>
                    <div class="service-detail__text">
                        <?= $description ?>
                    </div>
                <?php endif; ?>
                <?php if ($logo): ?>
                    <div class="service-detail__image">
                        <img src="<?= htmlspecialchars($logo) ?>" alt="<?= htmlspecialchars($name) ?>">
                    </div>
                <?php endif; ?>
            </div>

          <?php
$APPLICATION->IncludeComponent(
    "autoservice:feedback.form",
    ".default",
    [
        "WEB_FORM_ID" => "3",
        "IBLOCK_SERVICES_ID" => "4",
        "IBLOCK_CARS_ID" => "6",
        "SHOW_SERVICE" => "Y",              // пусть выберет услугу
        "SHOW_BRAND" => "N",                // марка известна
        "DEFAULT_BRAND" => $arResult['NAME'],     // «Toyota»
        "SOURCE" => "Марка: " . $arResult['NAME'],
    ],
    false
);
?>
        </div>
    </section>
</main>