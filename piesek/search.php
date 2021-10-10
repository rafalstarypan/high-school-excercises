<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Osoba</title>

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
</head>
<body>

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
        echo "<span><a href='search.php?offset=$x'>" . $str . "</a></span>";
    }

        session_start();
        $toSearch = "";
        if (isset($_POST['toSearch'])) {
            $toSearch = $_POST['toSearch'];
        } else if ($_SESSION['toSearch']) {
            $toSearch = $_SESSION['toSearch'];
        }

        $_SESSION['toSearch'] = $toSearch;

        var_dump($toSearch);
        var_dump($_SESSION['toSearch']);
        $conn = new mysqli("localhost", "root", "", "piesek");
        $conn->set_charset("utf8");

        $sql = "SELECT COUNT(*) AS 'CNT' FROM osoba WHERE i LIKE '%$toSearch%' OR n LIKE '%$toSearch%' OR d LIKE '%$toSearch%';";
        $result = $conn->query($sql)->fetch_assoc();
        $rowCnt = $result['CNT'];
        if ($rowCnt <= 0) {
            echo "Brak wyników";
            die();
        }

        $pageSize = 10;
        $cols = ['i', 'n', 'd'];

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

        $sql = "SELECT * FROM osoba WHERE (i LIKE '%$toSearch%' OR n LIKE '%$toSearch%' OR d LIKE '%$toSearch%') LIMIT $pageSize OFFSET $offset;";
        $result = $conn->query($sql);
        if (!$result) {
            echo "Błąd krytyczny!";
            die();
        }
        printTable($cols, $result);

        if ($offset > 0) {
            printLink($offset - $pageSize, "Poprzedni");
        }
        if ($offset + $pageSize < $rowCnt) {
            printLink($offset + $pageSize, "Następny");
        }

        $conn->close();
    ?>
    
</body>
</html>