<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Lekarze</title>
</head>
<body>
    
    <?php
        $conn = new mysqli("localhost", "root", "", "lekarze");
        $conn->set_charset("utf8");
    ?>
    <div class="container">
        <div class="nav">
            <a href="index.php">Dodaj lekarza</a> <br />
            <a href="add.php">Dodaj wizytę</a> <br />
            <a href="today.php">Wizyty na dzisiaj</a> <br />
            <a href="report.php">Raport wiek</a> <br />
            <a href="patients.php">Pacjenci</a> <br />
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

                $sql = "SELECT CURDATE() AS today;";
                $today = $conn->query($sql)->fetch_assoc();
                $today = $today['today'];
                var_dump($today);

                $sql = "SELECT imie, nazwisko, imie_p, nazwisko_p, data_godz FROM wizyty JOIN lekarz ON lekarz_id = id_lekarz JOIN pacjent ON pacjent_id = id_pacjent WHERE data_godz LIKE '%$today%';";
                //var_dump($sql);

                $result = $conn->query($sql);
                $cols = array('imie', 'nazwisko', 'imie_p', 'nazwisko_p', 'data_godz');

                printTable($cols, $result);

            ?>
        </div>
    </div>


</body>
</html>