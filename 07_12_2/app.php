<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projekt bankomatu dla B.G.R.</title>
    <link rel="stylesheet" href="styl_bankomat.css">

    <script>
        function validate(form) {
            let type = form.radio1.value;
            //console.log(type);
            if (!type) {
                alert('Zaznacz typ operacji');
                return false;
            }

            let money = form.money.value;
            if (money == '') {
                alert('Podaj kwotę');
                return false;
            }
            money = Number(money);
            if (isNaN(money)) {
                alert('Podana kwota musi być liczbą');
                return false;
            }

            return true;
        }
    </script>

</head>
<body>

    <div class="container">

        <div class="baner">
            <h1>Bank Gospodarstwa Rakowego - ATM</h1>
        </div>

        <div class="wrapper">
            <div class="left">
                <img src="import_maly.jpg" alt="">
            </div>

            <div class="middle">
                <h2>Wybierz działanie:</h2>
                <form action="#" method="post" onsubmit="return validate(this)">
                    <input type="radio" name="radio1" value="1"> wypłata -> <br />
                    <input type="radio" name="radio1" value="2"> wpłata <- <br />
                    <input type="number" name="money"> <br />
                    <p>Wybierz walutę</p>
                    <select name="currency">
                        <option value="1">PLN</option>
                        <option value="2">DOLAR</option>
                        <option value="3">RUBEL</option>
                    </select> <br />
                    <input type="submit" name="bang" value="ZATWIERDŹ">
                </form>

                <?php
                    if (isset($_POST['bang'])) {
                        $type = $_POST['radio1'];
                        $money = $_POST['money'];
                        $currency = $_POST['currency'];
                        $conn = new mysqli('localhost', 'root', '', 'bank');
                        $conn->set_charset('utf8');
                        
                        $sql = "SELECT kwota FROM bankomat WHERE id = $currency;";
                        $prvMoney = $conn->query($sql)->fetch_assoc()['kwota'];

                        if ($type == '1') {
                            if ($money > $prvMoney) {
                                echo "BRAK ŚRODKÓW DO REALIZACJI";
                            } else {
                                $prvMoney -= $money;
                                $sql = "UPDATE bankomat SET kwota = $prvMoney WHERE id = $currency;";
                                $result = $conn->query($sql);
                                if (!$result) {
                                    echo "BŁĄD :(";
                                } else {
                                    echo "ODBIERZ PIENIĄDZE";
                                }
                            }
                        } else {
                            $prvMoney += $money;
                            $sql = "UPDATE bankomat SET kwota = $prvMoney WHERE id = $currency;";
                            $result = $conn->query($sql);
                            if (!$result) {
                                echo "BŁĄD :(";
                            } else {
                                echo "DODANO ŚRODKI";
                            }
                        }

                        $conn->close();
                    }
                ?>

            </div>

            <div class="right">
                <h2>Stan bankomatu:</h2>
                <?php
                    $conn = new mysqli('localhost', 'root', '', 'bank');
                    $conn->set_charset('utf8');
                    $sql = "SELECT * FROM bankomat;";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<h3>" . $row['waluta'] . " " . $row['kwota'] . "</h3>";
                    }
                    $conn->close();
                ?>

            </div>
        </div>

        <div class="footer">
            Wszelkie prawa zastrzeżone - PESEL
        </div>

    </div>

</body>
</html>