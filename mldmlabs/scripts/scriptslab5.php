<?php
function Validate ($matrix) {
    for($x = 0; $x < count($matrix); $x++) {
        if (count($matrix) != count($matrix[$x])) {
            $error_text = "Матрица должна быть квадратной.";
            return $error_text;
        }
    }
    for($x = 0; $x < count($matrix); $x++){
        for($y = 0; $y < count($matrix); $y++) {
            if (!is_numeric($matrix[$x][$y]) && !is_int($matrix[$x][$y])) {

                $error_text = "Неверный формат данных. Таблица должна состоять из нулей и натуральных чисел.";
                return $error_text;
            }
        }
    }
}
$error_text = "";
$message = $_POST['mass'];

$matrix = preg_split('/[\n]/', $message);
$size = count($matrix);

for ($x = 0; $x < $size; $x++) {
    $matrix[$x] = explode(' ', $matrix[$x]);
}

$error_text = Validate($matrix);
if($error_text == "") {
    for ($k = 0; $k < $size; $k++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $matrix[$i][$j] = ($matrix[$i][$j] || ($matrix[$k][$j] && $matrix[$i][$k]));
            }

        }
    }
    echo "Матрица достижимости: <br>";
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $j++) {
            if ($matrix[$i][$j] == false) {
                echo  0, " ";
            }
        echo  $matrix[$i][$j], " ";
        }
        echo "<br>";
    }
} else {
    echo $error_text;
}
?>
