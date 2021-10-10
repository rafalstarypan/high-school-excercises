<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dodaj użytkownika</title>
    <style>
        #container {
            width: 1000px;
            display: flex;
        }
        #left {
            flex: 2;
        }
        #right {
            flex: 5;
        }
    </style>
</head>

<body>

    <div id="container">

        <div id="left">
            <a href="index.php">Pokaż klientów</a> <br />
            <a href="#">Dodaj klienta</a> <br />
            <a href="edit.php">Edytuj klienta</a> <br />
            <a href="delete.php">Usuń klienta</a> 
        </div>

        <div id="right">
    
            <form method="post" action=""> 
                <input type="text" name="imie" placeholder="Imie" /> <br />
                <input type="text" name="nazwisko" placeholder="Nazwisko" /> <br />
                <input type="text" name="telefon" placeholder="Telefon" /> <br />
                <input type="text" name="adres" placeholder="Adres" /> <br />
                <input type="submit" name="bang" value="Dodaj" />
            </form>

            <br /> <br /> <br />

            <?php
                if (isset($_POST['bang'])) {
                    $ok = true;
                    $imie = $_POST['imie'] ?? null;
                    $nazw = $_POST['nazwisko'] ?? null;
                    $tel = $_POST['telefon'] ?? null;
                    $adres = $_POST['adres'] ?? null;

                    //var_dump($_POST);

                    if ($imie && $nazw && $tel && $adres) {
                        $conn = new mysqli("localhost", "root", "", "klienci");
                        $conn->set_charset("utf8");
                        $sql = "INSERT INTO `klienci` VALUES(null, '$imie', '$nazw', '$tel', '$adres');";
                        $result = $conn->query($sql);
                        if (!$result) {
                            echo "Nie udało się dodać klienta do bazy";
                        } else {
                            echo "Klient został dodany :)";
                        }
                    } else {
                        $ok = false;
                    }
                    if (!$ok) {
                        echo "Podaj wszytskie informacje!";
                    }
                    //var_dump($_POST);
                }


            ?>
        </div>

    </div>

    
</body>
</html>