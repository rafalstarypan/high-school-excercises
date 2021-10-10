
var isBold = false;
var isItal = false;
var isUnder = false;
var isThrough = false;
var isDark = false;

function changeFont(which) {
    let newFont = which.value;
    let el = document.querySelector("textarea");
    el.style.fontFamily = newFont;
}

function changeBold() {
    isBold = !isBold;
    let el = document.querySelector("textarea");
    if (isBold) {
        el.style.fontWeight = "bold";
    } else {
        el.style.fontWeight = "normal";
    }
}

function changeItal() {
    isItal = !isItal;
    let el = document.querySelector("textarea");
    if (isItal) {
        el.style.fontStyle = "italic";
    } else {
        el.style.fontStyle = "normal";
    }
}

function changeUnder() {
    isUnder = !isUnder;
    let el = document.querySelector("textarea");
    if (isUnder) {
        el.style.textDecoration = "underline";
    } else {
        el.style.textDecoration = "none";
    }
}

function changeThrough() {
    isThrough = !isThrough;
    let el = document.querySelector("textarea");
    if (isThrough) {
        el.style.textDecoration = "line-through";
    } else {
        el.style.textDecoration = "none";
    }
}

function changeFontColor(field) {
    newColor = field.value;
    let el = document.querySelector("textarea");
    el.style.color = newColor;
}

function changeAlign(orient) {
    let el = document.querySelector("textarea");
    el.style.textAlign = orient;
}

function darkMode() {
    isDark = !isDark;
    let el = document.querySelector("textarea");
    if (isDark) {
        el.style.color = "white";
        el.style.backgroundColor = "black";
    } else {
        el.style.color = "black";
        el.style.backgroundColor = "white";
    }
}

