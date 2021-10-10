<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ogłoszenia drobne</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>

    <div class="container">

        <div class="baner">
            <h2>Ogłoszenia drobne</h2>
        </div>

        <div class="wrapper">
            <div class="lewy">
                <h2>Ogłoszeniodawcy</h2>

                <?php
                    $conn = new mysqli('localhost', 'root', '', 'ogloszenia');
                    $conn->set_charset('utf8');
                    $sql = "SELECT uzytkownik.id, imie, nazwisko, email FROM uzytkownik WHERE uzytkownik.id < 4;";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $imie = $row['imie'];
                        $nazwisko = $row['nazwisko'];
                        $email = $row['email'];

                        echo "<h3>$id $imie $nazwisko</h3>";
                        echo "<p>$email</p>";

                        $sql = "SELECT tytul FROM ogloszenie WHERE uzytkownik_id = $id;";
                        $tytul = $conn->query($sql)->fetch_assoc();
                        $tytul = $tytul['tytul'];

                        echo "<p>Ogłoszenie: $tytul</p>";
                    }

                    $conn->close();
                ?>
            </div>

            <div class="prawy">
                <h2>Nasze kategorie</h2>
                <ul>
                    <li>Książki</li>
                    <li>Muzyka</li>
                    <li>Multimedia</li>
                </ul>
                <img src="ksiazki.jpg" alt="uwolnij swoją książkę">
                <table>
                    <tr>
                        <td>Ile?</td>
                        <td>Koszt</td>
                        <td>Promocja</td>
                    </tr>
                    <tr>
                        <td>1 - 40</td>
                        <td>1,20 PLN</td>
                        <td rowspan="2">Subskrybuj newsletter upust 0,30 PLN na ogłoszenie</td>
                    </tr>
                    <tr>
                        <td>41 i więcej</td>
                        <td>0,70 PLN</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            <span>Portal ogłoszenia drobne opracował: 00000000000</span>
        </div>

    </div>
    
</body>
</html>