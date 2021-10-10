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
                $cols = array('mon', 'ile');

                $sql = "SELECT DISTINCT YEAR(kiedy) AS y FROM op ORDER BY y;";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $y = $row['y'];
                    echo "<h1>$y</h1>";
                    $sql = "SELECT MONTHNAME(kiedy) AS mon, ile FROM (SELECT kiedy, COUNT(*) AS ile FROM op WHERE YEAR(kiedy) = '$y' GROUP BY MONTH(kiedy)) AS xd ORDER BY ile desc LIMIT 1";
                    $newRes = $conn->query($sql);
                    printTable($cols, $newRes);
                }

                $conn->close();


                // SELECT nazwa, MONTHNAME(kiedy), ile FROM (SELECT nazwa, kiedy, SUM(ile) AS ile FROM op JOIN zboze ON id_zboze = zboze_id WHERE YEAR(kiedy) = '2018' AND rodzaj = 'sprzedaż' GROUP BY MONTH(kiedy), nazwa ORDER BY ile desc) AS xd GROUP BY nazwa


            ?>
        </div>
    </div>
    
    
</body>
</html>