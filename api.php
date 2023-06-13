<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: application/json');

$todoList = file_get_contents("dati.json");
$todoListDati = json_decode($todoList, true);

if (isset($_POST['newTask'])) {
    $todoListDati[] = $_POST['newTask'];
    file_put_contents("dati.json", json_encode($todoListDati) );
}

echo json_encode($todoListDati);

?>
