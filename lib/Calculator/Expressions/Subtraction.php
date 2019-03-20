<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:07
 */

namespace lib\Calculator\Expressions;

/**
 * Class Subtraction
 * Реализует операцию вычитания
 * @package lib\Calculator\Expressions
 */
class Subtraction extends NonTerminalExpression
{
    /**
     * Выполнение вычитания
     * @param $left - левый операнд
     * @param $right - правый операнд
     * @return mixed - результат вычитания операндов
     */
    function Execute($left, $right)
    {
        return $left - $right;
    }
}
