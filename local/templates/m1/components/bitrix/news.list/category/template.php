<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="news">
    <div class="container">
        <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
            <?= $arResult["NAV_STRING"] ?><br/>
        <? endif; ?>
        <div class="row">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $date = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arItem['DATE_ACTIVE_FROM'], CSite::GetDateFormat()));
                ?>
                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="col-4 news_item"
                   id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="news_img"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"></div>
                    <div class="news_title"><?= $arItem['NAME']; ?></div>
                    <div class="news_date"><?= $date; ?></div>
                    <div class="news_text"><?= $arItem['PREVIEW_TEXT']; ?></div>
                </a>
            <? endforeach; ?>
        </div>
        <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
            <br/><?= $arResult["NAV_STRING"] ?>
        <? endif; ?>
    </div>
</div>


<div class="main-frame">
    <div class="wrap">
        <div class="middle-banners">
            <div class="middle-banner">
                <div class="middle-banner__image"
                     style="background-image: url(&quot;/files/file?path=MiddleBanners/20191231-101933-2576-20190922-141938-9954-middle-banner_01.png&quot;);"></div>
                <h2 class="middle-banner__header">???????????????????? ????????????</h2>
                <div class="middle-banner__button-wrapper">
                    <button class="middle-banner__button btn">?? ??????????????</button>
                </div>
            </div>
            <div class="middle-banner">
                <div class="middle-banner__image"
                     style="background-image: url(&quot;/files/file?path=MiddleBanners/20191231-101854-8617-middle-banner_02.png&quot;);"></div>
                <h2 class="middle-banner__header">???????????? ??????????????????</h2>
                <div class="middle-banner__button-wrapper">
                    <button class="middle-banner__button btn">?? ??????????????</button>
                </div>
            </div>
        </div>
    </div>
</div>