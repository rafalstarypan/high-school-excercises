<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Oto klienci</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            border: 1px solid red;
            padding: 10px;
            text-align:center;
        }
        caption {
            font-weight: 800;
            font-size: 20px;
            padding-bottom: 10px;
        }
        #container {
            width: 1000px;
            display: flex;
        }
        #left {
            flex: 2;
        }
        #right {
            flex: 5;
        }
    </style>
</head>
<body>
    
    <div id="container">

        <div id="left">
            <a href="#">Pokaż klientów</a> <br />
            <a href="add.php">Dodaj klienta</a> <br />
            <a href="edit.php">Edytuj klienta</a> <br />
            <a href="delete.php">Usuń klienta</a> 
        </div>

        <div id="right">
                <?php
                    $conn = new mysqli("localhost", "root", "", "klienci");
                    $conn->set_charset("utf8");
                    $sql = "SELECT * FROM klienci;";
                    $result = $conn->query($sql);
                ?>

                <table>
                    <caption>Klienci</caption>
                    <tr> 
                        <td>Id</td>
                        <td>Imię</td>
                        <td>Nazwisko</td>
                        <td>Telefon</td>
                        <td>Adres</td>
                    </tr>

                    <?php
                        while ($wiersz = $result->fetch_assoc()) { 
                            ?>
                            <tr>
                            <td> <?= $wiersz['id_klient'] ?> </td>   
                            <td> <?= $wiersz['imie'] ?> </td>  
                            <td> <?= $wiersz['nazwisko'] ?> </td>  
                            <td> <?= $wiersz['telefon'] ?> </td>       
                            <td> <?= $wiersz['adres'] ?> </td>
                            </tr>  
                        <?php
                            }
                            echo "</table>";
                            $conn->close();
                        ?>
        </div>
    </div>

    
</body>
</html>