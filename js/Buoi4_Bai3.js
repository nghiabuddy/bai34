var IMAGE_PATHS = [];
IMAGE_PATHS[0] = "img/hp.jpg";
IMAGE_PATHS[1] = "img/dell.jpg";
IMAGE_PATHS[2] = "img/acer.jpg";
IMAGE_PATHS[3] = "img/asus.jpg";
var link = [];
link[0] = "http://www.hp.com";
link[1] = "https://www.dell.com/";
link[2] = "https://www.acer.com/ac/vi/VN/content/home";
link[3] = "https://www.asus.com/vn/";
var select = 0;

function selectStt() {
    document.getElementById("laptopImg").src = IMAGE_PATHS[select];
    document.getElementById("link").href = link[select];
    if (select == 3) {
        select = 0;
    } else {
        select++;
    }
}
var run;

function quangcao() {
    run = setInterval("selectStt()", 2000);
}

function pauseTimer() {
    clearInterval(run);
}

function activateTimer() {
    run = setInterval("selectStt()", 2000);
}