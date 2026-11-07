<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/style.css');
?>
<section class="steps">
    <div class="container">
        <?php if (!empty($arParams['TITLE'])): ?>
            <h2 class="steps__title"><?= htmlspecialchars($arParams['TITLE']) ?></h2>
        <?php endif; ?>

        <?php if (!empty($arParams['SUBTITLE'])): ?>
            <p class="steps__subtitle"><?= htmlspecialchars($arParams['SUBTITLE']) ?></p>
        <?php endif; ?>

        <?php if (!empty($arResult['ITEMS'])): ?>
            <ol class="steps__list">
                <?php foreach ($arResult['ITEMS'] as $i => $item): ?>
                    <?php
                    // Номер шага: генерируем по порядку
                    $number = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                    // Свойство называется STEP_TEXT и имеет тип HTML — значение в ['TEXT']
                    $text = $item['PROPERTIES']['STEP_TEXT']['VALUE']['TEXT'] ?? '';
                    ?>
                    <li class="steps__item">
                        <span class="steps__number"><?= htmlspecialchars($number) ?></span>
                        <h3 class="steps__item-title"><?= htmlspecialchars($item['NAME']) ?></h3>
                        <p class="steps__item-text"><?= htmlspecialchars($text) ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php endif; ?>
    </div>
</section>