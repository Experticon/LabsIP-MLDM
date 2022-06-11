let number = 1;
const countImage = 3;
const path = "/ImageGal/"

let widthImage = 1920/4;
let heightImage = 1080/3;
let countX = 10;
let countY = 10;

let timeChangeMin = 500;
let timeChangeMax = 500;

function generateImage()
{
    $("#mainIm").css("width", widthImage);
    $("#mainIm").css("height", heightImage);

    let widthElement = widthImage / countX;
    let heightElement = heightImage / countY;

    for(let y = 0; y < countY; y++)
        for(let x = 0; x < countX; x++)
        {
            let item = $("<div></div>");
            item.addClass("imageElement");
            item.css("width", widthElement + "px");
            item.css("height", heightElement + "px");
            item.css("background-image", "url('" + path + "0" + number + ".jpg')");
            item.css("background-size", widthImage + "px" + " " + heightImage + "px");
            item.css("background-position-x", widthImage - x * widthElement + "px");
            item.css("background-position-y", heightImage - y * heightElement + "px");
            $("#mainIm").append(item);
        }
}
function ChangeIm() {
    let timer = timeChangeMin;
    $("#mainIm div").each(function() {
        $(this).slideUp(timer, function () {
            $(this).css("background-image", "url('" + path + "0" + number + ".jpg')");
            $(this).slideDown(timer);
        });
        timer += (timeChangeMax - timeChangeMin) / (countX * countY);
    });
    //document.getElementById("mainIm").src = path + "0" + number + ".jpg";
}
function leftImage() {
    if (number > 1) {
        number--;
    }
    else {
        number = countImage;
    }
    ChangeIm();
}
function rightImage() {
    if (number < countImage) {
        number++;
    }
    else {
        number = 1;
    }
    ChangeIm();
}
$(document).ready(function (){
    generateImage();
});