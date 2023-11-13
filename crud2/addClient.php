<?php
require 'connect.php';

$stmt = $pdo->query("SHOW COLUMNS FROM clients LIKE 'type'");
$columnExists = $stmt->rowCount() > 0;

if (!$columnExists) {
    $sql = "ALTER TABLE clients ADD COLUMN type VARCHAR(255)";
    $pdo->exec($sql);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['name'];
    $birthday = $_POST['date'];
    $member = isset($_POST['fidelity']) ? 1 : 0;
    $cardNumber = !empty($_POST['cardnumb']) ? $_POST['cardnumb'] : null;
    $type = $_POST['type'];

    $stmt = $pdo->prepare("INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber, type) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$lastName, $firstName, $birthday, $member, $cardNumber, $type]);

    header("Location: index.php");
    exit;
}
