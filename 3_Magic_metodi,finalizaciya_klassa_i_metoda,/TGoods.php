<?php
// Трейт TGoods
trait TGoods
{
    public function save():string
    {
        return "Я метод трейта ".__FUNCTION__." и работаю одинаково в разных классах.";
    }
}