<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:00
 */

namespace lib\Calculator\Expressions;

/**
 * Interface IExpression
 * Интерфейс выражений для паттерна Интерпретатор
 * @package lib\Calculator\Expressions
 */
interface IExpression
{
    function Interpret($vars);
}
