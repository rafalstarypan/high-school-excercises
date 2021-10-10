<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Główna</title>
    <link rel="stylesheet" href="styles.css" />
    <script>
        function work() {
            let text = document.querySelector("#text").value;
            let is = document.querySelector("#is").checked;
            let h = document.querySelector("#myH");

            if (is) {
                text = text.toUpperCase();
            } else {
                text = text.toLowerCase();
            }
            
            h.innerHTML = text;
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

                    <h1 id="myH"></h1>
                    <input type="text" id="text">
                    <input type="checkbox" id="is">
                    <button onclick="work()">Pisz</button>

            </div>
        </div>

        <div class="footer">
            soudfhb
        </div>
    </div>
</body>
</html>