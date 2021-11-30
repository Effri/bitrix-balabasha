<?require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");?>
<?
$arMailFields = array(
    'NAME'=> $_POST['PROPERTY[NAME][0]'],
    'PHONE'=> $_POST['PROPERTY[329][0]'],
    'EMAIL'=> $_POST['PROPERTY[330][0]'],
);
$ind = CEvent::Send('FORM_CORPORATIVE', 's1', $arMailFields);

CModule::IncludeModule('iblock');
$el = new CIBlockElement;

$PROP = array();
$PROP[NAME] = $_POST["PROPERTY[NAME][0]"]; //электронная почта
$PROP[329] = $_POST["PROPERTY[329][0]"]; //электронная почта
$PROP[330] = $_POST["PROPERTY[330][0]"]; //электронная почта

$arLoadProductArray = Array(
    "IBLOCK_ID"      => 35,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Отправить заявку",
    "ACTIVE"         => "Y"
);

$el->Add($arLoadProductArray);
?>
