<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 20.03.2019
 * Time: 19:12
 */

namespace lib\Calculator;

use \lib\Calculator\Expressions\IExpression;
use \lib\Calculator\Expressions\TerminalExpression;
use \lib\Calculator\Expressions\NonTerminalExpression;
use \lib\Calculator\Expressions\Addition;
use \lib\Calculator\Expressions\Subtraction;
use \lib\Calculator\Expressions\Multiplication;
use \lib\Calculator\Expressions\Division;
use \Exception;

/**
 * Class Calculator
 * Предназначен для вычисления выражений в ОПЗ.
 * @package lib\Calculator
 */
class Calculator
{
    /**
     * @var $tree - набор символов формулы
     */
    private $tree;

    /**
     * @var $tokens - массив символов выражения
     */
    private $tokens;

    /**
     * @var $context - контекст выражения
     */
    private $context;

    /**
     * Метод выполняет вычисление выражения в ОПЗ
     * @param string $expression - строка с выражением
     * @return string - результат вычисления
     * @throws Exception - в случае ошибок бросает исключение
     */
    function evaluate(string $expression): string
    {
        $stack = [];

        // Разбираем выражение на элементы
        $this->tokens = explode(' ', $expression);

        // Формируем набор символов формулы
        foreach ($this->tokens as $token) {
            // Проверяем очередной символ на терминальный(число)/нетерминальный(операция)
            if (is_numeric($token)) {
                array_push($stack, new TerminalExpression($token));
            } else {
                if (count($stack) < 2) {
                    throw new Exception("Недостаточно данных в стеке для операции '$token'");
                }

                // Получаем объект нетерминальной операции в зависимости от символа операции
                $nonTermExpr = $this->getNonTerminalExpression($token, array_pop($stack), array_pop($stack));
                array_push($stack, $nonTermExpr);
            }
        }

        if (count($stack) > 1){
            throw new Exception("Количество операторов не соответствует количеству операндов");
        }

        // Добавляем символ формулы в набор
        $this->tree = array_pop($stack);

        // Заполняем контекст формулы
        $this->createContext();

        // Вычисляем выражение
        return $this->tree->Interpret($this->context);
    }

    /**
     * Метод заполняет контекст выражения
     */
    private function createContext()
    {
        $this->context = [];

        foreach ($this->tokens as $token) {
            if ((!in_array($token, array('*', '/', '+', '-'))) && is_numeric($token)) {
                $this->context[$token] = $token;
            }
        }
    }

    /**
     * Выбор нетерминального выражения в зависимости от обозначения операции
     * @param string $operation - обозначение операции
     * @param IExpression $left - левый операнд
     * @param IExpression $right - правый операнд
     * @return NonTerminalExpression - объект нетерминального выражения
     * @throws Exception - в случае ошибок бросает исключение
     */
    private function getNonTerminalExpression(string $operation, IExpression $left, IExpression $right): NonTerminalExpression
    {
        switch ($operation) {
            case '+' : return new Addition($left, $right);
            case '-' : return new Subtraction($left, $right);
            case '*' : return new Multiplication($left, $right);
            case '/' : return new Division($left, $right);
            default: throw new Exception("Неизвестная операция: $operation");
        }
    }
}
