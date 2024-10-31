<?php
//Пример работа с классом Goods и его наследником GadgetGoods

//Реализация функционала автозагрузки классов при обращении к ним (в нашем случае при создании $object_goods)
spl_autoload_register(function ($className) {
    require "$className.php";
});

$object_goods = new Goods("Товар №1"); //новый объект(экземпляр) класса Goods
echo $object_goods->name; //Выводим значение свойства name объекта $object_goods класса Goods
echo "<br>";
//echo $object_goods->weight; //Выводим значение свойства weight объекта $object_goods класса Goods и полуяаем ошибку т.к. свойство protected
echo $object_goods->weightPubl; //Выводим значение свойства weight объекта $object_goods класса Goods
echo "<br>";
echo $object_goods->getProduct(); //Выводим значение возвращаемое public(публичным) методом getProduct объекта $object_goods класса Goods
echo "<br>";
echo $object_goods->getConst(); //Выводим значение возвращаемое public(публичным) методом getConst объекта $object_goods класса Goods (В данном случае значение константы MYCONST)
echo "<br>";
echo Goods::MYCONST; //Выводим значение константы без объявления объекта(экземпляра) класса (инстансирования)

//Наследование

$object_gadgetGoods = new GadgetGoods("Товар №2"); //новый объект(экземпляр) класса Goods
echo $object_gadgetGoods->name; //Выводим значение свойства public(публичным) name объекта $object_gadgetGoods класса GadgetGoods
echo "<br>";
echo $object_gadgetGoods->type; //Выводим значение свойства public(публичным) type объекта $object_gadgetGoods класса GadgetGoods
echo "<br>";
echo "Мы видим что Экземпляр класса Goods создан и удален дважды потому что конструктор класса вызывается от наследуемого класса. Т.е. от класса Goods";
?>
