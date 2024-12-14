Подключение компонента:

$APPLICATION->IncludeComponent(
    "custom:multi.block.list",  // Название компонента
    ".default",                 // Шаблон компонента
    [
        "IBLOCK_TYPE" => "news",      // Тип инфоблока
        "IBLOCK_ID" => "1",           // ID инфоблока
        "FILTER" => ["ACTIVE" => "Y"] // Фильтр для элементов
    ],
    false
);
