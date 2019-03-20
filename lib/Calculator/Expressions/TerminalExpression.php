<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:02
 */

namespace lib\Calculator\Expressions;

/**
 * Class TerminalExpression
 * Класс для работы с терминальными выражениями
 * @package lib\Calculator\Expressions
 */
class TerminalExpression implements IExpression
{
    /**
     * @var ключ для выбора из массива терминальных выражений
     */
    private $key;

    /**
     * TerminalExpression constructor.
     * @param $key - ключ для выбора из массива терминальных выражений
     */
    function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * Выбор терминального выражения
     * @param $vars - массив терминальных выражений
     * @return mixed - терминальное выражение
     */
    function Interpret($vars)
    {
        return $vars[$this->key];
    }
}
