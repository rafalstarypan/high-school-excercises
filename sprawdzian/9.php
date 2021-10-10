<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Główna</title>
    <link rel="stylesheet" href="styles.css" />
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

                <form action="#" method="get">
                    <input type="number" name="a">
                    <input type="number" name="b">
                    <input type="submit" name="+" value="+">
                    <input type="submit" name="-" value="-">
                    <input type="submit" name="*" value="*">
                    <input type="submit" name="/" value="/">
                </form>

                <h1 id="myH">
                    <?php
                        if (isset($_GET['+'])) {
                            $a = $_GET['a'] ?? null;
                            $b = $_GET['b'] ?? null;
                            if ($a && $b && is_numeric($a) && is_numeric($b)) {
                                echo $a + $b;
                            } else {
                                echo "Podano nieprawidłowe dane ):";
                            }
                        }

                        if (isset($_GET['-'])) {
                            $a = $_GET['a'] ?? null;
                            $b = $_GET['b'] ?? null;
                            if ($a && $b && is_numeric($a) && is_numeric($b)) {
                                echo $a - $b;
                            } else {
                                echo "Podano nieprawidłowe dane ):";
                            }
                        }

                        if (isset($_GET['*'])) {
                            $a = $_GET['a'] ?? null;
                            $b = $_GET['b'] ?? null;
                            if ($a && $b && is_numeric($a) && is_numeric($b)) {
                                echo $a + $b;
                            } else {
                                echo "Podano nieprawidłowe dane ):";
                            }
                        }

                        if (isset($_GET['/'])) {
                            $a = $_GET['a'] ?? null;
                            $b = $_GET['b'] ?? null;
                            if ($a && $b && is_numeric($a) && is_numeric($b)) {
                                echo $a / $b;
                            } else {
                                echo "Podano nieprawidłowe dane ):";
                            }
                        }
                    ?>
                </h1>

            </div>
        </div>

        <div class="footer">
            soudfhb
        </div>
    </div>
</body>
</html>