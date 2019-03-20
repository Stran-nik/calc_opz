<?php
/**
 * Created by PhpStorm.
 * User: petr
 * Date: 13.03.19
 * Time: 19:44
 */

header('Content-type: application/json');

use lib\Calculator\Calculator;

spl_autoload_register(function ($className){
    require_once str_replace("\\", "/", $className.'.php');
});

// Разбираем входные данные
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON);

$expression = trim($input->str);

// Вычисляем выражение
try {
    $res = (new Calculator())->evaluate($expression);
    echo json_encode(['result' => $res]);
} catch (Throwable $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
