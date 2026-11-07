<?php
define('NO_KEEP_STATISTIC', true);
define('NO_AGENT_CHECK', true);
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Loader;

header('Content-Type: application/json; charset=utf-8');

function sendJson(array $data): void
{
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJson(['success' => false, 'error' => 'Метод не разрешён']);
}

if (!check_bitrix_sessid()) {
    sendJson(['success' => false, 'error' => 'Сессия устарела']);
}

if (!Loader::includeModule('form')) {
    sendJson(['success' => false, 'error' => 'Модуль «Веб-формы» не установлен']);
}

$webFormId = (int)($_POST['WEB_FORM_ID'] ?? 0);
if (!$webFormId) {
    sendJson(['success' => false, 'error' => 'Не передан WEB_FORM_ID']);
}

// Находим ID полей по SID
$sidToId = [];
$rs = CFormField::GetList($webFormId, '');
while ($f = $rs->Fetch()) {
    if (!empty($f['SID'])) {
        $sidToId[$f['SID']] = (int)$f['ID'];
    }
}

$getBySid = function (string $sid) use ($sidToId): string {
    $id = $sidToId[$sid] ?? 0;
    return $id ? trim($_POST['form_text_' . $id] ?? '') : '';
};

// Валидация
$errors = [];
if ($getBySid('NAME') === '')    $errors[] = 'Введите имя';
if ($getBySid('PHONE') === '')   $errors[] = 'Введите телефон';
if (empty($_POST['form_checkbox_AGREEMENT'])) $errors[] = 'Подтвердите согласие';

if ($errors) {
    sendJson(['success' => false, 'error' => implode('; ', $errors)]);
}

// Сбор всех полей
$arValues = [];
foreach ($_POST as $key => $val) {
    if (strpos($key, 'form_') !== 0) continue;
    $cleanKey = rtrim($key, '[]');

    if (strpos($cleanKey, 'form_checkbox_') === 0) {
        $arValues[$cleanKey] = is_array($val) ? $val : [$val];
    } else {
        $arValues[$cleanKey] = $val;
    }
}

$resultId = CFormResult::Add($webFormId, $arValues, 'N');

if (!$resultId) {
    global $strError;
    sendJson(['success' => false, 'error' => $strError ?: 'Не удалось сохранить заявку']);
}

CFormResult::Mail($resultId);
sendJson(['success' => true, 'result_id' => (int)$resultId]);