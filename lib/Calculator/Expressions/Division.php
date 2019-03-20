<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:09
 */

namespace lib\Calculator\Expressions;

/**
 * Class Division
 * Реализует операцию деления
 * @package lib\Calculator\Expressions
 */
class Division extends NonTerminalExpression
{
    /**
     * Выполнение деления
     * @param $left - левый операнд
     * @param $right - правый операнд
     * @return mixed - результат деления операндов
     */
    function Execute($left, $right)
    {
        return $left / $right;
    }
}
