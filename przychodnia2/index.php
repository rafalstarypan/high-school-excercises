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
                <input type="text" placeholder="Imie" name="imie" /> <br />
                <input type="text" placeholder="Nazwisko" name="nazwisko" /> <br />
                <input type="text" placeholder="Specjalizacja" name="specjalizacja" /> <br />
                <input type="submit" value="Dodaj" name="bang" />
            </form>

            <?php
                if (isset($_POST['bang'])) {
                    $imie = $_POST['imie'] ?? null;
                    $nazwisko = $_POST['nazwisko'] ?? null;
                    $specjalizacja = $_POST['specjalizacja'] ?? null;
                    if ($imie && $nazwisko && $specjalizacja) {
                        $sql = "INSERT INTO lekarz VALUES(NULL, '$imie', '$nazwisko', '$specjalizacja');";
                        //var_dump($sql);
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy :(');
                        }
                        $conn->close();
                        header('Location: index.php');
                    } else {
                        echo "Podaj wszystkie dane!";
                    }  
                }
                
            ?>
        </div>
    </div>


</body>
</html>