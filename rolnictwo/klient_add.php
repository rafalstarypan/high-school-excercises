<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Skup rolny</title>
</head>
<body>
    
    <div class="container">
        <div class="nav">
            <ol>
                <li><a href="index.php">Pokaż klientów</a></li>
                <li><a href="zboza.php">Pokaż zboża</a></li>
                <li><a href="operacje.php">Pokaż operacje</a></li>
                <li><a href="klient_add.php">Dodaj klienta</a></li>
                <li><a href="zboze_add.php">Dodaj zboże</a></li>
                <li><a href="operacje_add.php">Dodaj operacje</a></li>
                <li><a href="klient_mod.php">Edytuj klienta</a></li>
                <li><a href="zboze_mod.php">Edytuj zboże</a></li>
                <li><a href="operacje_mod.php">Edytuj operacje</a></li>
                <li><a href="klient_del.php">Usuń klienta</a></li>
                <li><a href="zboze_del.php">Usuń zboże</a></li>
                <li><a href="operacje_del.php">Usuń operacje</a></li>
            </ol>
        </div>

        <div class="content">
            <form action="#" method="post">
                <input type="text" placeholder="Imie" name="imie"/> <br />
                <input type="text" placeholder="Nazwisko" name="nazwisko"/> <br />
                <input type="text" placeholder="Adres" name="adres_zam"/> <br />
                Indywidualny: <input type="checkbox" name="indywidualny"/> <br />
                <input type="submit" value="Dodaj" name="bang" /> <br />
            </form>

            <?php
                $conn = new mysqli('localhost', 'root', '', 'skup_rolny');
                $conn->set_charset('utf8');

                if (isset($_POST['bang'])) {
                    $imie = $_POST['imie'] ?? null;
                    $nazw = $_POST['nazwisko'] ?? null;
                    $adres = $_POST['adres_zam'] ?? null;
                    $indywidualny = $_POST['indywidualny'] ?? null;
                    //var_dump($indywidualny);
                    if ($imie && $nazw && $adres) {
                        $xd = "false";
                        if ($indywidualny == "on") $xd = "true";
                        $sql = "INSERT INTO `klient`(`id_klient`, `imie`, `nazwisko`, `adres_zam`, `indywidualny`) VALUES (NULL, '$imie', '$nazw', '$adres', $xd);";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy danych :(');
                        }
                    } else {
                        echo "Podaj wszystkie dane!";
                    }
                    $conn->close();
                    unset($_POST);
                    header('Location: klient_add.php');
                }

                $conn->close();

            ?>
        </div>

    </div>
    
    
</body>
</html>