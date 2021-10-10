
function zad1() {
    let x = document.querySelector("#in1").value;
    let y = document.querySelector("#in2").value;
    console.log(x);
    console.log(y);
    x = Number(x);
    y = Number(y);
    let p = document.querySelector("#ans1");
    if (!isNaN(x) && !isNaN(y)) {
        p.innerHTML = x+y;
    } else {
        p.innerHTML = "Podano zle dane";
    }
}

function zad2() {
    let newColor = prompt("Podaj nowy kolor: ");
    if (newColor != null) {
        let el = document.querySelector("body");
        el.style.backgroundColor = newColor;
    }
}

function zad3() {
    let area = document.querySelector("textarea");
    let p = document.querySelector("#ans2");
    let text = area.value;  // hello
    let cnt = document.querySelector("#in3").value;
    let copied = "";  
    for (let i = 0; i < cnt; i++) {
        copied += text;
    }
    console.log(copied);
    p.innerHTML = copied;
}

function zad4() {
    let x = document.querySelector("#in4").value;
    let y = document.querySelector("#in5").value;
    if (x > y) {
        alert(x + " > " + y);
    } else if (x == y) {
        alert(x + " = " + y);
    } else {
        alert(x + " < " + y);
    }
}

function zad5(inp) {
    let newColor = inp.value;
    let ps = document.getElementsByName("js");
    console.log(ps);

    for (let i = 0; i < ps.length; i++) {
        let cur = ps[i];
        cur.style.color = newColor;
    }


}

