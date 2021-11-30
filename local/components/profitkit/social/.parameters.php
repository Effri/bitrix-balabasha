<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
    "PARAMETERS" => array(
        "VK" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SOC_VK"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
//        "FB" => array(
//            "PARENT" => "BASE",
//            "NAME" => GetMessage("SOC_FB"),
//            "TYPE" => "STRING",
//            "DEFAULT" => "",
//        ),
        "INST" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SOC_INST"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "TW" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SOC_TW"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
//        "GOOGLE" => array(
//            "PARENT" => "BASE",
//            "NAME" => GetMessage("SOC_GOOGLE"),
//            "TYPE" => "STRING",
//            "DEFAULT" => "",
//        ),
        "YOUTUBE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SOC_VIBER"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "ODNOKLASSNIKI" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("SOC_OK"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
    )
);

?>