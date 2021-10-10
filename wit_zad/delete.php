<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Usuń użytkowników</title>
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
            <a href="edit.php">Edytuj klienta</a> <br />
            <a href="#">Usuń klienta</a> 
        </div>

        <div id="right">
    
            <form method="post" action=""> 
                <?php
                    $conn = new mysqli("localhost", "root", "", "klienci");
                    $conn->set_charset("utf8");
                    $idKlienci = [];
                    $sql = "SELECT id_klient, imie, nazwisko FROM klienci;";
                    $result = $conn->query($sql);
                    if (!$result) {
                        echo "Błąd systemu :(";
                    } else {
                        while ($wiersz = $result->fetch_assoc()) {
                            $idKlienci[] = $wiersz['id_klient'];
                            ?>
                            <input type="checkbox" name="<?=$wiersz['id_klient']?>" /> <?=$wiersz['id_klient'] . " " . $wiersz['imie'] . " " . $wiersz['nazwisko'] ?> <br />
                        <?php
                        }
                        $conn->close();
                    } 
                    ?>

                <input type="submit" name="bang" value="Usuń" />
            </form>

            <br /> <br /> <br />

            <?php
                if (isset($_POST['bang'])) {
                    $conn = new mysqli("localhost", "root", "", "klienci");
                    $conn->set_charset("utf8");

                    foreach ($idKlienci as $id) {
                        if ($_POST[$id] == "on") {
                            $sql = "DELETE FROM klienci WHERE id_klient = $id";
                            $result = $conn->query($sql);
                            if (!$result) {
                                echo "Błąd systemu :(";
                                die();
                            }
                        }
                    }

                    $conn->close();
                    header('Location: index.php');
                }

            ?>
        </div>

    </div>

    
</body>
</html>