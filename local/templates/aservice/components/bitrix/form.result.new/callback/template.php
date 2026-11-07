<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Вывод системных сообщений (об ошибках или успешной отправке)
if ($arResult["isFormErrors"] == "Y") {
    echo $arResult["FORM_ERRORS_TEXT"];
}
if ($arResult["isFormNote"] == "Y") {
    echo $arResult["FORM_NOTE"];
}
?>
<div class="modal" id="callback-modal" aria-hidden="true">
    <div class="modal__overlay" data-modal-close></div>
    <div class="modal__content" role="dialog" aria-modal="true" aria-labelledby="callback-title">
        <button class="modal__close" type="button" aria-label="Закрыть" data-modal-close>&times;</button>
        <h2 class="modal__title" id="callback-title"><?= $arResult["FORM_TITLE"] ?></h2>
        
        <?= $arResult["FORM_HEADER"] ?>
        <input type="hidden" name="web_form_submit" value="Y">
       <?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
    <?php
    $htmlCode = $arQuestion["HTML_CODE"];
    $htmlCode = str_replace('class="inputtext"', 'class="inputtext modal__input"', $htmlCode);
    $htmlCode = str_replace('class="inputtextarea"', 'class="inputtextarea modal__textarea"', $htmlCode);
    ?>
    <?php if ($FIELD_SID == "NAME" || $FIELD_SID == "PHONE" || $FIELD_SID == "MESSAGE"): ?>
        <div class="modal__field">
            <label class="modal__label"><?= htmlspecialchars($arQuestion["CAPTION"]) ?></label>
            <?= $htmlCode ?>
        </div>
      <?php elseif ($FIELD_SID == "AGREEMENT"): ?>
                <label class="modal__checkbox">
                    <?= $arQuestion["HTML_CODE"] ?>
                    <span class="modal__checkbox-text"><?= $arQuestion["CAPTION"] ?></span>
                </label>
            <?php endif; ?>
<?php endforeach; ?>

        <button class="modal__submit" type="submit">
           <?= htmlspecialchars($arResult["FORM_SUBMIT"] ?: 'Отправить') ?>
        </button>
        
        <?= $arResult["FORM_FOOTER"] ?>
    </div>
</div>