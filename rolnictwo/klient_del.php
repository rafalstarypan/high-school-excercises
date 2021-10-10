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
                <select name="id">
               <?php
                    $conn = new mysqli('localhost', 'root', '', 'skup_rolny');
                    $conn->set_charset('utf8');

                    $sql = "SELECT * FROM klient;";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id_klient'];
                        $imie = $row['imie'];
                        $nazw = $row['nazwisko'];
                        echo "<option value='$id'>$imie $nazw</option>";
                    }
               ?>
               </select> <br />
                <input type="submit" value="Usuń" name="bang" /> <br />
            </form>

            <?php

                if (isset($_POST['bang'])) {
                    $id = $_POST['id'] ?? null;
                    
                    if ($id) {
                        $sql = "DELETE FROM klient WHERE id_klient = $id;";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy danych :(');
                        }
                    } else {
                        echo "Podaj wszystkie dane!";
                    }
                    $conn->close();
                    unset($_POST);
                    header('Location: klient_del.php');
                }

                $conn->close();

            ?>
        </div>

    </div>
    
    
</body>
</html>