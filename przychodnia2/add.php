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
            
            <form action="#" method="post">
                Lekarz: 
                <select name="lekarz_id">

                    <?php
                        $sql = "SELECT * FROM lekarz;";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy ):');
                        }
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id_lekarz'];
                            $imie = $row['imie'];
                            $specjalizacja = $row['specjalizacja'];
                            $nazwisko = $row['nazwisko'];
                            echo "<option value='$id'>" . $imie . " " . $nazwisko . " " . $specjalizacja . "</option>";
                        }
                    ?>

                </select> <br />

                Pacjent: 
                <select name="pacjent_id">

                    <?php
                        $sql = "SELECT * FROM pacjent;";
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy ):');
                        }
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id_pacjent'];
                            $imie = $row['imie_p'];
                            $nazwisko = $row['nazwisko_p'];
                            echo "<option value='$id'>" . $imie . " " . $nazwisko . "</option>";
                        }
                    ?>

                </select> <br />
                
                Czas: <input type="datetime-local" name="data_godz" /> <br />

                <input type="submit" value="Dodaj wizytę" name="bang" />
            </form>

            <?php
                if (isset($_POST['bang'])) {
                    $lekarz_id = $_POST['lekarz_id'] ?? null;
                    $pacjent_id = $_POST['pacjent_id'] ?? null;
                    $xd = $_POST['data_godz'] ?? null;

                    if ($imie && $nazwisko && $xd) {
                        $data_godz = "";
                        for ($i = 0; $i < strlen($xd); $i++) {
                            if (!ctype_alpha($xd[$i])) {
                                $data_godz .= $xd[$i];
                            } else {
                                $data_godz .= " ";
                            }
                        }
                        //var_dump($data_godz);
                        
                        $sql = "INSERT INTO wizyty VALUES(NULL, $lekarz_id, $pacjent_id, '$data_godz');";
                        //var_dump($sql);
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy :(');
                        }
                        $conn->close();
                        //header('Location: add.php');
                    } else {
                        echo "Podaj wszystkie dane!";
                    }  
                }
                
            ?>
        </div>
    </div>


</body>
</html>