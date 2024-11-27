<?php
header('Content-Type: application/json');

$trainsFile = 'trains.json';

// Leggi i treni esistenti
$trains = file_exists($trainsFile) ? json_decode(file_get_contents($trainsFile), true) : [];

// Ordina i treni per data più recente
usort($trains, function ($a, $b) {
    return strtotime($b['dataViaggio']) - strtotime($a['dataViaggio']);
});

// Restituisci i treni in formato JSON
echo json_encode($trains);
