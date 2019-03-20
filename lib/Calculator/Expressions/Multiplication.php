<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:08
 */

namespace lib\Calculator\Expressions;

/**
 * Class Multiplication
 * Реализует операцию умножения
 * @package lib\Calculator\Expressions
 */

class Multiplication extends NonTerminalExpression
{
    /**
     * Выполнение умножения
     * @param $left - левый операнд
     * @param $right - правый операнд
     * @return mixed - результат умножения операндов
     */
    function Execute($left, $right)
    {
        return $left * $right;
    }
}
