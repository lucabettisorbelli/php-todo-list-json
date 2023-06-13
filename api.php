<?php

header('Content-Type: application/json');

$todoList = file_get_contents("dati.json");
$todoListDati = json_decode($todoList, true);

if (isset($_POST['newTask'])) {
    $todoListDati[] = $_POST['newTask'];
    file_put_contents("dati.json", json_encode($todoListDati) );
}

echo json_encode($todoListDati);

?>
