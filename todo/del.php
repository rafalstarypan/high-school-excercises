<?php
    $id = $_GET['id'];

    $conn = new mysqli('localhost', 'root', '', 'todo');
    $conn->set_charset('utf8');

    $sql = "DELETE FROM todo WHERE id_todo = $id;";
    $conn->query($sql);

    $conn->close();
    header('Location: index.php');
?>