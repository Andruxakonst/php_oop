<?php
class Goods //Класс Goods
{
    //Свойства  - переменные класса или константы
    const MYCONST = "константа"; // Константу нельзя изменить в последствии
    public $name = "Товар1"; // public (Публичное - Доступен всегда) модификатор доступа, $name - имя свойства, Товар1 - значение присвоенное свойству $name
    protected $weight = 100; // protected (Защищенное - Доступен только у объектов наследников) модификатор доступа, $weight - имя свойства, 100 - значение присвоенное свойству $name
    public $weightPubl = 100; // public (Публичное - Доступен всегда) модификатор доступа, $weightPubl - имя свойства, 100 - значение присвоенное свойству $name

    //Методы    - функции класса
    public function getProduct():string //public (Публичное - Доступен всегда) модификатор доступа, getProduct имя метода, :string - возвращает значение типа string
    {
        return "Я товар:".$this->name.". Весом: ".$this->weightPubl; //возвращаем строку со значениями как public так и protected !!!$this - переменная означающаяся ЭТОТ объект(экземпляр) класса
    }

    public function getConst()
    {
        return self::MYCONST; // для получения данных константы используется ключевое слово self и ::
    }
}
$object_goods = new Goods(); //новый объект(экземпляр) класса Goods
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
?>
