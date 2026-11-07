<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$this->addExternalCss($this->GetFolder() . '/style.css');
$this->addExternalJs($this->GetFolder() . '/script.js');

$f = $arResult['FIELDS'];

$idName    = (int)($f['NAME'] ?? 0);
$idPhone   = (int)($f['PHONE'] ?? 0);
$idService = (int)($f['SERVICE'] ?? 0);
$idBrand   = (int)($f['BRAND'] ?? 0);
$idSource  = (int)($f['SOURCE'] ?? 0);

$showService = ($arParams['SHOW_SERVICE'] ?? 'N') === 'Y';
$showBrand   = ($arParams['SHOW_BRAND'] ?? 'N') === 'Y';
$defaultService = $arParams['DEFAULT_SERVICE'] ?? '';
$defaultBrand   = $arParams['DEFAULT_BRAND'] ?? '';
$source         = $arParams['SOURCE'] ?? '';
?>
<form class="service-detail__form" id="feedback-form" method="POST" novalidate>
    <input type="hidden" name="sessid" value="<?= bitrix_sessid() ?>">
    <input type="hidden" name="WEB_FORM_ID" value="<?= (int)($arParams['WEB_FORM_ID'] ?? 0) ?>">

    <input type="hidden" name="form_text_<?= $idService ?>" id="fb-service-hidden"
           value="<?= htmlspecialchars($showService ? '' : $defaultService) ?>">
    <input type="hidden" name="form_text_<?= $idBrand ?>" id="fb-brand-hidden"
           value="<?= htmlspecialchars($showBrand ? '' : $defaultBrand) ?>">
    <input type="hidden" name="form_text_<?= $idSource ?>" value="<?= htmlspecialchars($source) ?>">

    <h3 class="service-detail__form-title"><?= htmlspecialchars($arParams['TITLE'] ?: 'Оставить заявку') ?></h3>
    <p class="service-detail__form-text"><?= htmlspecialchars($arParams['SUBTITLE'] ?: 'Перезвоним в течение 15 минут') ?></p>

    <?php if ($showService): ?>
        <div class="service-detail__field">
            <label class="service-detail__label" for="fb-service">Услуга</label>
            <select class="service-detail__select" id="fb-service" name="service" required>
                <option value="">Выберите услугу</option>
                <?php foreach ($arResult['SERVICES'] as $s): ?>
                    <option value="<?= htmlspecialchars($s['CODE']) ?>"><?= htmlspecialchars($s['NAME']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>

    <?php if ($showBrand): ?>
        <div class="service-detail__field">
            <label class="service-detail__label" for="fb-brand">Марка авто</label>
            <select class="service-detail__select" id="fb-brand" name="brand" required>
                <option value="">Выберите марку</option>
                <?php foreach ($arResult['CARS'] as $c): ?>
                    <option value="<?= htmlspecialchars($c['CODE']) ?>"><?= htmlspecialchars($c['NAME']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>

    <div class="service-detail__field">
        <label class="service-detail__label" for="fb-name">Ваше имя</label>
        <input class="service-detail__input" type="text" id="fb-name"
               name="form_text_<?= $idName ?>" placeholder="Иван Иванов" required>
    </div>

    <div class="service-detail__field">
        <label class="service-detail__label" for="fb-phone">Телефон</label>
        <input class="service-detail__input" type="tel" id="fb-phone"
               name="form_text_<?= $idPhone ?>" placeholder="+7 (___) ___-__-__" required>
    </div>

    <button class="service-detail__submit" type="submit">
        <?= htmlspecialchars($arParams['SUBMIT_TEXT'] ?: 'Отправить заявку') ?>
    </button>

    <label class="service-detail__checkbox">
        <input type="checkbox" name="form_checkbox_AGREEMENT[]" value="<?= (int)($f['AGREEMENT'] ?? 0) ?>" required>
        <span><?= htmlspecialchars($arParams['AGREEMENT_TEXT'] ?: 'Согласен на обработку персональных данных') ?></span>
    </label>

    <div class="feedback-message" id="feedback-message" style="display:none;"></div>
</form>

<script>
    window.AUTOSERVICE_FEEDBACK = {
        ajaxUrl: "/local/components/autoservice/feedback.form/ajax.php",
        agreementId: <?= (int)($f['AGREEMENT'] ?? 0) ?>
    };
</script>