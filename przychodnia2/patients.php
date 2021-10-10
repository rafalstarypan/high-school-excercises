<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pacjenci</title>

    <style>
        table, td {
            border: 2px solid black;
            text-align: center;
            padding: 10px;
        }
        table {
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        span {
            margin: 50px 50px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

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

                function printLink($x, $str) {
                    echo "<span><a href='patients.php?offset=$x'>" . $str . "</a></span>";
                }   

                    session_start();
                    $conn = new mysqli("localhost", "root", "", "lekarze");
                    $conn->set_charset("utf8");

                    $sql = "SELECT COUNT(*) AS 'CNT' FROM pacjent;";
                    $result = $conn->query($sql)->fetch_assoc();
                    $rowCnt = $result['CNT'];

                    $pageSize = 25;
                    $cols = ['imie_p', 'nazwisko_p', 'data_ur', 'plec'];

                    $offset = 0;
                    if (isset($_GET['offset'])) {
                        $offset = $_GET['offset'];
                        $rem = $offset % $pageSize;
                        if ($rem != 0) $offset -= $rem;
                        if ($offset < 0) {
                            echo "Strona nie istnieje :(";
                            die();
                        }
                    }

                    $sql = "SELECT * FROM pacjent LIMIT $pageSize OFFSET $offset;";
                    $result = $conn->query($sql);
                    if (!$result) {
                        echo "Błąd krytyczny!";
                        die();
                    }
                    printTable($cols, $result);

                    if ($offset > 0) {
                        printLink($offset - $pageSize, "Poprzedni");
                    }
                    if ($offset < $rowCnt) {
                        printLink($offset + $pageSize, "Następny");
                    }

        $conn->close();
    ?>

            
        </div>
    </div>

    
</body>
</html>