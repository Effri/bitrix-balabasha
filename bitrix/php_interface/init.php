<?
// файл /bitrix/php_interface/init.php
// регистрируем обработчик
//AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "OnAfterIBlockElementAddHandler"));

//class MyClass
//{
//
//    // создаем обработчик события "OnAfterIBlockElementAdd"
//    function OnAfterIBlockElementAddHandler(&$arFields)
//    {
//        if($arFields["IBLOCK_ID"]==21) {
//            $arEventFields= array(
//                "NAME" => $arFields["NAME"],
//                "PHONE" => $_REQUEST["PROPERTY"]["282"]["0"],
//                "ADRESS" => $_REQUEST["PROPERTY"]["323"]["0"],
//                "DATA" => $_REQUEST["PROPERTY"]["324"]["0"],
//                "FACILITIES" => $_REQUEST["PROPERTY"]["325"]["0"],
//                "BUKET" => $_REQUEST["PROPERTY"]["326"]["0"],
//                "NAME_SEC" => $_REQUEST["PROPERTY"]["327"]["0"],
//                "PHONE_SEC" => $_REQUEST["PROPERTY"]["328"]["0"],
//                "SERVER_NAME" => $_SERVER['SERVER_NAME'],
//            );
//            CEvent::Send("FORM_BOUQUETS", 's1', $arEventFields, "N", 21);
//        }
//    }
//}
//?>

<?//
//use Bitrix\Main\Mail\Event;
//// файл /bitrix/php_interface/init.php
//// регистрируем обработчик
//AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass", "OnAfterIBlockElementAddHandler"));
//
//class MyClass
//{
//
//    // создаем обработчик события "OnAfterIBlockElementAdd"
//    function OnAfterIBlockElementAddHandler(&$arFields)
//    {
//        if($arFields["IBLOCK_ID"]==35) {
//            var_dump($arFields); die;
//            $arEventFields= array(
//                "NAME" => $arFields["NAME"],
//                "PHONE" => $arFields["PROPERTY"][329][0],
//                "EMAIL" => $arFields["PROPERTY"][330][0],
//                "SERVER_NAME" => $_SERVER['SERVER_NAME'],
//            );
////            CEvent::Send("FORM_CORPORATIVE", 's1', $arEventFields);
//            $arEventFields = Event::send(
//                array(
//                    "EVENT_NAME" => "FORM_CORPORATIVE",
//                    "LID" => "s1",
//                    "C_FIELDS" => array(
//                        "VEBINAR_LIST" => $vebinarToday,
//                        "BODU_TEXT" => 'TEXT',
//                        "EMAIL_LIST" => $emailList,
//                    ),
//                )
//            );
//        }
//    }
//}
//?>

<?
use Bitrix\Main\Mail\Event;

define("LOG_FILENAME", "/log.txt");
define("ORDER_IBLOCK_ID","35");

AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyClass1", "OnAfterIBlockElementAddHandler"));

class MyClass1 {
    // создаем обработчик события "OnBeforeIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields) {
    AddMessage2Log(arFields, "TEST_EVENT");
        if($arFields["IBLOCK_ID"]==ORDER_IBLOCK_ID){
            $res2 = Event::send(
                array(
                    "EVENT_NAME" => "NEW_ORDER_FROM_SELL",
                    "LID" => "s1",
                    "C_FIELDS" => array(
                        "NAME" => $arFields["NAME"],
                        "PHONE" => $arFields["PROPERTY_VALUES"]['329'],
                        "EMAIL" => $arFields["PROPERTY_VALUES"]['330'],
                        "SERVER_NAME" => $_SERVER['SERVER_NAME'],
                    ),
                )
            );
            if($res2->getId()){
                AddMessage2Log("Отправка сообщения на почту ". $res2->getId(), "my_module_id");
            }
            else{
                AddMessage2Log("Отправка сообщения на почту неудалась", "my_module_id");
            }
        }
    }
}
?>
