<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); ?>
<?php

CModule::IncludeModule("iblock");
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>21, "ID" => 325));
while ($prop_fields = $properties->GetNext()) {
echo '<pre>',var_dump($prop_fields),'</pre>';
if ($prop_fields['PROPERTY_TYPE'] == 'L') {
    $db_enum_list = CIBlockProperty::GetPropertyEnum($prop_fields['CODE'], Array(), Array("ID"=>98));
    if($ar_enum_list = $db_enum_list->GetNext())
    {
        echo '<pre>',var_dump($ar_enum_list),'</pre>';
    }
}
}