<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа 2</title>
    <script type="text/javascript" src="/scripts/scriptslab2.js"></script>
</head>
<body>
<h1> Лабораторная работа №2 </h1>

<form>
    <table>
        <tr>
            <td> Введите бинарную матрицу n*n </td>
            <td> <textarea id="mass" value="" rows = "10" cols = "20" size=""></textarea></td>
        </tr>
        <tr>
            <td colspan="2"> <input type="button" value="Сделать расчёт"  onclick="rasschetmatrix();"/></td>
        </tr>
    </table>

</form>
<div id ="Matrix"></div>
<div id ="outResult"></div>

</body>
</html>

