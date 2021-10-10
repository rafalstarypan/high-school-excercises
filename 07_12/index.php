<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Klasyczne samochody</title>
    <link rel="stylesheet" href="styl_auta.css">
    <script>
        const MUL = 1.6093;

        function convertDist() {
            let dist = document.querySelector('input[name=dist]').value;
            let p = document.querySelector('p[name=distResult]');

            dist = Number(dist);
            if (isNaN(dist)) {
                p.innerHTML = 'błędne dane';
                p.style.color = 'red';
                return;
            }

            dist *= MUL;
            p.innerHTML = `${dist} km`;
            p.style.color = 'darkgreen';
        }

        function convertSpeed(input) {
            let speed = input.value;
            speed = Number(speed);
            let p = document.querySelector('p[name=speedResult]');
            
            if (isNaN(speed)) {
                p.innerHTML = 'błędne dane';
                p.style.color = 'red';
                return;
            }

            speed *= MUL;
            p.innerHTML = `${speed} km / h`;
            p.style.color = 'darkgreen';
        }

    </script>
</head>
<body>
    
    <div class="container">
        <div class="baner">
            <h2>Klasyczne samochody - najlepsze samochody</h2>
        </div>

        <div class="wrapper">
            <div class="left">
                <table>
                    <tr>
                        <td><img src="img1.jpg" alt=""></td>
                        <td><img src="img2.jpg" alt=""></td>
                    </tr>
                    <tr>
                        <td><img src="img3.jpg" alt=""></td>
                        <td><img src="img4.jpg" alt=""></td>
                    </tr>
                </table>
            </div>
            <div class="middle">
                <h3>Najlepsze marki</h3>
                <ul>
                    <li>Ford</li>
                    <li>Ferrari</li>
                    <li>Mercedes</li>
                </ul>
                <h3>Najlepsze modele</h3>
                <ol>
                    <li>SL</li>
                    <li>GTO</li>
                    <li>GTX</li>
                </ol>
            </div>
            <div class="right">
                <h2>Konwerter</h2>
                <input type="number" name="dist"> <br />
                <button onclick="convertDist()">Konwertuj</button> 
                <p class="pTitle">wartość w km wynosi:</p>
                <p name="distResult">0 km</p>

                <hr />
                <input type="number" name="speed" onchange="convertSpeed(this)">
                <p class="pTitle">szybkość w km/h wynosi:</p>
                <p name="speedResult">0 km / h</p>
                <hr />
                <h2>Linki</h2>
                <a href="zdjecia/img1.jpg" alt="klasyczny samochód">Zdjęcie 1</a> <br />
                <a href="zdjecia/img2.jpg" alt="klasyczny samochód">Zdjęcie 2</a>
            </div>
        </div>

        <div class="footer">
            Stronę wykonał - 00000000000
        </div>

    </div>

</body>
</html>