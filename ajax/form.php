<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?php
//use Bitrix\Main\Application;
//define('STOP_STATISTICS', true);
//define('NO_KEEP_STATISTIC', 'Y');
//define('NO_AGENT_STATISTIC','Y');
//define('DisableEventsCheck', true);
//define('BX_SECURITY_SHOW_MESSAGE', true);
//define('NOT_CHECK_PERMISSIONS', true);
//$APPLICATION->ShowAjaxHead();
//$form_id = \Local\Profitkit\Finder::iblockId('profitkit_callback', 'profitkit_forms');
//$context = Application::getInstance()->getContext();
//$request = $context->getRequest();
//if ((int)$request['form_id'] > 0)
//    $form_id = (int)$request['form_id'];
//?>
<?//$APPLICATION->IncludeComponent(
//    "profitkit:form.simple",
//    "callback",
//    Array('IBLOCK_ID'=>$form_id,
//        "AJAX"=>"Y",
//        "LOAD_JS_CSS" => "Y",
//        "SOGLASIE" => "Y"
//        /*'FIELDS'=>array('NAME'),
//        'PROPERTY'=>array('NAME','PHONE'),
//        'REQUIRED'=>array('NAME', 'PHONE')*/)
//);?>

<?
$arMailFields = array(
    'NAME'=> $_POST['PROPERTY[NAME][0]'],
    'PHONE'=> $_POST['PROPERTY[282][0]'],
    'ADRESS'=> $_POST['PROPERTY[323][0]'],
    'DATA'=> $_POST['PROPERTY[324][0]'],
    'FACILITIES'=> $_POST['PROPERTY[325][0]'],
    'BUKET'=> $_POST['PROPERTY[326][0]'],
    'NAME_SEC'=> $_POST['PROPERTY[327][0]'],
    'PHONE_SEC'=> $_POST['PROPERTY[328][0]'],
);
$ind = CEvent::Send('FORM_BOUQUETS', 's1', $arMailFields);

CModule::IncludeModule('iblock');
$el = new CIBlockElement;

$PROP = array();
$PROP[NAME] = $_POST["PROPERTY[NAME][0]"]; //электронная почта
$PROP[282] = $_POST["PROPERTY[282][0]"];
$PROP[323] = $_POST["PROPERTY[323][0]"];
$PROP[324] = $_POST["PROPERTY[324][0]"];
$PROP[325] = $_POST["PROPERTY[325][0]"];
$PROP[326] = $_POST["PROPERTY[326][0]"];
$PROP[327] = $_POST["PROPERTY[327][0]"];
$PROP[328] = $_POST["PROPERTY[328][0]"];

$arLoadProductArray = Array(
    "IBLOCK_ID"      => 21,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Отправить заявку",
    "ACTIVE"         => "Y"
);

$el->Add($arLoadProductArray);
?>
