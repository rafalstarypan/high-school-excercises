<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/styles.css">
    <title>O firmie</title>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="logo.jpg" alt="Logo">
        </div>

        <div class="wrapper">
            <div class="nav">
                <p>
                <a href="#">O firmie </a> <br />
                <a href="kontakt.html">Kontakt </a> <br />
                <a href="oferta.html">Oferta </a> <br />
                <a href="warunki_wynajmu.html">Warunki wynajmu </a> <br />
                <a href="autokary.html">Autokary </a> <br />
                <a href="zapytanie_ofertowe.html">Zapytanie ofertowe </a> <br />
                <a href="#">Galeria </a> <br />
                <a href="#">Losowe Liczby </a> <br />
                <a href="#">Formularz liczący </a> <br />
                </p>
            </div>
            <div class="content">
                
                <?php
                    $a = rand(1, 20);
                    $b = rand(1, 20);
                    if ($a > $b) {
                        for ($i = $a; $i >= $b; $i--) {
                            echo $i . " ";
                        }
                    } else {
                        for ($i = $a; $i <= $b; $i++) {
                            echo $i . " ";
                        }
                    }
                ?>

            </div>
            <div class="partners">
                <a href="http://www.jelcz.com.pl/"> <img src="dane/parnterzy/jelcz.jpg" alt="Partner 1"> </a>
                <a href="https://www.setra-bus.com/pl-pl/strona-glowna.html?L=1"> <img src="dane/parnterzy/setra.gif" alt="Partner 2"> </a>
                <a href="http://www.neoplan-bus.com/cms/en/home.html"> <img src="dane/parnterzy/neoplan.jpg" alt="Partner 3"> </a>
            </div>
        </div>

        <div class="footer">
            <span> Rafał Starypan kl 4dt nr 23 </span>
        </div>
    </div>


</body>
</html>