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
                <li><a href="klienci.php">Klienci</a></li>
            </ol>
        </div>

        <div class="content">
            <?php
                function printTable($cols, $result) {
                    echo "<table>";
                    echo "<tr style='font-weight:800;'>";
                    foreach ($cols as $header) {
                        echo "<td>" . ucfirst($header) . "</td>";
                    }
                    echo "</tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($cols as $col) {
                            echo "<td>" . $row["$col"] . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                $conn = new mysqli('localhost', 'root', '', 'skup_rolny');
                $conn->set_charset('utf8');

                $sql = "SELECT * FROM klient WHERE indywidualny = true;";
                $result = $conn->query($sql);
                $cols = array('imie', 'nazwisko', 'adres_zam');
                
                echo "<h1>Klienci indywidualni</h1>";
                printTable($cols, $result);

                $sql = "SELECT * FROM klient WHERE indywidualny = false;";
                $result = $conn->query($sql);
                $cols = array('imie', 'nazwisko', 'adres_zam');
                
                echo "<h1>Firmy</h1>";
                printTable($cols, $result);

                $conn->close();
            ?>
        </div>
    </div>
    
    
</body>
</html>