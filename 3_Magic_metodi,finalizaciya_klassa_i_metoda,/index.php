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
echo "<p>Мы видим что Экземпляр класса Goods создан и удален дважды потому что конструктор класса вызывается от наследуемого класса. Т.е. от класса Goods</p>";

//Статическое свойство класса
$count_class = Goods::$counter_insens; //получение свойства через класс напрямую. Без использования объекта данного класса
echo "У класса Goods $count_class объекта(ов)! Обращение напрямую к классу.", "<br>";

$count_class_1 = $object_goods::$counter_insens;
echo "У класса Goods $count_class_1 объекта(ов)! Обращение через объект класса.", "<br>";

//Абстрактный класс
// Добавлен абстрактный класс AGoods и от него унаследован класс Goods. Если в абстрактном классе метод помечен как abstract, то
// необходима реализовать данный метод у наследника. Это нужно для контроля выполнения заложенного функционала

// Интерфейсы
// Добавлен интерфейс IGoods и имплементировали в классе Goods. Теперь все методы, описанные в этом интерфейсе необходимо реализовать
// в классе Goods. Принцип работы такой же как и с abstract методами в абстрактом классе

// Трейт
// Реализован трейт TGoods. Теперь в классе, через ключевое слово use мы можем работать с методами этого трейта
echo "<p>".$object_goods->save()." из объекта класса Goods</p>"; // Выводим данные возвращаемые методом save трейта TGoods;
echo "<p>".$object_gadgetGoods->save()." из объекта класса GadgetGoods</p>"; // Выводим данные возвращаемые методом save трейта TGoods;

//Расширение класса через наследование
echo $object_gadgetGoods->getProduct(); //Выводим значение возвращаемое public(публичным) методом getProduct объекта $object_gadgetGoods класса GadgetGoods который был перегружен
echo "<br>";

//Попытка получить несуществующее свойство.
echo $object_gadgetGoods->nullVar; //Метод __get() из класса Goods вызовется если будет попытка получить данные несуществующего свойства
echo "<br>";

//Попытка установить несуществующее свойство.
echo $object_gadgetGoods->nullVar = "123"; //Метод __set() из класса Goods вызовется если будет попытка получить данные несуществующего свойства
echo "<br>";

//Попытка вызвать несуществующий метод.
echo $object_gadgetGoods->nullVar(); //Метод __call() из класса Goods вызовется если будет попытка вызвать несуществующий метод
echo "<br>";

//Распечатать объект
echo $object_gadgetGoods; //При попытке распечатать объект вызывается метод __toString и возвращается его результат

//Клонирование объекта
$object_clone = clone $object_gadgetGoods; //Обязательно использовать ключевое слово clone. !!! При использовании clone не происходит вызова конструктора в новом объекте
//$object_clone = $object_gadgetGoods;  // В таком случае получим ссылку на одно и то же место в памяти вместо копии

//финализация классов и методов
// используем ключевое слова final перед класом или методом
?>
