<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$imageSrc = '';
$imageAlt = htmlspecialchars($arParams['IMAGE_ALT'] ?? '');


if (!empty($arParams['IMAGE'])) {
    $value = $arParams['IMAGE'];

    if (is_array($value)) {
        // Массив с ID
        $fileId = $value['ID'] ?? null;
        if ($fileId) {
            $imageSrc = CFile::GetPath($fileId);
        }
    } elseif (is_numeric($value)) {
        // Просто ID
        $imageSrc = CFile::GetPath((int)$value);
    } else {
        // Строка с путём (например, /banner-her2.jpeg)
        $imageSrc = $value;
    }
}
?>
<div class="banner-box__text">
    <?php if (!empty($arParams['TITLE'])): ?>
        <h1><?= htmlspecialchars($arParams['TITLE']) ?></h1>
    <?php endif; ?>

    <?php if ($imageSrc): ?>
        <img src="<?= htmlspecialchars($imageSrc) ?>"
             alt="<?= $imageAlt ?>">
    <?php endif; ?>
</div>