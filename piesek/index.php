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
        echo "<span><a href='index.php?offset=$x'>" . $str . "</a></span>";
    }   

        session_start();
        $conn = new mysqli("localhost", "root", "", "piesek");
        $conn->set_charset("utf8");

        $sql = "SELECT COUNT(*) AS 'CNT' FROM osoba;";
        $result = $conn->query($sql)->fetch_assoc();
        $rowCnt = $result['CNT'];

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

        $sql = "SELECT * FROM osoba LIMIT $pageSize OFFSET $offset;";
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
        ?>
        
        <form action="search.php" method="post">
            <input type="text" name="toSearch" placeholder="Szukaj..." />
            <input type="submit" value="Szukaj" />
        </form>
        <?php

        $conn->close();
    ?>
    
</body>
</html>