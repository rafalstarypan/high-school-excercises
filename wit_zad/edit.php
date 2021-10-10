<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edytuj użytkownika</title>
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
            <a href="add.php">Dodaj klienta</a> <br />
            <a href="#">Edytuj klienta</a> <br />
            <a href="delete.php">Usuń klienta</a> 
        </div>

        <div id="right">
    
            <form method="post" action=""> 
                <select name="ktory"> 
                <?php
                    $conn = new mysqli("localhost", "root", "", "klienci");
                    $conn->set_charset("utf8");
                    $sql = "SELECT id_klient, imie, nazwisko FROM klienci;";
                    $result = $conn->query($sql);
                    if (!$result) {
                        echo "Błąd systemu :(";
                    } else {
                        while ($wiersz = $result->fetch_assoc()) {
                            ?>
                            <option value="<?=$wiersz['id_klient']?>"><?= $wiersz['id_klient'] . " " . $wiersz['imie'] . " " . $wiersz['nazwisko'] ?> </option>
                        <?php
                        }
                    }
                    $conn->close();
                ?>

                </select> <br />

                <input type="text" name="imie" placeholder="Imie" /> <br />
                <input type="text" name="nazwisko" placeholder="Nazwisko" /> <br />
                <input type="text" name="telefon" placeholder="Telefon" /> <br />
                <input type="text" name="adres" placeholder="Adres" /> <br />
                <input type="submit" name="bang" value="Edytuj" />
            </form>

            <br /> <br /> <br />

            <?php
                if (isset($_POST['bang'])) {
                    $ok = true;
                    $id = $_POST['ktory'];
                    $imie = $_POST['imie'] ?? null;
                    $nazw = $_POST['nazwisko'] ?? null;
                    $tel = $_POST['telefon'] ?? null;
                    $adres = $_POST['adres'] ?? null;

                    //var_dump($_POST);

                    if ($imie && $nazw && $tel && $adres) {
                        $conn = new mysqli("localhost", "root", "", "klienci");
                        $conn->set_charset("utf8");
                        $sql = "UPDATE klienci SET imie='$imie', nazwisko='$nazw', telefon='$tel', adres='$adres' WHERE id_klient=$id;";
                        $result = $conn->query($sql);
                        if (!$result) {
                            echo "Nie udało się edytować klienta";
                        } else {
                            echo "Klient został zedytowany :)";
                        }
                    } else {
                        $ok = false;
                    }
                    if (!$ok) {
                        echo "Podaj wszystkie informacje!";
                    }
                    //var_dump($_POST);
                }


            ?>
        </div>

    </div>

    
</body>
</html>