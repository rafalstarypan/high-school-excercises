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
                $sql = "SELECT data_ur, plec FROM pacjent ORDER BY data_ur ASC;";
                $result = $conn->query($sql);
                $year = intval(Date('Y'));
                //var_dump($year);
                $arr = [];
                $maxi = 0;

                while ($row = $result->fetch_assoc()) {
                    $y = $row['data_ur'];
                    $y = intval(substr($y, 0, 4));
                    $plec = $row['plec'];
                    $age = $year - $y;
                    $age = floor($age / 10);
                    $key = $plec . $age;
                    if (isset($arr[$key])) {
                        $arr[$key]++;
                    } else {
                        $arr[$key] = 1;
                    }

                    if ($age > $maxi) {
                        $maxi = $age;
                    }
                }

                echo "<table>";
                echo "<tr style='font-weight:800;'>";
                echo "<td>Przedział</td>";
                echo "<td>Mężczyźni</td>";
                echo "<td>Kobiety</td>";
                echo "</tr>";
                for ($i = 0; $i <= $maxi; $i++) {
                    $men = 'M' . $i;
                    $women = 'K' . $i;
                    $cntMen = isset($arr[$men]) ? $arr[$men] : 0;
                    $cntWomen = isset($arr[$women]) ? $arr[$women] : 0;
                    $l = 10 * $i;
                    $r = 10 * ($i + 1) - 1;
                    echo "<tr>";
                    echo "<td>" . $l . " - " . $r . " lat</td>"; 
                    echo "<td>" . $cntMen . "</td>";
                    echo "<td>" . $cntWomen . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            ?>

            
        </div>
    </div>


</body>
</html>