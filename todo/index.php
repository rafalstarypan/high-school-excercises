<!--    
    Oto zadanie na dziś.

Aplikacja TODO

Przygotuj bazę danych i aplikację TODO (lista rzeczy do zrobienia).

1. UŻ tworzy nową TODO - podaje nazwę/treść rzeczy do zrobienia, czy jest bardzo ważne/priorytetowe,
może wybrać z listy rozwijanej kolor w jakim wyświetlany jest tekst (czarny - domyślny, czerwony, niebieski, zielony - zestaw minimum), 
czy jest zrobione
2. UŻ może edytować TODO - każde pole i stan notatki
3. UŻ może oznaczyć TODO jako zrobione - wtedy jej treść wyświetla się z przekreśleniem
użyj znacznika <del> ...  </del>, żeby osiągnąć ten efekt
4. UŻ może usuwać elementy TODO

 

Index.php czyli ekran startowy wyświetla nam:
1. listę istniejących TODO (obojętnie czy już zrobionych, czy jeszcze nie).
1.1. obok każdego elementu ma być klikalny element np. <A> o treści [edytuj] [kasuj] [zrobione]/[niezrobione]
to ostatnie jest 'szybką edycją' zmienia odpowiednio do nazwy stan pola 'zrobione' w bazie.
1.2. podczas wyświetlania najpierw wyświetlamy elementy 'bardzo ważne', potem zwykłe
1.3. podczas wyświetlania uzwględniamy ustawiony kolor dla danego TODO, pobierany z bazy
2. Link 'Dodaj TODO' prowadzący do formularza dodawania
 
3. Niech to wygląda jakoś składnie i ładnie

-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">

        <div class="lewy">
            <ul>
                <li><a href="index.php">Pokaż listę</a></li>
                <li><a href="add.php">Dodaj zadanie</a></li>
            </ul>
        </div>

        <div class="prawy">
        <?php

            $conn = new mysqli('localhost', 'root', '', 'todo');
            $conn->set_charset('utf8');
            $sql = "SELECT * FROM todo ORDER BY czy_wazne DESC";
            $result = $conn->query($sql);
            if (!$result) {
                die('Błąd bazy danych');
            }

            echo "<table>";
            echo "<tr style='font-weight:bold;'>";
            echo "<td>Nazwa</td><td>Ważne</td><td>Zrobione</td><td>Edytuj</td><td>Usuń</td><td>Zrobione</td><td>Niezrobione</td>";
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                $id = $row['id_todo'];
                $nazwa = $row['nazwa'];
                $czyWazne = $row['czy_wazne'];
                if ($czyWazne == "1") $czyWazne = "WAŻNE";
                else $czyWazne = "NIEWAŻNE";

                $czyZrobione = $row['czy_zrobione'];
                if ($czyZrobione == "1") $czyZrobione = "ZROBIONE";
                else $czyZrobione = "NIEZROBIONE";
                $kolor = $row['kolor'];

                echo "<tr style='color: $kolor;'>";
                echo "<td>";
                if ($czyZrobione ==  "ZROBIONE") echo "<del>";
                echo "$nazwa";
                if ($czyZrobione == "ZROBIONE") echo "</del>";
                echo "</td>";

                echo "<td>";
                if ($czyZrobione ==  "ZROBIONE") echo "<del>";
                echo "$czyWazne";
                if ($czyZrobione == "ZROBIONE") echo "</del>";
                echo "</td>";

                echo "<td>";
                if ($czyZrobione ==  "ZROBIONE") echo "<del>";
                echo "$czyZrobione";
                if ($czyZrobione == "ZROBIONE") echo "</del>";
                echo "</td>";
                
                echo "<td>";
                echo "<a href='edit.php?id=$id'>[Edytuj]</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='del.php?id=$id'>[Usuń]</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='do.php?id=$id'>[Zrobione]</a>";
                echo "</td>";
                echo "<td>";
                echo "<a href='undo.php?id=$id'>[Niezrobione]</a>";
                echo "</td>";

                echo "</tr>"; 
            }
            echo "</table>";
                $conn->close();
        ?>
        
        </div>

        


    </div>



</body>
</html>