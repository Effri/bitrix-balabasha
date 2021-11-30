<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<div class="reviews_list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
    $date = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($arItem['DATE_ACTIVE_FROM'], CSite::GetDateFormat()));
	?>
	<div class="reviews_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <div class="reviews_info">
            <div><?=$arItem['NAME'];?></div>
            <div class="reviews_post"><?=$arItem['PROPERTIES']['POST']['VALUE'];?></div>
            <img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>">
            <div class="reviews_social">
                <? foreach ($arItem['PROPERTIES'] as $prop) {
                    if (strpos($prop['CODE'], "SOCIAL") !== false and $prop['VALUE']) {
                    ?>
<a href="<?=$prop['VALUE'];?>" target="_blank" class="">
<? switch ($prop['CODE']) {
    case "SOCIAL_VK": ?>
        <i><svg width="21" height="12" viewBox="0 0 21 12" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.1672 10.3053C20.143 10.2531 20.1205 10.2098 20.0995 10.1751C19.7525 9.55015 19.0894 8.78306 18.1106 7.87362L18.0899 7.8528L18.0795 7.84258L18.0691 7.83212H18.0586C17.6143 7.40863 17.333 7.12389 17.2152 6.97811C16.9997 6.70041 16.9514 6.41932 17.0692 6.13451C17.1524 5.91932 17.465 5.46487 18.0064 4.77055C18.2911 4.40257 18.5166 4.10766 18.6831 3.88547C19.8842 2.28871 20.4049 1.26835 20.2452 0.824008L20.1831 0.720171C20.1415 0.657658 20.0339 0.600468 19.8605 0.548313C19.6868 0.496267 19.4647 0.48766 19.1939 0.522345L16.195 0.543061C16.1464 0.525846 16.077 0.527451 15.9866 0.548313C15.8964 0.569175 15.8512 0.579643 15.8512 0.579643L15.799 0.605721L15.7576 0.63705C15.7229 0.657767 15.6847 0.694203 15.643 0.746286C15.6015 0.798186 15.5668 0.859094 15.5391 0.928501C15.2126 1.7685 14.8414 2.54948 14.4248 3.27142C14.1679 3.7019 13.932 4.07498 13.7165 4.39087C13.5014 4.70665 13.3209 4.9393 13.1752 5.08844C13.0293 5.23772 12.8977 5.35731 12.7794 5.44766C12.6614 5.53803 12.5712 5.57622 12.5088 5.56225C12.4463 5.54828 12.3874 5.53442 12.3316 5.52056C12.2345 5.45805 12.1564 5.37303 12.0975 5.26544C12.0383 5.15785 11.9985 5.02242 11.9777 4.85928C11.9569 4.69603 11.9447 4.55561 11.9412 4.43755C11.9379 4.31964 11.9394 4.15285 11.9465 3.93766C11.9537 3.72236 11.9569 3.57669 11.9569 3.50032C11.9569 3.23648 11.9621 2.95013 11.9724 2.64121C11.9829 2.33229 11.9914 2.08752 11.9985 1.9072C12.0056 1.7267 12.0089 1.53573 12.0089 1.3344C12.0089 1.13308 11.9966 0.975186 11.9724 0.86059C11.9485 0.746139 11.9117 0.635044 11.8633 0.527341C11.8147 0.419748 11.7434 0.336518 11.6499 0.277432C11.5562 0.21842 11.4397 0.171589 11.3011 0.136794C10.9331 0.0535278 10.4645 0.00848436 9.89515 0.00148165C8.60399 -0.0123779 7.77435 0.070998 7.40641 0.2515C7.26063 0.327764 7.12871 0.431966 7.01076 0.563777C6.88577 0.71656 6.86834 0.799937 6.95857 0.81365C7.37516 0.876055 7.67007 1.02534 7.84365 1.26135L7.9062 1.38641C7.95485 1.47665 8.00343 1.6364 8.05205 1.86544C8.10059 2.09449 8.13192 2.34786 8.14571 2.62542C8.18036 3.13228 8.18036 3.56615 8.14571 3.92708C8.11095 4.28816 8.07813 4.56925 8.0468 4.77058C8.01547 4.97191 7.96864 5.13505 7.9062 5.25997C7.84365 5.38492 7.80203 5.4613 7.78117 5.48902C7.76034 5.51674 7.74298 5.53421 7.72919 5.54106C7.63896 5.57564 7.54512 5.59325 7.44799 5.59325C7.35072 5.59325 7.23277 5.5446 7.09395 5.44736C6.95518 5.35013 6.81115 5.21657 6.66186 5.04646C6.51258 4.87632 6.34423 4.63855 6.15672 4.33313C5.96936 4.02771 5.77496 3.66674 5.57364 3.25023L5.40707 2.94816C5.30294 2.75384 5.1607 2.47088 4.98019 2.09956C4.79958 1.72809 4.63994 1.36876 4.50116 1.02165C4.44569 0.875872 4.36235 0.764887 4.25129 0.688513L4.19917 0.657183C4.16452 0.629464 4.1089 0.600031 4.0326 0.568664C3.95619 0.537335 3.87646 0.514867 3.79309 0.501044L0.939886 0.521761C0.648325 0.521761 0.450499 0.587812 0.346333 0.719733L0.304645 0.782138C0.283819 0.816896 0.273315 0.872407 0.273315 0.948817C0.273315 1.02519 0.294141 1.11892 0.335829 1.22991C0.752345 2.20883 1.2053 3.15292 1.69468 4.06232C2.18407 4.97173 2.60934 5.70428 2.97023 6.25931C3.3312 6.81475 3.69914 7.33897 4.07404 7.83171C4.44894 8.32464 4.69709 8.64053 4.81851 8.7793C4.94007 8.91834 5.03556 9.02228 5.10497 9.09169L5.36534 9.34156C5.53195 9.50821 5.77661 9.70778 6.09942 9.94029C6.42231 10.173 6.77978 10.402 7.17201 10.6278C7.5643 10.8532 8.02068 11.0372 8.5414 11.1795C9.06204 11.3219 9.56879 11.3791 10.0617 11.3515H11.2593C11.5021 11.3305 11.6861 11.2541 11.8112 11.1223L11.8526 11.0701C11.8805 11.0287 11.9066 10.9643 11.9306 10.8777C11.955 10.7909 11.9671 10.6953 11.9671 10.5914C11.96 10.2929 11.9827 10.0239 12.0347 9.78445C12.0866 9.54504 12.1457 9.36454 12.2119 9.24298C12.278 9.12152 12.3526 9.01904 12.4357 8.93595C12.5189 8.85269 12.5782 8.80225 12.613 8.78488C12.6476 8.76741 12.6752 8.75556 12.696 8.74845C12.8626 8.69294 13.0587 8.7467 13.2845 8.90998C13.5102 9.07313 13.7218 9.27456 13.9198 9.51397C14.1177 9.75359 14.3554 10.0224 14.633 10.3209C14.9108 10.6194 15.1537 10.8414 15.3619 10.9874L15.5701 11.1123C15.7091 11.1957 15.8896 11.2721 16.1118 11.3415C16.3336 11.4109 16.528 11.4282 16.6948 11.3935L19.3605 11.352C19.6241 11.352 19.8293 11.3083 19.9748 11.2217C20.1206 11.1349 20.2073 11.0393 20.2352 10.9353C20.2631 10.8312 20.2646 10.7131 20.2405 10.5811C20.2158 10.4494 20.1915 10.3573 20.1672 10.3053Z"></path>
            </svg></i>
        <? break; ?>
    <? case "SOCIAL_FB": ?>
        <i><svg width="9" height="18" viewBox="0 0 9 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.25 6H0V9H2.25V18H6V9H8.7315L9 6H6V4.74975C6 4.0335 6.144 3.75 6.83625 3.75H9V0H6.144C3.447 0 2.25 1.18725 2.25 3.46125V6Z"></path>
            </svg>
        </i>
        <? break; ?>
    <? case "SOCIAL_TW": ?>
        <i><svg width="21" height="12" viewBox="0 0 21 12" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.1672 10.3053C20.143 10.2531 20.1205 10.2098 20.0995 10.1751C19.7525 9.55015 19.0894 8.78306 18.1106 7.87362L18.0899 7.8528L18.0795 7.84258L18.0691 7.83212H18.0586C17.6143 7.40863 17.333 7.12389 17.2152 6.97811C16.9997 6.70041 16.9514 6.41932 17.0692 6.13451C17.1524 5.91932 17.465 5.46487 18.0064 4.77055C18.2911 4.40257 18.5166 4.10766 18.6831 3.88547C19.8842 2.28871 20.4049 1.26835 20.2452 0.824008L20.1831 0.720171C20.1415 0.657658 20.0339 0.600468 19.8605 0.548313C19.6868 0.496267 19.4647 0.48766 19.1939 0.522345L16.195 0.543061C16.1464 0.525846 16.077 0.527451 15.9866 0.548313C15.8964 0.569175 15.8512 0.579643 15.8512 0.579643L15.799 0.605721L15.7576 0.63705C15.7229 0.657767 15.6847 0.694203 15.643 0.746286C15.6015 0.798186 15.5668 0.859094 15.5391 0.928501C15.2126 1.7685 14.8414 2.54948 14.4248 3.27142C14.1679 3.7019 13.932 4.07498 13.7165 4.39087C13.5014 4.70665 13.3209 4.9393 13.1752 5.08844C13.0293 5.23772 12.8977 5.35731 12.7794 5.44766C12.6614 5.53803 12.5712 5.57622 12.5088 5.56225C12.4463 5.54828 12.3874 5.53442 12.3316 5.52056C12.2345 5.45805 12.1564 5.37303 12.0975 5.26544C12.0383 5.15785 11.9985 5.02242 11.9777 4.85928C11.9569 4.69603 11.9447 4.55561 11.9412 4.43755C11.9379 4.31964 11.9394 4.15285 11.9465 3.93766C11.9537 3.72236 11.9569 3.57669 11.9569 3.50032C11.9569 3.23648 11.9621 2.95013 11.9724 2.64121C11.9829 2.33229 11.9914 2.08752 11.9985 1.9072C12.0056 1.7267 12.0089 1.53573 12.0089 1.3344C12.0089 1.13308 11.9966 0.975186 11.9724 0.86059C11.9485 0.746139 11.9117 0.635044 11.8633 0.527341C11.8147 0.419748 11.7434 0.336518 11.6499 0.277432C11.5562 0.21842 11.4397 0.171589 11.3011 0.136794C10.9331 0.0535278 10.4645 0.00848436 9.89515 0.00148165C8.60399 -0.0123779 7.77435 0.070998 7.40641 0.2515C7.26063 0.327764 7.12871 0.431966 7.01076 0.563777C6.88577 0.71656 6.86834 0.799937 6.95857 0.81365C7.37516 0.876055 7.67007 1.02534 7.84365 1.26135L7.9062 1.38641C7.95485 1.47665 8.00343 1.6364 8.05205 1.86544C8.10059 2.09449 8.13192 2.34786 8.14571 2.62542C8.18036 3.13228 8.18036 3.56615 8.14571 3.92708C8.11095 4.28816 8.07813 4.56925 8.0468 4.77058C8.01547 4.97191 7.96864 5.13505 7.9062 5.25997C7.84365 5.38492 7.80203 5.4613 7.78117 5.48902C7.76034 5.51674 7.74298 5.53421 7.72919 5.54106C7.63896 5.57564 7.54512 5.59325 7.44799 5.59325C7.35072 5.59325 7.23277 5.5446 7.09395 5.44736C6.95518 5.35013 6.81115 5.21657 6.66186 5.04646C6.51258 4.87632 6.34423 4.63855 6.15672 4.33313C5.96936 4.02771 5.77496 3.66674 5.57364 3.25023L5.40707 2.94816C5.30294 2.75384 5.1607 2.47088 4.98019 2.09956C4.79958 1.72809 4.63994 1.36876 4.50116 1.02165C4.44569 0.875872 4.36235 0.764887 4.25129 0.688513L4.19917 0.657183C4.16452 0.629464 4.1089 0.600031 4.0326 0.568664C3.95619 0.537335 3.87646 0.514867 3.79309 0.501044L0.939886 0.521761C0.648325 0.521761 0.450499 0.587812 0.346333 0.719733L0.304645 0.782138C0.283819 0.816896 0.273315 0.872407 0.273315 0.948817C0.273315 1.02519 0.294141 1.11892 0.335829 1.22991C0.752345 2.20883 1.2053 3.15292 1.69468 4.06232C2.18407 4.97173 2.60934 5.70428 2.97023 6.25931C3.3312 6.81475 3.69914 7.33897 4.07404 7.83171C4.44894 8.32464 4.69709 8.64053 4.81851 8.7793C4.94007 8.91834 5.03556 9.02228 5.10497 9.09169L5.36534 9.34156C5.53195 9.50821 5.77661 9.70778 6.09942 9.94029C6.42231 10.173 6.77978 10.402 7.17201 10.6278C7.5643 10.8532 8.02068 11.0372 8.5414 11.1795C9.06204 11.3219 9.56879 11.3791 10.0617 11.3515H11.2593C11.5021 11.3305 11.6861 11.2541 11.8112 11.1223L11.8526 11.0701C11.8805 11.0287 11.9066 10.9643 11.9306 10.8777C11.955 10.7909 11.9671 10.6953 11.9671 10.5914C11.96 10.2929 11.9827 10.0239 12.0347 9.78445C12.0866 9.54504 12.1457 9.36454 12.2119 9.24298C12.278 9.12152 12.3526 9.01904 12.4357 8.93595C12.5189 8.85269 12.5782 8.80225 12.613 8.78488C12.6476 8.76741 12.6752 8.75556 12.696 8.74845C12.8626 8.69294 13.0587 8.7467 13.2845 8.90998C13.5102 9.07313 13.7218 9.27456 13.9198 9.51397C14.1177 9.75359 14.3554 10.0224 14.633 10.3209C14.9108 10.6194 15.1537 10.8414 15.3619 10.9874L15.5701 11.1123C15.7091 11.1957 15.8896 11.2721 16.1118 11.3415C16.3336 11.4109 16.528 11.4282 16.6948 11.3935L19.3605 11.352C19.6241 11.352 19.8293 11.3083 19.9748 11.2217C20.1206 11.1349 20.2073 11.0393 20.2352 10.9353C20.2631 10.8312 20.2646 10.7131 20.2405 10.5811C20.2158 10.4494 20.1915 10.3573 20.1672 10.3053Z"></path>
            </svg></i>
        <? break; ?>
    <? case "SOCIAL_INST": ?>
        <i><svg width="21" height="12" viewBox="0 0 21 12" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.1672 10.3053C20.143 10.2531 20.1205 10.2098 20.0995 10.1751C19.7525 9.55015 19.0894 8.78306 18.1106 7.87362L18.0899 7.8528L18.0795 7.84258L18.0691 7.83212H18.0586C17.6143 7.40863 17.333 7.12389 17.2152 6.97811C16.9997 6.70041 16.9514 6.41932 17.0692 6.13451C17.1524 5.91932 17.465 5.46487 18.0064 4.77055C18.2911 4.40257 18.5166 4.10766 18.6831 3.88547C19.8842 2.28871 20.4049 1.26835 20.2452 0.824008L20.1831 0.720171C20.1415 0.657658 20.0339 0.600468 19.8605 0.548313C19.6868 0.496267 19.4647 0.48766 19.1939 0.522345L16.195 0.543061C16.1464 0.525846 16.077 0.527451 15.9866 0.548313C15.8964 0.569175 15.8512 0.579643 15.8512 0.579643L15.799 0.605721L15.7576 0.63705C15.7229 0.657767 15.6847 0.694203 15.643 0.746286C15.6015 0.798186 15.5668 0.859094 15.5391 0.928501C15.2126 1.7685 14.8414 2.54948 14.4248 3.27142C14.1679 3.7019 13.932 4.07498 13.7165 4.39087C13.5014 4.70665 13.3209 4.9393 13.1752 5.08844C13.0293 5.23772 12.8977 5.35731 12.7794 5.44766C12.6614 5.53803 12.5712 5.57622 12.5088 5.56225C12.4463 5.54828 12.3874 5.53442 12.3316 5.52056C12.2345 5.45805 12.1564 5.37303 12.0975 5.26544C12.0383 5.15785 11.9985 5.02242 11.9777 4.85928C11.9569 4.69603 11.9447 4.55561 11.9412 4.43755C11.9379 4.31964 11.9394 4.15285 11.9465 3.93766C11.9537 3.72236 11.9569 3.57669 11.9569 3.50032C11.9569 3.23648 11.9621 2.95013 11.9724 2.64121C11.9829 2.33229 11.9914 2.08752 11.9985 1.9072C12.0056 1.7267 12.0089 1.53573 12.0089 1.3344C12.0089 1.13308 11.9966 0.975186 11.9724 0.86059C11.9485 0.746139 11.9117 0.635044 11.8633 0.527341C11.8147 0.419748 11.7434 0.336518 11.6499 0.277432C11.5562 0.21842 11.4397 0.171589 11.3011 0.136794C10.9331 0.0535278 10.4645 0.00848436 9.89515 0.00148165C8.60399 -0.0123779 7.77435 0.070998 7.40641 0.2515C7.26063 0.327764 7.12871 0.431966 7.01076 0.563777C6.88577 0.71656 6.86834 0.799937 6.95857 0.81365C7.37516 0.876055 7.67007 1.02534 7.84365 1.26135L7.9062 1.38641C7.95485 1.47665 8.00343 1.6364 8.05205 1.86544C8.10059 2.09449 8.13192 2.34786 8.14571 2.62542C8.18036 3.13228 8.18036 3.56615 8.14571 3.92708C8.11095 4.28816 8.07813 4.56925 8.0468 4.77058C8.01547 4.97191 7.96864 5.13505 7.9062 5.25997C7.84365 5.38492 7.80203 5.4613 7.78117 5.48902C7.76034 5.51674 7.74298 5.53421 7.72919 5.54106C7.63896 5.57564 7.54512 5.59325 7.44799 5.59325C7.35072 5.59325 7.23277 5.5446 7.09395 5.44736C6.95518 5.35013 6.81115 5.21657 6.66186 5.04646C6.51258 4.87632 6.34423 4.63855 6.15672 4.33313C5.96936 4.02771 5.77496 3.66674 5.57364 3.25023L5.40707 2.94816C5.30294 2.75384 5.1607 2.47088 4.98019 2.09956C4.79958 1.72809 4.63994 1.36876 4.50116 1.02165C4.44569 0.875872 4.36235 0.764887 4.25129 0.688513L4.19917 0.657183C4.16452 0.629464 4.1089 0.600031 4.0326 0.568664C3.95619 0.537335 3.87646 0.514867 3.79309 0.501044L0.939886 0.521761C0.648325 0.521761 0.450499 0.587812 0.346333 0.719733L0.304645 0.782138C0.283819 0.816896 0.273315 0.872407 0.273315 0.948817C0.273315 1.02519 0.294141 1.11892 0.335829 1.22991C0.752345 2.20883 1.2053 3.15292 1.69468 4.06232C2.18407 4.97173 2.60934 5.70428 2.97023 6.25931C3.3312 6.81475 3.69914 7.33897 4.07404 7.83171C4.44894 8.32464 4.69709 8.64053 4.81851 8.7793C4.94007 8.91834 5.03556 9.02228 5.10497 9.09169L5.36534 9.34156C5.53195 9.50821 5.77661 9.70778 6.09942 9.94029C6.42231 10.173 6.77978 10.402 7.17201 10.6278C7.5643 10.8532 8.02068 11.0372 8.5414 11.1795C9.06204 11.3219 9.56879 11.3791 10.0617 11.3515H11.2593C11.5021 11.3305 11.6861 11.2541 11.8112 11.1223L11.8526 11.0701C11.8805 11.0287 11.9066 10.9643 11.9306 10.8777C11.955 10.7909 11.9671 10.6953 11.9671 10.5914C11.96 10.2929 11.9827 10.0239 12.0347 9.78445C12.0866 9.54504 12.1457 9.36454 12.2119 9.24298C12.278 9.12152 12.3526 9.01904 12.4357 8.93595C12.5189 8.85269 12.5782 8.80225 12.613 8.78488C12.6476 8.76741 12.6752 8.75556 12.696 8.74845C12.8626 8.69294 13.0587 8.7467 13.2845 8.90998C13.5102 9.07313 13.7218 9.27456 13.9198 9.51397C14.1177 9.75359 14.3554 10.0224 14.633 10.3209C14.9108 10.6194 15.1537 10.8414 15.3619 10.9874L15.5701 11.1123C15.7091 11.1957 15.8896 11.2721 16.1118 11.3415C16.3336 11.4109 16.528 11.4282 16.6948 11.3935L19.3605 11.352C19.6241 11.352 19.8293 11.3083 19.9748 11.2217C20.1206 11.1349 20.2073 11.0393 20.2352 10.9353C20.2631 10.8312 20.2646 10.7131 20.2405 10.5811C20.2158 10.4494 20.1915 10.3573 20.1672 10.3053Z"></path>
            </svg></i>
        <? break; ?>
<? } ?>
</a>
                <? }
                }?>
            </div>
        </div>
        <div class="reviews_text">
            <div><b><?=$date;?></b></div>
            <?=$arItem['PREVIEW_TEXT'];?>
            <? if ($arItem['PROPERTIES']['DOCUMENTS']['VALUE']) {
                $file = CFile::GetPath($arResult["PROPERTIES"]["DOCUMENTS"]["VALUE"][0]);
                ?>
                <a href="<?=$file;?>" target="_blank" class="reviews_file"><i><svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="file" class="svg-inline--fa fa-file fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M369.9 97.9L286 14C277 5 264.8-.1 252.1-.1H48C21.5 0 0 21.5 0 48v416c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48V131.9c0-12.7-5.1-25-14.1-34zM332.1 128H256V51.9l76.1 76.1zM48 464V48h160v104c0 13.3 10.7 24 24 24h104v288H48z"></path></svg></i><?=$arItem['PROPERTIES']['DOCUMENTS']['DESCRIPTION'][0];?></a>
            <? } ?>
            <? if ($arItem['PROPERTIES']['VIDEO']['VALUE']) { ?>
                <a href=""><?=$arItem['PROPERTIES']['VIDEO']['DESCRIPTION'];?> <?=$arItem['PROPERTIES']['VIDEO']['VALUE'];?></a>
            <? } ?>
        </div>

	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

