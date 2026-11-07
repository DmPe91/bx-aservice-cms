<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/style.css');
?>
<section class="services">
    <div class="title-box container">
        <h2 class="h2"><?= htmlspecialchars($arParams['TITLE'] ?: 'Услуги') ?></h2>
        <?php if (!empty($arParams['DESCRIPTION'])): ?>
            <p><?= htmlspecialchars($arParams['DESCRIPTION']) ?></p>
        <?php endif; ?>
    </div>
    <div class="services__list container">
        <?php foreach ($arResult['ITEMS'] as $item): ?>
            <?php
            // Ссылка на детальную страницу
            $link = $item['DETAIL_PAGE_URL'] ?: '#';

            // Картинка: сначала PREVIEW_PICTURE, потом SERVICE_IMG
            $imageSrc = '';
            if (!empty($item['PREVIEW_PICTURE'])) {
                $pic = $item['PREVIEW_PICTURE'];
                $imageSrc = CFile::GetPath(is_array($pic) ? $pic['ID'] : $pic);
            } elseif (!empty($item['PROPERTIES']['SERVICE_IMG']['VALUE'])) {
                $imageSrc = CFile::GetPath($item['PROPERTIES']['SERVICE_IMG']['VALUE']);
            }

            // Описание: PREVIEW_TEXT, иначе свойство DESCRIPTION
            $description = '';
            if (!empty($item['PREVIEW_TEXT'])) {
                $description = $item['PREVIEW_TEXT'];
            } elseif (!empty($item['PROPERTIES']['DESCRIPTION']['VALUE'])) {
                $description = $item['PROPERTIES']['DESCRIPTION']['VALUE'];
            }

            // Цена
            $price = $item['PROPERTIES']['PRICE']['VALUE'] ?? '';
            ?>
            <a href="<?= htmlspecialchars($link) ?>" class="service-card">
                <h3 class="service-card__title"><?= htmlspecialchars($item['NAME']) ?></h3>
                <?php if ($description): ?>
                    <p class="service-card__text"><?= htmlspecialchars($description) ?></p>
                <?php endif; ?>
                <?php if ($price): ?>
                    <p class="service-card__price"> от <?= htmlspecialchars($price) ?> ₽</p>
                <?php endif; ?>
                <?php if ($imageSrc): ?>
                    <img class="service-card__image"
                         src="<?= htmlspecialchars($imageSrc) ?>"
                         alt="<?= htmlspecialchars($item['NAME']) ?>">
                <?php endif; ?>
            </a>
        <?php endforeach; ?>
    </div>
</section>