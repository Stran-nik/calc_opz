<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:07
 */

namespace lib\Calculator\Expressions;

/**
 * Class Addition
 * Реализует операцию сложения
 * @package lib\Calculator\Expressions
 */
class Addition extends NonTerminalExpression
{
    /**
     * Выполнение сложения
     * @param $left - левый операнд
     * @param $right - правый операнд
     * @return mixed - результат сложения операндов
     */
    function Execute($left, $right)
    {
        return $left + $right;
    }
}
