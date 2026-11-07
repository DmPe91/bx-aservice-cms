<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/style.css');
$this->addExternalJs($this->GetFolder() . '/script.js');

$qBrand   = (int)($arResult['FIELDS']['BRAND'] ?? 0);
$qService = (int)($arResult['FIELDS']['SERVICE'] ?? 0);
$qUrgency = (int)($arResult['FIELDS']['URGENCY'] ?? 0);
$qPrice   = (int)($arResult['FIELDS']['PRICE'] ?? 0);
?>
<form class="calc" id="calc-form" method="POST" action="" novalidate>
    <input type="hidden" name="sessid" value="<?= bitrix_sessid() ?>">
    <input type="hidden" name="WEB_FORM_ID" value="<?= (int)($arParams['WEB_FORM_ID'] ?? 0) ?>">

 <input type="hidden" name="form_text_<?= $qBrand ?>" id="calc-brand-hidden" value="">
<input type="hidden" name="form_text_<?= $qService ?>" id="calc-service-hidden" value="">
<input type="hidden" name="form_text_<?= $qUrgency ?>" id="calc-urgency-hidden" value="">
<input type="hidden" name="form_text_<?= $qPrice ?>" id="calc-price-hidden" value="">

    <h2 class="calc__title"><?= htmlspecialchars($arParams['TITLE'] ?: 'Рассчитайте стоимость ремонта') ?></h2>
    <p class="calc__text"><?= htmlspecialchars($arParams['SUBTITLE'] ?: 'Предварительная оценка за 30 секунд') ?></p>

    <div class="calc__field">
        <label class="calc__label" for="calc-brand">Марка авто</label>
        <select class="calc__select" id="calc-brand" name="brand" required>
            <option value="">Выберите марку</option>
            <?php foreach ($arResult['CARS'] as $car): ?>
                <option value="<?= htmlspecialchars($car['CODE']) ?>">
                    <?= htmlspecialchars($car['NAME']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="calc__field">
        <label class="calc__label" for="calc-service">Услуга</label>
        <select class="calc__select" id="calc-service" name="service" required>
            <option value="">Выберите услугу</option>
            <?php foreach ($arResult['SERVICES'] as $service): ?>
                <option value="<?= htmlspecialchars($service['CODE']) ?>"
                        data-price="<?= (float)$service['PRICE_NUM'] ?>">
                    <?= htmlspecialchars($service['NAME']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="calc__field">
        <span class="calc__label">Срочность</span>
        <div class="calc__radio-group">
            <label class="calc__radio">
                <input type="radio" name="urgency" value="normal" checked>
                <span>Обычная</span>
            </label>
            <label class="calc__radio">
                <input type="radio" name="urgency" value="urgent">
                <span>Срочная (+<?= (int)(((float)($arParams['URGENT_RATE'] ?? 1.3) - 1) * 100) ?>%)</span>
            </label>
        </div>
    </div>

    <div class="calc__result">
        <span class="calc__result-label"><?= htmlspecialchars($arParams['RESULT_LABEL'] ?: 'Предварительная стоимость:') ?></span>
        <span class="calc__result-value" id="calc-result">—</span>
    </div>

    <button class="calc__submit" type="submit" disabled>
        <?= htmlspecialchars($arParams['SUBMIT_TEXT'] ?: 'Узнать точную стоимость') ?>
    </button>

        <?php $agreementIds = $arResult['AGREEMENT_ANSWER_IDS'] ?? []; ?>
<?php if ($agreementIds): ?>
    <label class="calc__checkbox">
        <input type="checkbox" name="form_checkbox_AGREEMENT[]" value="<?= (int)$agreementIds[0] ?>" required>
        <span><?= htmlspecialchars($arParams['AGREEMENT_TEXT'] ?: 'Согласен на обработку персональных данных') ?></span>
    </label>
<?php endif; ?>

    <div class="calc__message" id="calc-message" style="display:none;"></div>
</form>

<script>
    window.AUTOSERVICE_CALC = {
        urgentRate: <?= (float)($arParams['URGENT_RATE'] ?? 1.3) ?>,
        ajaxUrl: "/local/components/autoservice/calc.form/ajax.php"
    };
</script>