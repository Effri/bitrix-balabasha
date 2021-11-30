<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?php
use Bitrix\Main\Page\Asset;
use \Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
$full_width = $APPLICATION->GetProperty("full");
$left_menu = $APPLICATION->GetProperty("left_menu");
$sidebar = $APPLICATION->GetProperty("sidebar");
global $noLeftSidebar;
?>
<? \Profitkit\M1\Core::checkRestartBuffer(); ?>
<? if ($left_menu == 'Y' or $sidebar == 'Y"') { ?>
    </div>
    <? if ($noLeftSidebar !== true) { ?>
    <div class="col-3">
        <? if ($left_menu == 'Y') { ?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "left",
                Array(
                    "ALLOW_MULTI_SELECT" => "Y",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "4",
                    "MENU_CACHE_GET_VARS" => array(""),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "left",
                    "USE_EXT" => "Y"
                )
            );?>
        <? } ?>
        <? if ($sidebar == 'Y') { ?>
            <div class="sidebar_block">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_RECURSIVE" => "Y",
                        "AREA_FILE_SHOW" => "sect",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => ""
                    )
                );?>
            </div>
        <? } ?>
        <?$APPLICATION->ShowViewContent('left_sidebar');?>
    </div>
    <? } ?>
</div>
        <? } ?>
<? if (!$full_width and $APPLICATION->GetCurPage() != '/') { ?></div><? } ?>
</main>
<? include('include/blocks/footer_1.php');?>
</div>
<?php
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/modal.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/dropdown.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.touchSwipe.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/bootstrap-tabs.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/main.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/slick.min.js");
?>
</body>
</html>