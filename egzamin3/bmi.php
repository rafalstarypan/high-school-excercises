<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Twoje BMI</title>
        <link rel="stylesheet" href="styl3.css">
    </head>

    <body>
        <div class="container">
            <div class="baner">
                <div class="logo">
                    <img src="wzor.png" alt="wzór BMI">
                </div>
                <div class="rightBaner">
                    <h1>Oblicz swoje BMI</h1>
                </div>
            </div>

            <div class="main">
                <table>
                    <tr>
                        <th>Interpretacja BMI</th>
                        <th>Wartość minimalna</th>
                        <th>Wartość maksymalna</th>


                        <?php
                            $conn = new mysqli('localhost', 'root', '', 'egzamin3');
                            $conn->set_charset('utf8');
                            $sql = "SELECT informacja, wart_min, wart_max FROM bmi;";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $info = $row['informacja'];
                                $mini = $row['wart_min'];
                                $maxi = $row['wart_max'];
                                echo "<tr> <td>$info</td> <td>$mini</td> <td>$maxi</td> </tr>";
                            }

                            $conn->close();
                        ?>

                    </tr>
                </table>
            </div>

            <div class="wrapper">
                <div class="left">
                    <h2>Podaj wagę i wzrost</h2>
                    <form action="#" method="post">
                        Waga: <input type="number" min="1" name="weight"> <br>
                        Wzrost w cm: <input type="number" min="1" name="height"> <br>
                        <input type="submit" value="Oblicz i zapamiętaj wynik" name="submit">
                    </form>

                    <?php
                        if (isset($_POST['submit'])) {
                            $weight = $_POST['weight'];
                            $height = $_POST['height'];
                            if ($weight != '' && $height != '') {
                                //var_dump($weight);
                                //var_dump($height);
                                $bmi = $weight / ($height * $height);
                                $bmi *= 10000;
                                echo "Twoja waga: $weight; Twój wzrost: $height <br>BMI wynosi: $bmi";
                                $inter = 0;
                                if ($bmi >= 0 && $bmi <= 18) $inter = 1;
                                if ($bmi >= 19 && $bmi <= 25) $inter = 2;
                                if ($bmi >= 26 && $bmi <= 30) $inter = 3;
                                if ($bmi >= 31 && $bmi <= 100) $inter = 4;

                                $conn = new mysqli('localhost', 'root', '', 'egzamin3');
                                $conn->set_charset('utf8');
                                $t = date('Y-m-d', time());
                                //var_dump($t);
                                $sql = "INSERT INTO `wynik`(`id`, `bmi_id`, `data_pomiaru`, `wynik`) VALUES (NULL, $inter, '$t', $bmi);";
                                $result = $conn->query($sql);
                                if (!$result) {
                                    die('XD');
                                }
                                $conn->close();
                            }
                        }
                    ?>

                </div>
                <div class="right">
                    <img src="rys1.png" alt="ćwiczenia">
                </div>
            </div>

            <div class="footer">
                Autor: PESEL
                <a href="wzor.png">Zobacz kwerendy</a>
            </div>

        </div>

    </body>

</html>