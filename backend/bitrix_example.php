<?php
//Пример работы с ORM (старое ядро)

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Iblock\ElementTable;

$res = ElementTable::getList([
    "select" => ["ID", "NAME"],
    "filter" => ["IBLOCK_ID" => 1], // Замените на ID вашего инфоблока
]);

while ($item = $res->fetch()) {
    // Обработка данных
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");


//Пример работы с ORM (новое ядро)

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Main\Entity;

$query = new Entity\Query(ElementTable::getEntity());
$query->setSelect(["ID", "NAME"])
    ->setFilter(["IBLOCK_ID" => 1]); // Замените на ID вашего инфоблока

$res = $query->exec();

while ($item = $res->fetch()) {
    // Обработка данных
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
