<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Organizer</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <div class="container">
        <div class="baner">
            <div class="banerLeft">
                <h2>MÓJ ORGANIZER</h2>
            </div>

            <div class="banerCenter">
                <form action="#" method="POST">
                    Wpis wydarzenia: <input type="text" name="wpis">
                    <input type="submit" value="ZAPISZ" name="submit">
                </form>
                <?php
                    if (isset($_POST['submit'])) {
                        $conn = new mysqli('localhost', 'root', '', 'egzamin6');
                        if ($conn->connect_errno) {
                            die($conn->connect_errno);
                        }
                        $conn->set_charset('utf8');
                        $wpis = $_POST['wpis'];
                        $sql = "UPDATE zadania SET wpis = '$wpis' WHERE dataZadania = '2020-08-27';";
                        $result = $conn->query($sql);
    
                        $conn->close();
                    }
                ?>
            </div>

            <div class="banerRight">
            
            </div>

        </div>

        <div class="main">
            <?php
                $conn = new mysqli('localhost', 'root', '', 'egzamin6');
                if ($conn->connect_errno) {
                    die($conn->connect_errno);
                }
                $conn->set_charset('utf8');
                $sql = "SELECT dataZadania, miesiac, wpis FROM zadania WHERE miesiac = 'sierpien';";
                $result = $conn->query($sql);
                if (!$result) {
                    die('Błąd bazy');
                }

                while ($row = $result->fetch_assoc()) {
                    $wpis = $row['wpis'];
                    $dataZadania = $row['dataZadania'];
                    $miesiac = $row['miesiac'];
                    echo "<div class='day'> <h6>$dataZadania, $miesiac</h6> <p>$wpis</p> </div>";
                }

                $conn->close();

            ?>
        </div>

        <div class="footer">
            <?php
                $conn = new mysqli('localhost', 'root', '', 'egzamin6');
                if ($conn->connect_errno) {
                    die($conn->connect_errno);
                }
                $conn->set_charset('utf8');
                $sql = "SELECT miesiac, rok FROM zadania WHERE dataZadania = '2020-08-01';";
                $result = $conn->query($sql);
                if (!$result) {
                    die('Błąd bazy');
                }
                $row = $result->fetch_assoc();
                $miesiac = $row['miesiac'];
                $rok = $row['rok'];
                echo "<h1>miesiąc: $miesiac, rok: $rok</h1>";
                $conn->close();
            ?>
            <p>Stronę wykonał: 00000000000</p>
        </div>

    </div>
</body>
</html>