<?php
/**
 * Рекурсивная функция, которая проводит кратчайший путь
 */
function findShortWay($matrix, $start, $end, $minway)
{
    if($start == $end) {
        return [0, $minway];
    }

    $minway[$end] = -2;
    $size = count($matrix);

    $isFind = false;
    $min = 99999999;
    for($x = 0; $x < $size; $x++)
    {
        if($matrix[$x][$end] != '*') {
            if($minway[$x] != -2) {
                if ($minway[$x] == -1) {
                    $result = findShortWay($matrix, $start, $x, $minway);
                    $minway = $result[1];
                    $minway[$x] = $result[0];
                }
                $path = $matrix[$x][$end] + $minway[$x];

                if ($path < $min) $min = $path;
                {
                    $isFind = true;
                }
            }
        }
    }

    if($isFind) {
        $minway[$end] = $min;
        return [$min, $minway];
    } else {
        return [-1, $minway];
    }
}
/**
 * Функция, определяющая краткий путь
 */
function findShort($matrix, $start, $end)
{
    $size = count($matrix);
    $minway = array($size);
    for ($x = 0; $x < $size; $x++) {
        $minway[$x] = -1;
    }
    return findShortWay($matrix, $start, $end, $minway)[1];
}
/**
 * Функция определения траектории кратчайшего пути
 */
function findWay($matrix, $minway, $start, $end)
{
    $size = count($minway);

    $way = array($size);
    $sizeWay = 0;

    while($end != $start) {
        $min = 999999;
        $idMin = -1;
        for ($x = 0; $x < $size; $x++) {
            if ($matrix[$x][$end] != '*' && $minway[$x] >= 0) {
                $path = $matrix[$x][$end] + $minway[$x];
                if ($path < $min) {
                    $min = $path;
                    $idMin = $x;
                }
            }
        }

        $way[$sizeWay] = $end;
        $sizeWay++;

        $end = $idMin;
    }

    $way[$sizeWay] = $end;
    $sizeWay++;

    for($x = $sizeWay - 1; $x >= 0; $x--){
        echo $way[$x];
        if($x != 0)
            echo "⇢";
    }
}
/**
 * Функция определения правильности ввода
 */
function Validate ($matrix, $start, $end) {
    for($x = 0; $x < count($matrix); $x++){
        for($y = 0; $y < count($matrix)[$x]; $y++) {
            if ($matrix[$x][$y] != '*' && !is_numeric($matrix[$x][$y]) && !is_int($matrix[$x][$y])) {

                $error_text = "Не верный формат данных. Таблица должна состоять из звёздочек и натуральных чисел.";
                return $error_text;
            }
        }
    }
    for($x = 0; $x < count($matrix); $x++) {
        if (count($matrix) != count($matrix[$x])) {
            $error_text = "Матрица должна быть квадратной.";
            return $error_text;
        }
    }
    if (!is_numeric($start) || !is_numeric($end)) {
        $error_text = "Неверный ввод начальной и конечной точки";
        return $error_text;
    }
}
$error_text = "";
$message = $_POST['mass'];
$start = $_POST['begin'];
$end = $_POST['end'];

$matrix = preg_split('/[\n]/', $message);
$size = count($matrix);

for ($x = 0; $x < $size; $x++) {
    $matrix[$x] = explode(' ', $matrix[$x]);
}
$error_text = Validate($matrix, $start, $end);
if($error_text == "") {

        $minway = findShort($matrix, $start, $end);
        $countBreak = 0;
        for ($x = 0; $x < $size; $x++) {
            if ($minway[$x] > 0) {
                $countBreak++;
            }
        }
        if ($countBreak > 0) {
            echo $minway[$end];
            echo "<br>";
            findWay($matrix, $minway, $start, $end);
        } else {
            echo "Невозможно найти путь.";
        }
} else {
    echo $error_text;
}
?>
