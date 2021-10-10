<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Główna</title>
    <link rel="stylesheet" href="styles.css" />
    <script>
        function work(what) {
            let a = document.querySelector("#a").value;
            let b = document.querySelector("#b").value;
            a = Number(a);
            b = Number(b);
            let p = document.querySelector("#myH");

            if (isNaN(a) || isNaN(b)) {
                p.innerHTML = "Musisz podać liczby";
            } else {
                
                if (what == '+') {
                    p.innerHTML = a + b;
                }
                if (what == '-') {
                    p.innerHTML = a - b;
                }
                if (what == '*') {
                    p.innerHTML = a * b;
                }
                if (what == '/') {
                    p.innerHTML = a / b;
                }
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="baner">
            <a href="index.php"><img src="baner.png" /></a>
        </div>

        <div class="wrapper">
            <div class="nav">
                <ul>
                    <li><a href="1.php">1</a></li>
                    <li><a href="2.php">2</a></li>
                    <li><a href="3.php">3</a></li>
                    <li><a href="4.php">4</a></li>
                    <li><a href="5.php">5</a></li>
                    <li><a href="6.php">6</a></li>
                    <li><a href="7.php">7</a></li>
                    <li><a href="8.php">8</a></li>
                    <li><a href="9.php">9</a></li>
                    <li><a href="10.php">10</a></li>
                </ul>
            </div>
            <div class="content">

                    <input type="number" id="a">
                    <input type="number" id="b">
                    <button onclick="work('+')">+</button>
                    <button onclick="work('-')">-</button>
                    <button onclick="work('*')">*</button>
                    <button onclick="work('/')">/</button>
                    <h1 id="myH"></h1>

            </div>
        </div>

        <div class="footer">
            soudfhb
        </div>
    </div>
</body>
</html>