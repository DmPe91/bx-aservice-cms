<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
  </main>

  <footer class="footer">
    <div class="footer__inner container">
      <div class="footer__top">
        <div class="footer__logo">
          <div class="logo-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/gears.png" alt="logo" />
            <p class="site-name">
              <span class="site-name__small"><?=$settings['SITE_NAME_SMALL']?></span>
              <span class="site-name__big"><?=$settings['SITE_NAME_BIG']?></span>
            </p>
          </div>
          <p class="logo-description">
            Специализированный автосервис в Магадане
          </p>
        </div>

        <div class="footer__nav">
          <?$APPLICATION->IncludeComponent("bitrix:menu", "aservice", array(
            "ROOT_MENU_TYPE" => "top",
            "MENU_CACHE_TYPE" => "Y",
            "MENU_CACHE_TIME" => "36000000",
            "MENU_CACHE_USE_GROUPS" => "Y",
            "MAX_LEVEL" => "1",
            "CHILD_MENU_TYPE" => "left",
            "USE_EXT" => "N",
            "ALLOW_MULTI_SELECT" => "N"
          ), false);?>
        </div>

        <div class="footer__services">
          <?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "footer",
    [
        "IBLOCK_TYPE" => "services",
        "IBLOCK_ID" => "4",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "DETAIL_URL" => "/services/#ELEMENT_CODE#/",
    ],
    false
);
?>
        </div>

        <div class="footer__contacts">
          <div class="phone-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/telephone.png" alt="phone" width="24" height="24" />
            <div class="phone-box__text">
              <a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['PHONE'])?>">
                <?=$settings['PHONE']?>
              </a>
              <span class="time-work"><?=$settings['WORK_TIME']?></span>
            </div>
          </div>
          <div class="addres-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/location.png" alt="icon" width="24" height="24" />
            <p><?=$settings['ADDRESS']?></p>
          </div>
          <div class="mail-box">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/empty-email.png" alt="icon" width="24" height="24" />
            <a href="mailto:<?=$settings['EMAIL']?>"><?=$settings['EMAIL']?></a>
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

            <?if($settings['VK']):?>
              <a href="<?=$settings['VK']?>" class="animated_icon" target="_blank" rel="noopener">
                <img src="<?=SITE_TEMPLATE_PATH?>/images/vk.png" alt="vk" width="24" height="24" />
              </a>
            <?endif?>
          </div>
        </div>
      </div>

      <div class="footer__bottom">
        <a href="<?=SITE_DIR?>privacy/" class="political-page">Политика обработки данных</a>
        <div class="copyright">
          <span class="date">@2026</span>
          <div class="site-name">
            <span class="site-name__small"><?=$settings['SITE_NAME_SMALL']?></span>
            <span class="site-name__big"><?=$settings['SITE_NAME_BIG']?></span>
          </div>
        </div>
        <p class="author">
          <a href="https://github.com/DmPe91">DmPe91</a>
        </p>
      </div>
    </div>
  </footer>

 <?$APPLICATION->IncludeComponent(
    "bitrix:form.result.new",
    "callback", // Имя нашего кастомного шаблона
    [
        "WEB_FORM_ID" => "1", // ID вашей веб-формы
        "IGNORE_CUSTOM_TEMPLATE" => "N",
        "USE_EXTENDED_ERRORS" => "Y", // Рекомендую включить для отладки
        "SEF_MODE" => "N",
        "CACHE_TYPE" => "N", // Для форм кэш лучше отключать
    ],
    false
);?>

  <!-- Offcanvas -->
  <div class="offcanvas" id="offcanvas">
    <div class="offcanvas__header">
      <span class="site-name">
        <span class="site-name__small"><?=$settings['SITE_NAME_SMALL']?></span>
        <span class="site-name__big"><?=$settings['SITE_NAME_BIG']?></span>
      </span>
      <button class="offcanvas__close" type="button" aria-label="Закрыть">&times;</button>
    </div>
   <nav class="offcanvas__nav">
    <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "aservice",
        [
            "ROOT_MENU_TYPE"       => "top",
            "CHILD_MENU_TYPE"      => "left",
            "MAX_LEVEL"            => "2",
            "USE_EXT"              => "Y",
            "MENU_CACHE_TYPE"      => "A",
            "MENU_CACHE_TIME"      => "3600",
            "MENU_CACHE_USE_GROUPS"=> "Y",
            "MENU_CACHE_GET_VARS"  => [],
            "ALLOW_MULTI_SELECT"   => "N",
        ],
        false
    );?>
</nav>
    <div class="offcanvas__contacts">
      <a href="tel:<?=preg_replace('/[^0-9+]/', '', $settings['PHONE'])?>"><?=$settings['PHONE']?></a>
    </div>
  </div>

  <div class="offcanvas-overlay" id="offcanvas-overlay"></div>

  <script src="<?=SITE_TEMPLATE_PATH?>/script.js"></script>
</body>
</html>