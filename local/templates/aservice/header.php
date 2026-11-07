<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
$settings = getSiteSettings();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?$APPLICATION->ShowTitle()?></title>
  <?$APPLICATION->ShowHead();?>
  <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles.css" />
</head>
<body>
  <div id="panel"><?$APPLICATION->ShowPanel();?></div>

  <header class="header">
    <div class="header__inner container">
      <div class="header__top">
        <button class="burger" type="button" aria-label="Меню">
          <span class="burger__line"></span>
          <span class="burger__line"></span>
          <span class="burger__line"></span>
        </button>

        <div class="header__logo">
          <img src="<?=SITE_TEMPLATE_PATH?>/images/gears.png" alt="logo" />
          <p class="site-name">
            <span class="site-name__small text-sm"><?=$settings['SITE_NAME_SMALL']?></span>
            <span class="site-name__big h3"><?=$settings['SITE_NAME_BIG']?></span>
          </p>
        </div>

        <div class="header-box">
          <div class="addres-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/location.png" alt="icon" width="24" height="24" />
            <p><?=$settings['ADRESS']?></p>
          </div>

          <div class="header-box__socmedia">
            <?if($settings['TELEGRAM']):?>
              <a href="<?=$settings['TELEGRAM']?>" class="animated_icon" target="_blank" rel="noopener">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/telegram.png" alt="tg" width="24" height="24" />
              </a>
            <?endif?>

            <?if($settings['MAX']):?>
              <a href="<?=$settings['MAX']?>" class="animated_icon" target="_blank" rel="noopener">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/Max_logo-64x64.png" alt="max" width="24" height="24" />
              </a>
            <?endif?>

          </div>

          <div class="phone-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/telephone.png" alt="phone" width="24" height="24" />
            <div class="phone-box__text">
              <a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['PHONE'])?>">
                <?=$settings['PHONE']?>
              </a>
              <span class="time-work"><?=$settings['TIME_WORK']?></span>
            </div>
          </div>
        </div>
      </div>

      <div class="header__bottom">
        <div class="header-box__nav">
          <?$APPLICATION->IncludeComponent("bitrix:menu", "aservice", array(
            "ROOT_MENU_TYPE" => "top",
            "MENU_CACHE_TYPE" => "Y",
            "MENU_CACHE_TIME" => "36000000",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MAX_LEVEL" => "2",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "N",
            "ALLOW_MULTI_SELECT" => "N"
          ), false);?>
        </div>
        <div class="header-box__callback">
          <button type="button" data-modal-open="callback">Заказать звонок</button>
        </div>
      </div>
    </div>
  </header>

  <main class="main"></main>