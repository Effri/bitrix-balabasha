<?php
$autoloadPathDbconn= realpath(__DIR__).'/../composer/vendor/autoload.php';
require_once($autoloadPathDbconn) ;
/*CModule::AddAutoloadClasses(
    '', //не указываем имя модуля, так как автозагрузка устанавливается глобально
    array(
        '\Profitkit\Finder' => '/local/classes/profitkit/Finder.php', // имя класса => путь к файлу содержащему класс
    )
);*/

use Bitrix\Main\Mail\Event;

define("LOG_FILENAME", "/log.txt");
define("ORDER_IBLOCK_ID", 21);
define("ORDER_IBLOCK_ID_TWO", 35);
define("ORDER_IBLOCK_ID_THREE", 36);

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClassTwo", "OnAfterIBlockElementAddHandler"));
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClassThree", "OnAfterIBlockElementAddHandler"));

class MyClass{
    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields){

        if ($arFields["IBLOCK_ID"] == ORDER_IBLOCK_ID) {

            foreach ($arFields["PROPERTY_VALUES"] as $k => $props) {
                $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID" => $k));
                while ($prop_fields = $properties->GetNext())
                {
                    if ($prop_fields['PROPERTY_TYPE'] == 'L') {
                        $db_enum_list = CIBlockProperty::GetPropertyEnum($prop_fields['CODE'], Array(), Array("ID"=>$arFields["PROPERTY_VALUES"][$prop_fields['ID']]));
                        if($ar_enum_list = $db_enum_list->GetNext())
                        {
                            $prop[$prop_fields['ID']] = $ar_enum_list['VALUE'];
                        }
                    } else {

                        $prop[$prop_fields['ID']] = $arFields["PROPERTY_VALUES"][$prop_fields['ID']];
                    }

                }
            }

            $res2 = Event::send(
                array(
                    "EVENT_NAME" => "FORM_BOUQUETS",
                    "LID" => "s1",
                    "C_FIELDS" => array(
                        "NAME" => $arFields["NAME"],
                        "PHONE" => $prop[282],
                        "ADRESS" => $prop[323],
                        "DATA" => $prop[324],
                        "FACILITIES" => $prop[325],
                        "BUKET" => $prop[326],
                        "NAME_SEC" => $prop[327],
                        "PHONE_SEC" => $prop[328],
                        "SERVER_NAME" => $_SERVER['SERVER_NAME'],
                    ),
                )
            );
            if ($res2->getId()) {
                AddMessage2Log("Отправка сообщения на почту " . $res2->getId(), "my_module_id");
            } else {
                AddMessage2Log("Отправка сообщения на почту неудалась", "my_module_id");
            }
        }
    }
}

class MyClassTwo{
    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields){

        if ($arFields["IBLOCK_ID"] == ORDER_IBLOCK_ID_TWO) {
            $res2 = Event::send(
                array(
                    "EVENT_NAME" => "FORM_CORPORATIVE",
                    "LID" => "s1",
                    "C_FIELDS" => array(
                        "NAME" => $arFields["NAME"],
                        "PHONE" => $arFields["PROPERTY_VALUES"][329],
                        "EMAIL" => $arFields["PROPERTY_VALUES"][330],
                        "SERVER_NAME" => $_SERVER['SERVER_NAME'],
                    ),
                )
            );
            if ($res2->getId()) {
                AddMessage2Log("Отправка сообщения на почту " . $res2->getId(), "my_module_id");
            } else {
                AddMessage2Log("Отправка сообщения на почту неудалась", "my_module_id");
            }
        }
    }
}

class MyClassThree{
    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields){

        if ($arFields["IBLOCK_ID"] == ORDER_IBLOCK_ID_THREE) {

            foreach ($arFields["PROPERTY_VALUES"] as $k => $props) {
                $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arFields["IBLOCK_ID"], "ID" => $k));
                while ($prop_fields = $properties->GetNext())
                {
                    if ($prop_fields['PROPERTY_TYPE'] == 'L') {
                        $db_enum_list = CIBlockProperty::GetPropertyEnum($prop_fields['CODE'], Array(), Array("ID"=>$arFields["PROPERTY_VALUES"][$prop_fields['ID']]));
                        if($ar_enum_list = $db_enum_list->GetNext())
                        {
                            $prop[$prop_fields['ID']] = $ar_enum_list['VALUE'];
                        }
                    } else {

                        $prop[$prop_fields['ID']] = $arFields["PROPERTY_VALUES"][$prop_fields['ID']];
                    }

                }
            }

            $res2 = Event::send(
                array(
                    "EVENT_NAME" => "FORM_SUBSCRIBE",
                    "LID" => "s1",
                    "C_FIELDS" => array(
                        "NAME" => $arFields["NAME"],
                        "PHONE" => $prop[333],
                        "ADRESS" => $prop[334],
                        "FACILITIES" => $prop[336],
                        "MONEY" => $prop[337],
                        "COMMENT" => $prop[338],
                        "NAME_SEC" => $prop[339],
                        "PHONE_SEC" => $prop[340],
                        "PERIOD" => $_REQUEST["PROPERTY_VALUES"][341],
                        "SERVER_NAME" => $_SERVER['SERVER_NAME'],
                    ),
                )
            );
            if ($res2->getId()) {
                AddMessage2Log("Отправка сообщения на почту " . $res2->getId(), "my_module_id");
            } else {
                AddMessage2Log("Отправка сообщения на почту неудалась", "my_module_id");
            }
        }
    }
}

?>
