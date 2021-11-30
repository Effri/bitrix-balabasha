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
<div class="wrap-slider">
    <div class="exclusive-slider">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <div class="exclusive-banner" style="background-image: url('<?= CFile::GetPath($arItem['PROPERTIES']['IMG']['VALUE']); ?>')">
            <div class="exclusive-banner__footer">
                <span class="exclusive-banner__name"><?=$arItem['PROPERTIES']['BANNER_NAME']['VALUE']?></span>
                <span class="exclusive-banner__price"><?=$arItem['PROPERTIES']['BANNER_PRICE']['VALUE']?></span>
                <a class="exclusive-banner__button btn btn--primary"
                   href="<?=$arItem['PROPERTIES']['BANNER_BTN_LINK']['VALUE']?>"><?=$arItem['PROPERTIES']['BANNER_BTN_TXT']['VALUE']?></a>
            </div>
        </div>
        <? endforeach; ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.exclusive-slider').slick({
            dots: true,
        });
    });
</script>