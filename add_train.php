<?php
header('Content-Type: application/json');

$trainsFile = 'trains.json';

// Leggi i treni esistenti
$trains = file_exists($trainsFile) ? json_decode(file_get_contents($trainsFile), true) : [];

// Crea nuovo treno
$newTrain = [
    'numero' => $_POST['trainNumber'] ?? '',
    'dataViaggio' => $_POST['travelDate'] ?? '',
    'partenzaPrevista' => $_POST['expectedDeparture'] ?? '',
    'arrivaloPrevisto' => $_POST['expectedArrival'] ?? '',
    'partenzaReale' => $_POST['actualDeparture'] ?? '',
    'arrivoReale' => $_POST['actualArrival'] ?? '',
    'id' => time()
];

// Aggiungi il nuovo treno
$trains[] = $newTrain;

// Salva su file
$result = file_put_contents($trainsFile, json_encode($trains));

if ($result !== false) {
    echo json_encode(['success' => true, 'message' => 'Treno aggiunto']);
} else {
    echo json_encode(['success' => false, 'message' => 'Errore nel salvataggio']);
}
