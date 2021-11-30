<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';


$strReturn .= '<div class="breadcrumbs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
        <div class="container">
            <div class="row"><a itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="breadcrumbs__link" href="/" title="Главная страница">
                        <span itemprop="item"><span itemprop="name">
                                <svg width="22" height="19" viewBox="0 0 22 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M21.116 8.24867L12.5302 0.853919L12.4876 0.811422C11.5951 0.173943 10.4049 0.173943 9.51235 0.811422L9.46984 0.853919L0.883975 8.24867C0.543941 8.54615 0.501436 9.09864 0.798966 9.43862C1.0965 9.77861 1.64905 9.82111 1.98909 9.52362L2.49914 9.09864V15.9834C2.49914 17.3859 3.64675 18.5333 5.0494 18.5333H16.9506C18.3532 18.5333 19.5009 17.3859 19.5009 15.9834V9.09864L20.0109 9.52362C20.1809 9.65112 20.3509 9.73611 20.5635 9.73611C20.8185 9.73611 21.031 9.65112 21.201 9.43862C21.4986 9.09864 21.4561 8.58865 21.116 8.24867ZM12.7852 16.8334H9.21482V11.0536H12.7852V16.8334ZM17.8007 8.03617V16.0259C17.8007 16.4934 17.4181 16.8759 16.9506 16.8759H14.4854V10.2036C14.4854 9.73611 14.1028 9.35363 13.6353 9.35363H8.36473C7.89718 9.35363 7.51465 9.73611 7.51465 10.2036V16.8759H5.0494C4.58185 16.8759 4.19931 16.4934 4.19931 16.0259V7.65369L10.5325 2.17138C10.83 2.00138 11.17 2.00138 11.4675 2.17138L17.8432 7.69619C17.8432 7.78118 17.8007 7.90868 17.8007 8.03617Z"/>
</svg>
</span>
                        <meta itemprop="position" content="0"></span>
                </a>
                <div class="breadcrumbs__slash"> &rarr; </div>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<a href="'.$arResult[$index]["LINK"].'" class="breadcrumbs__link" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<span itemprop="name">'.$title.'</span>
				<meta itemprop="position" content="'.($index + 1).'" />
			</a>
			<div class="breadcrumbs__slash"> &rarr; </div>
			';
	}
	else
	{
		$strReturn .= '
			<div class="breadcrumbs__current">
				<span>'.$title.'</span>
			</div>';
	}
}

$strReturn .= '</div></div></div>';

return $strReturn;
