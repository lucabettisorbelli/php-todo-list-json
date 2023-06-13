<?php

header('Content-Type: application/stringa');

// Converti l'array di stringhe in una stringa JSON
$stringa = json_encode($data);

$todoList = file_get_contents("dati.json");

$todoListDati = json_decode($todoList, true);

echo $todoList;

?>