<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
<section class="brands" id="cars">
    <div class="container">
        <div class="title-box">
            <?php if (!empty($arParams['TITLE'])): ?>
                <h2 class="brands__title"><?= htmlspecialchars($arParams['TITLE']) ?></h2>
            <?php endif; ?>
            <?php if (!empty($arParams['SUBTITLE'])): ?>
                <p class="brands__subtitle"><?= htmlspecialchars($arParams['SUBTITLE']) ?></p>
            <?php endif; ?>
        </div>

        <div class="brands__grid">
            <?php foreach ($arResult['ITEMS'] as $item): ?>
                <?php
                $logo = '';
                if (!empty($item['PROPERTIES']['CARS_LOGO']['VALUE'])) {
                    $logo = CFile::GetPath($item['PROPERTIES']['CARS_LOGO']['VALUE']);
                }
                ?>
               <a href="<?= htmlspecialchars($item['DETAIL_PAGE_URL']) ?>" class="brand-card" title="<?= htmlspecialchars($item['NAME']) ?>">
       <?php if ($logo): ?>
        <img class="brand-card__logo"
             src="<?= htmlspecialchars($logo) ?>"
             alt="<?= htmlspecialchars($item['NAME']) ?>"
             width="80" height="80">
      <?php endif; ?>
</a>
            <?php endforeach; ?>
        </div>
    </div>
</section>