<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <ul class="header__menu">
        <?foreach($arResult as $arItem):?>
            <?if($arItem["DEPTH_LEVEL"] == 1):?>
                <li class="header__menu-item<?if($arItem["SELECTED"]):?> is-active<?endif?>">
                    <a href="<?=$arItem["LINK"]?>" class="header__menu-link">
                        <?=$arItem["TEXT"]?>
                    </a>
                    
                    <?// Проверяем, есть ли у пункта дочерние элементы (IS_PARENT) ?>
                    <?if($arItem["IS_PARENT"]):?>
                        <ul class="header__submenu">
                            <?// Выводим только элементы, у которых DEPTH_LEVEL == 2 ?>
                            <?foreach($arResult as $subItem):?>
                                <?if($subItem["DEPTH_LEVEL"] == 2 && $subItem["CHAIN"][0] == $arItem["TEXT"]):?>
                                    <li class="header__submenu-item<?if($subItem["SELECTED"]):?> is-active<?endif?>">
                                        <a href="<?=$subItem["LINK"]?>" class="header__submenu-link">
                                            <?=$subItem["TEXT"]?>
                                        </a>
                                    </li>
                                <?endif?>
                            <?endforeach?>
                        </ul>
                    <?endif?>
                </li>
            <?endif?>
        <?endforeach?>
    </ul>
<?endif?>