<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>
<div class="footer__services">
    <ul>
        <?php foreach ($arResult['ITEMS'] as $item): ?>
            <li>
                <a href="<?= htmlspecialchars($item['DETAIL_PAGE_URL']) ?>">
                    <?= htmlspecialchars($item['NAME']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>