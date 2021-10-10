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
            <form action="#" method="post">
                Nazwa: <input type="text" name="nazwa"> <br /> 
                Czy ważne: <input type="checkbox" name="czyWazne"> <br />
                Kolor: <select name="kolor">
                    <option value="black">Czarny</option>
                    <option value="red">Czerwony</option>
                    <option value="blue">Niebieski</option>
                    <option value="green">Zielony</option>
                </select> <br />
                <input type="submit" name="bang" value="Dodaj"> <br />
            </form>
            <?php
                
                $id = $_GET['id'];
                if (isset($_POST['bang'])) {
                    $conn = new mysqli('localhost', 'root', '', 'todo');
                    $conn->set_charset('utf8');
                    $nazwa = $_POST['nazwa'] ?? null;
                    $czyWazne = $_POST['czyWazne'] ?? null;
                    if ($czyWazne == "on") {
                        $czyWazne = 1;
                    } else {
                        $czyWazne = 0;
                    }
                    $kolor = $_POST['kolor'] ?? null;
                    if ($nazwa && $kolor) {
                        $sql = "UPDATE todo SET nazwa = '$nazwa', czy_wazne = $czyWazne, kolor = '$kolor' WHERE id_todo = $id;";
                        //var_dump($sql);
                        $result = $conn->query($sql);
                        if (!$result) {
                            die('Błąd bazy');
                        }
                    }
                    $conn->close();
                    header('Location: index.php');
                }

                
            ?>
        
        </div>

        


    </div>



</body>
</html>