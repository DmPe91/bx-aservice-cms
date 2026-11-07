<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/style.css');

// Картинка
$imageSrc = '';
if (!empty($arParams['IMAGE'])) {
    $value = $arParams['IMAGE'];
    if (is_array($value)) {
        $imageSrc = CFile::GetPath($value['ID'] ?? 0);
    } elseif (is_numeric($value)) {
        $imageSrc = CFile::GetPath((int)$value);
    } else {
        $imageSrc = $value;
    }
}

$imageAlt = htmlspecialchars($arParams['IMAGE_ALT'] ?? '');

// Цифры — собираем в массив, чтобы не дублировать разметку
$features = [];
for ($i = 1; $i <= 3; $i++) {
    $number = $arParams["FEATURE_{$i}_NUMBER"] ?? '';
    $label = $arParams["FEATURE_{$i}_LABEL"] ?? '';
    if ($number || $label) {
        $features[] = ['number' => $number, 'label' => $label];
    }
}
?>
<section class="about">
    <div class="container">
        <div class="about__inner">
            <div class="about__content">
                <?php if (!empty($arParams['TITLE'])): ?>
                    <h2 class="about__title"><?= htmlspecialchars($arParams['TITLE']) ?></h2>
                <?php endif; ?>

                <?php if (!empty($arParams['TEXT_1'])): ?>
                    <p class="about__text"><?= htmlspecialchars($arParams['TEXT_1']) ?></p>
                <?php endif; ?>

                <?php if (!empty($arParams['TEXT_2'])): ?>
                    <p class="about__text"><?= htmlspecialchars($arParams['TEXT_2']) ?></p>
                <?php endif; ?>

                <?php if ($features): ?>
                    <ul class="about__features">
                        <?php foreach ($features as $feature): ?>
                            <li class="about__feature">
                                <span class="about__feature-number"><?= htmlspecialchars($feature['number']) ?></span>
                                <span class="about__feature-label"><?= htmlspecialchars($feature['label']) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php if ($imageSrc): ?>
                <div class="about__image">
                    <img src="<?= htmlspecialchars($imageSrc) ?>" alt="<?= $imageAlt ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>