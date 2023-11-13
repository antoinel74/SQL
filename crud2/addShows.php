<?php
require 'connect.php';

$showTypesMapping = [
    'Concert' => 1,
    'Théâtre' => 2,
    'Humour' => 3,
    'Danse' => 4,
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $showName = $_POST['showName'];
    $performer = $_POST['performer'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $gender = $_POST['genre'];
    $subgender = $_POST['subgenre'];
    $duration = date("H:i:s", strtotime($_POST['duration']));
    $start = date("H:i:s", strtotime($_POST['start']));

    $typeId = $showTypesMapping[$type];
    $genderId = ($gender === 'Electronic') ? 4 : 1;
    $subgenderId = ($subgender === 'Club') ? 10 : 1;

    $stmt = $pdo->prepare("INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$showName, $performer, $date, $typeId, $genderId, $subgenderId, $duration, $start]);

    header("Location: index.php");
    exit;
}
