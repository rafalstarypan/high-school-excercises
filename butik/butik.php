<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stylowe buty dla każdego</title>
    <link rel="stylesheet" type="text/css" href="styl_butik.css" />
</head>

<body>
    
    <div id="container">

        <div id="baner">
            <h1> Witamy na stronie naszego sklepu! </h1>
        </div>

        <div id="centrum">

            <div id="lewy">
                <h3> Buty damskie </h3>

                <?php
                    $conn = new mysqli("localhost", "root", "", "butik");
                    if ($conn->connect_error) {
                        echo "Błąd połączenia";
                        die($conn->connect_error);
                    }
                    $conn->set_charset("utf8");
                    $sql = "SELECT nazwa, rozmiar, cena FROM buty WHERE rodzaj = 'd'";
                    $result = $conn->query($sql);

                    while ($wiersz = $result->fetch_assoc()) {
                        echo "<p>" . $wiersz['nazwa'] . " - rozmiar " . $wiersz['rozmiar'] . " w cenie " . $wiersz['cena'] . " zł </p>";
                    }
                ?>

            </div>

            <div id="srodkowy">
                <h2> Butik <br /> Bucik </h2>
                <img alt="Zdjęcie buta" src="bucik_foto.jpg"  />
                <h2> Najlepsze ceny! </h2>
            </div>

            <div id="prawy">
                <h3> Buty męskie </h3>

                <?php

                    $sql = "SELECT nazwa, rozmiar, cena FROM buty WHERE rodzaj = 'm'";
                    $result = $conn->query($sql);

                    while ($wiersz = $result->fetch_assoc()) {
                        echo "<p>" . $wiersz['nazwa'] . " - rozmiar " . $wiersz['rozmiar'] . " w cenie " . $wiersz['cena'] . " zł </p>";
                    }
                    
                    $conn->close();
                ?>

            </div>

        </div>

        <div id="stopka">
            <table>
                <tr>
                    <td> 
                        <p> Posiadamy również buty dla dzieci! </p> 
                    </td>
                    <td> 
                        <p> Autor: 123456789 </p>
                        <p> <a href="kwerendy.txt"> Informacje o reklamacjach </a> </p>
                    </td> 
                    <td>
                        <p> Nasza oferta </p>
                        <ul>
                            <li> Obuwie damskie </li>
                            <li> Obuwie męskie </li>
                            <li> Zamówienia specjalne </li>
                        </ul>
                    </td>
                </tr>


            </table>


        
        </div>

    </div>



</body>
</html>