<?php

// Array di stringhe con i dati da restituire
$data = ['Fare la spesa', 'Pagare le bollette'];

// Converti l'array di stringhe in una stringa JSON
$stringa = json_encode($data);

header('Content-Type: application/stringa');

echo $stringa;

?>