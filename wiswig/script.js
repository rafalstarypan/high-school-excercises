var isBold = false;
var isItalic = false;
var isUnder = false;
var isThrough = false;
var curFontSize = 12;
var curFontFamily = 'Times New Roman';
var curAlign = 'left';

function switchBold() {
    let textArea = document.querySelector('textarea[name=myText]');
    isBold ^= 1;
    if (isBold) {
        textArea.style.fontWeight = 'bold';
    } else {
        textArea.style.fontWeight = 'normal';
    }
}

function switchItalic() {
    let textArea = document.querySelector('textarea[name=myText]');
    isItalic ^= 1;
    if (isItalic) {
        textArea.style.fontStyle = 'italic';
    } else {
        textArea.style.fontStyle = 'normal';
    }
}

function switchUnder() {
    let textArea = document.querySelector('textarea[name=myText]');
    isUnder ^= 1;
    if (isUnder) {
        textArea.style.textDecoration = 'underline';
    } else {
        textArea.style.textDecoration = 'none';
    }
}

function switchThrough() {
    let textArea = document.querySelector('textarea[name=myText]');
    isThrough ^= 1;
    if (isThrough) {
        textArea.style.textDecoration = 'line-through';
    } else {
        textArea.style.textDecoration = 'none';
    }
}

function setFontSize() {
    let textArea = document.querySelector('textarea[name=myText]');
    let sel = document.querySelector('select[name=fontSize]');
    curFontSize = sel.value;
    console.log(curFontSize);
    console.log(textArea.style);
    textArea.style.fontSize = curFontSize + 'px';
}

function incrementFont() {
    if (curFontSize < 20) curFontSize += 2;
    let textArea = document.querySelector('textarea[name=myText]');
    textArea.style.fontSize = curFontSize + 'px';
}

function decrementFont() {
    if (curFontSize > 8) curFontSize -= 2;
    let textArea = document.querySelector('textarea[name=myText]');
    textArea.style.fontSize = curFontSize + 'px';
}

function setColor() {
    let textArea = document.querySelector('textarea[name=myText]');
    let input = document.querySelector('input[name=color]');
    let newColor = input.value;
    console.log(newColor);

    textArea.style.color = newColor;
}

function setFontFamily() {
    let textArea = document.querySelector('textarea[name=myText]');
    let sel = document.querySelector('select[name=fontFamily]');
    textArea.style.fontFamily = sel.value;
    curFontFamily = sel.value;
}

function setAlign() {
    let textArea = document.querySelector('textarea[name=myText]');
    let sel = document.querySelector('select[name=align]');
    textArea.style.textAlign = sel.value;
    curAlign = sel.value;
}