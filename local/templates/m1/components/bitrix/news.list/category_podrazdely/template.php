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

<div class="main-frame m4">
    <div class="wrap">
        <div class="middle-banners single-item">
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="middle-banner">
                <div class="middle-banner__image"
                     style="background-image: url('<?= CFile::GetPath($arItem['PROPERTIES']['IMG']['VALUE']); ?>')"></div>
                <h2 class="middle-banner__header"><?=$arItem['PROPERTIES']['TXT_H2']['VALUE']?></h2>
                <div class="middle-banner__button-wrapper">
                    <a class="middle-banner__button btn" href="<?=$arItem['PROPERTIES']['HREF_LINK']['VALUE']?>"><?=$arItem['PROPERTIES']['HREF_TXT']['VALUE']?></a>
                </div>
            </div>
            <? endforeach; ?>
        </div>
    </div>
</div>