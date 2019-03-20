<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:04
 */

namespace lib\Calculator\Expressions;

/**
 * Class NonTerminalExpression
 * Класс для работы с нетерминальными выражениями
 * @package lib\Calculator\Expressions
 */
abstract class NonTerminalExpression implements IExpression
{
    /**
     * @var IExpression левый операнд
     */
    private $leftOp;

    /**
     * @var IExpression правый операнд
     */
    private $rightOp;

    /**
     * NonTerminalExpression constructor.
     * @param IExpression $left - левый операнд
     * @param IExpression $right - правый операнд
     */
    function __construct(IExpression $left, IExpression $right)
    {
        $this->leftOp = $left;
        $this->rightOp = $right;
    }

    /**
     * Интерпретация нетерминального выражения
     * @param $var - массив терминальных символов
     * @return mixed
     */
    function Interpret($var)
    {
        $left = $this->leftOp->Interpret($var);
        $right = $this->rightOp->Interpret($var);

        $res = $this->Execute($left, $right);

        return $res;
    }

    /**
     * Вычисление выражения. Реализуется непосредственно в классах операций
     * @param $left - левый операнд
     * @param $right - правый операнд
     * @return mixed - результат вычисления
     */
    abstract function Execute($left, $right);
}
