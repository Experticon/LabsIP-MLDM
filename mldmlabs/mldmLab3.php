<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа 3</title>
    <script type="text/javascript" src="/scripts/Scriptslab3.js"></script>
</head>
<body>
<h1> Лабораторная работа №3 </h1>

<form>
    <table>
        <tr>
            <td> Множество A </td>
            <td> <input type="text" id="mass1" value="" size="50"/></td>
        </tr>
        <tr>
            <td> Множество B </td>
            <td> <input type="text" id="mass2" value="" size="50"/></td>
        </tr>
        <tr>
            <td> Пары элементов </td>
            <td> <input type="text" id="mass3" value="" size="50"/></td>
        </tr>
        <tr>
            <td colspan="2"> <input type="button" value="Сделать расчёт"  onclick="rasschetfunction();"/></td>
        </tr>
    </table>

</form>
<div id ="Matrix"></div>
<div id ="outResult"></div>

</body>
</html>
