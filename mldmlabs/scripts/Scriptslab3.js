
var error_text;
/**
 * Функция определения правильности ввода
 */
function validate(A, B, couples)
{
    for(elem of couples) {
        if(!(A.has(elem[0]) && B.has(elem[1])) || elem.length != 2) {
            error_text = "Пары элементов должны быть вида Ai, Bi ... )";
        }
    }
    if (A.size <= 1) {
        error_text = "Не менее 2 элементов в множестве A\n";
    }
    else if (B.size <= 1) {
        error_text = "Не менее 2 элементов в множестве B\n";
    }
    else if (couples.length <= 1) {
        error_text = "Не менее двух пар элементов";
    }
    if(error_text) {
        return false;
    }else {
        return true;
    }
}
/**
 * Функция, создающий двумерный массив
 */
function normalarr ( str )
{
    var mass = str.split(" ");
    for (let i = 0; i < mass.length; i++) {
        if (mass[i] == "") {
            mass.splice(i, 1);
        }
    }
    return mass;
}
/**
 * Основная функция, выполняющая заданную задачц
 */
function rasschetfunction()
{

    A = document.getElementById('mass1');
    B = document.getElementById('mass2');
    var couples = document.getElementById('mass3');
    A = normalarr(A.value);
    B = normalarr(B.value);
    const setA = new Set(A);
    const setB = new Set(B);
    couples = normalarr(couples.value);
    let full_result = "";
    if (validate(setA, setB, couples) == false) {
        alert(error_text);
    }
    else {
        var matrix = [];
        var flagA = true;
        var flagB = true;
        for (let i = 0; i < A.length; i++) {
            matrix[i] = [];
            for (let j = 0; j < B.length; j++) {
                matrix[i][j] = 0;
            }
        }
        var coarr = couples.slice();
        for (let i = 0; i < couples.length; i++) {
            for (let j = 0; j < couples.length; j++) {
                if (couples[i][0] == A[j]) {
                    couples[i] = 0;
                    couples[i] += j;
                    break;
                }
            }
            for (let j = 0; j < couples.length; j++) {
                if (coarr[i][1] == B[j]) {
                    couples[i] += '' + j;
                    break;
                }
            }
        }
        for (let i = 0; i < couples.length; i++) {
            matrix[couples[i][0]][couples[i][1]] = 1;
        }
        let outmatrix = "";
        for (let i = 0; i < A.length; i++) {
            for (let j = 0; j < B.length; j++) {
                outmatrix += matrix[i][j] + ' ';
            }
            outmatrix += '\n';
        }
        document.getElementById('Matrix').innerText = "Матрица отношения:\n" + outmatrix +
            "A - строки, B - столбцы";
        let countrow = 0;
        let countheight = 0;
        for (let i = 0; i < A.length; i++) {
            for (let j = 0; j < B.length; j++) {
                countrow += matrix[i][j];
            }
            if (countrow >= 2) {
                flagA = false;
                break;
            } else if (countrow == 0) {
                flagA = false;
                break;
            } else {
                countrow = 0;
            }
        }
        for (let i = 0; i < A.length; i++) {
            for (let j = 0; j < B.length; j++) {
                countheight += matrix[j][i];
            }
            if (countheight >= 2) {
                flagB = false;
                break;
            } else if (countheight == 0) {
                flagB = false;
                break;
            }
            else {
                countheight = 0;
            }
        }
        if (flagA) {
            full_result += "Отношение является функцией А в B\n";
        }else {
            full_result += "Отношение не является функцией А в B\n";
        }
        if (flagB) {
            full_result += "Отношение является функцией B в A";
        }else {
            full_result += "Отношение не является функцией B в A";
        }
        document.getElementById('outResult').innerText = "\n" + full_result;
    }
}