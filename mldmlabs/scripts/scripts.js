
var mass_1, mass_2;
var error_text;
/**
 * Функция, убирающая повторения элементов в массивах.
 */
function countElement(mass, element)
{
    let count = 0;
    for (let i = 0; i < mass.length; i++)
    {
        if (mass[i] == element)
        {
            count++;
        }
    }
    return count;
}
/**
 * Функция определения правильности ввода
 */
function validate(str)
{
    let mass = false;
    if(str.length>0)
    {
        mass = str.split(" ");
        for (let i = 0; i < mass.length; i++)
        {
            if (mass[i] == "")
            {
                mass.splice(i, 1);
            }
        }
        for (let i = 0; i < mass.length; i++)
        {
            if (mass[i].length != 4)
            {
                error_text = 'Ошибка при вводе массива формата bbib: ' + str + ' в элементе ' + mass[i] + '. Недостаточно символов или стоит лишний пробел';
                mass = false;
                break;
            }
            else if (mass[i][0] < 'a' || mass[i][0] > 'z') {
                error_text = 'Ошибка при вводе массива формата bbib: ' + str + ' в элементе ' + mass[i] + '. Нужна буква';
                mass = false;
                break;
            }
            else if (mass[i][1] < 'a' || mass[i][1] > 'z') {
                error_text = 'Ошибка при вводе массива формата bbib: ' + str + ' в элементе ' + mass[i] + '. Нужна буква';
                mass = false;
                break;
            }
            else if (mass[i][2] % 2 != 0) {
                error_text = 'Ошибка при вводе массива формата bbib: ' + str + ' в элементе ' + mass[i] + '. Нужна чётная цифра';
                mass = false;
                break;
            }
            else if (mass[i][3] < 'a' || mass[i][3] > 'z')
                {
                    error_text = 'Ошибка при вводе массива формата bbib: ' + str + ' в элементе ' + mass[i] + '. Нужна буква';
                    mass = false;
                    break;
                }
        }
    }
    else
        error_text = "Массив не может быть пустым";

    return mass;
}
/**
 * Функция, определяющая объединение множеств (Все элементы обоих множеств)
 */
function unification ( n1, n2 ) {
    var massivUnif = [];
    for (let i = 0; i < n1.length; i++)
    {
            massivUnif += n1[i] + " ";
    }
    for (let i = 0; i < n2.length; i++) {
        if (n1.indexOf(n2[i]) == -1)
        {
                massivUnif += n2[i] + " ";
        }
    }
    return massivUnif;
}
/**
 * Функция, определяющая пересечение множеств
 * (выводит только те элементы, которые есть в обоих множествах)
 */
function intersection ( n1, n2 )
{
    var massivInter = [];
    for (let i = 0; i < n2.length; i++) {
        if (n1.indexOf(n2[i]) != -1)
        {
            massivInter += n2[i] + " ";
        }
    }
    return massivInter;
}
/**
 * Функция, определяющая дополнение множеств A/B (выводит только A часть)
 */
function additionA ( n1, n2 )
{
    var massivAdda = [];
    for (let i = 0; i < n1.length; i++) {
        if (n2.indexOf(n1[i]) == -1)
        {
            massivAdda += n1[i] + " ";
        }
    }
    return massivAdda;
}
/**
 * Функция, определяющая дополнение множеств B/A (выводит только B часть)
 */
function additionB ( n1, n2 )
{
    var massivAddb = [];
    for (let i = 0; i < n2.length; i++) {
        if (n1.indexOf(n2[i]) == -1)
        {
            massivAddb += n2[i] + " ";
        }
    }
    return massivAddb;
}
/**
 * Функция, определяющая симметрическую разность множеств
 * (выводит всё, кроме тех элементов, которые есть в обоих множествах
 */
function symmdiff( n1, n2 )
{
    var massivsymm = [];
    for (let i = 0; i < n1.length; i++) {
        if (n2.indexOf(n1[i]) == -1)
        {
            massivsymm += n1[i] + " ";
        }
    }
    for (let i = 0; i < n2.length; i++) {
        if (n1.indexOf(n2[i]) == -1)
        {
            massivsymm += n2[i] + " ";
        }
    }
    return massivsymm;
}
/**
 * Функция, преобразующая значение в массив без повторных элементов
 */
function needmass( n )
{
    var massiv = [];
    massiv = [].join.call(n,'');
    massiv = n.split(" ");
    for (let i = 0; i < massiv.length; i++)
    {
        if(countElement(massiv,massiv[i])>1)
        {
            massiv.splice(i,1);
        }
    }
    return massiv;
}
/**
 * Основная функция, которая выполняет все остальные функции по нажатию кнопки
 */
function rasschet()
{
    var a = document.getElementById('mass1');
    var b = document.getElementById('mass2');
    if(mass_1 = validate(a.value) == false)
    {
        alert(error_text);
    }
    if (mass_2 = validate(b.value) == false)
    {
        alert(error_text);
    }
    var mass1 = [];
    var mass2 = [];
    mass1 = needmass( a.value );
    mass2 = needmass( b.value );
    let full_result = "";
    if (mass_1 == false && mass_2 == false)
    {
        full_result = "Объединения массивов: " + unification ( mass1, mass2 ) + "\n";
        full_result += "Пересечение массивов: " + intersection ( mass1, mass2 ) + "\n";
        full_result += "Дополнение A/B: " + additionA ( mass1, mass2 ) + "\n";
        full_result += "Дополнение B/A: " + additionB ( mass1, mass2 ) + "\n";
        full_result += "Симметрическая разность: " + symmdiff ( mass1, mass2 ) + "\n";
        document.getElementById('outResult').innerText = "Результат выполнения операций:\n" + full_result;
    }
}