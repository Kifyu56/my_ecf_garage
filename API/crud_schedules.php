<?php

require_once 'bdd_garageVparrot.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

// Récupérer les données de la requête
switch ($method) {

    case 'GET':
        readSchedules($pdo);
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['schedules_id'])) {
            updateSchedule($pdo, $data);
        } else {
            createSchedule($pdo, $data);
        }
        break;

    case 'DELETE':
        $id = $_GET['id'];
        deleteSchedule($pdo, $id);
        break;

    default:
        echo json_encode(['message' => 'Méthode HTTP non prise en charge']);
        break;
}

// Lire les horaires
function readSchedules($pdo)
{
    $stmt = $pdo->query('SELECT * FROM SCHEDULES');
    $schedules = $stmt->fetchAll();
    echo json_encode($schedules);
}

// Créer un horaire
function createSchedule($pdo, $data)
{
    $sql = "INSERT INTO SCHEDULES (
        day,
        opening_time_am,
        closing_time_am,
        opening_time_pm,
        closing_time_pm)
        VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $data['day'],
        $data['opening_time_am'],
        $data['closing_time_am'],
        $data['opening_time_pm'],
        $data['closing_time_pm']
    ]);
    echo json_encode(['message' => 'Horaire créé avec succès']);
}

// Mettre à jour un horaire
function updateSchedule($pdo, $data)
{
    $sql = "UPDATE SCHEDULES SET day = ?, opening_time_am = ?, closing_time_am = ?, opening_time_pm = ?, closing_time_pm = ? WHERE schedules_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $data['day'],
        $data['opening_time_am'],
        $data['closing_time_am'],
        $data['opening_time_pm'],
        $data['closing_time_pm'],
        $data['id']
    ]);
    echo json_encode(['message' => 'Horaire mis à jour avec succès']);
}

// Supprimer un horaire
function deleteSchedule($pdo, $id)
{
    $sql = "DELETE FROM horaires WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    echo json_encode(['message' => 'Horaire supprimé avec succès']);
}
