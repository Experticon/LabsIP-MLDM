<html>
<head>
    <title>Лабораторная работа 5</title>
    <script type="text/javascript" src="/scripts/scriptslab5.php"  ></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
</head>

<h1> Лабораторная работа №5 </h1>

<body>
<form>
    <table>
        <tr>
            <td> Введите матрицу смежности графа (n*n) </td>
            <td> <textarea id="mass" value="" rows = "10" cols = "20" size=""></textarea></td>
        </tr>
        <tr>
            <td colspan="2"> <input type="button" value="Сделать расчёт"  onclick="sendmass();"/></td>
        </tr>
    </table>

</form>
<script>
    function sendmass() {
        let text = document.querySelector('textarea').value;
        $.ajax({
            type: "POST",
            url: '/scripts/scriptslab5.php',
            data: ({
                'mass': text,
            }),
            success: function(data){
                document.getElementById("test").innerHTML = data;
            }
        })
    }

</script>
<div id ="test"></div>
</body>
</html>
