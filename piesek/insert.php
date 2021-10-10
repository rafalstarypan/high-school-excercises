<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Osoba</title>
</head>
<body>

    <?php
        $conn = new mysqli("localhost", "root", "", "piesek");
        $conn->set_charset("utf8");

        $names = array('Jan', 'Michał', 'Marcin', 'Szymon', 'Rafał', 'Dorota', 'Kaper', 'Wolfgang', 'Wacław');
        $lastnames = array('Kowal', 'Nowak', 'Dworaczyk', 'Starypan', 'Cegła', 'Łopata', 'Kowalski', 'Koparka');

        for ($i = 0; $i < 100; $i++) {
            $year = rand(1950, 2010);
            $month = rand(1, 12);
            $day = rand(1, 30);

            $myDate = $year . '-' . $month . '-' . $day;
            $namePos = rand(0, count($names) - 1);
            $lastnamePos = rand(0, count($lastnames) - 1);
            $myName = $names[$namePos];
            $myLastname = $lastnames[$lastnamePos];
            //var_dump($myDate);

            $sql = "INSERT INTO osoba VALUES(NULL, '$myName', '$myLastname', '$myDate');";
            $done = $conn->query($sql);
            if ($done) {
                echo "ZROBIONO :)";
            } else {
                echo "No i dupa";
            }
        }

        $conn->close();
    ?>
    
</body>
</html>