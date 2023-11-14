<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstname'], $_POST['name'], $_POST['birthday'])) {
    $clientId = $_POST['clientId'];
    $newFirstName = $_POST['firstname'];
    $newLastName = $_POST['name'];
    $newBirthday = $_POST['birthday'];
    $member = isset($_POST['fidelity']) ? 1 : 0;
    $cardNumber = !empty($_POST['cardnumb']) ? $_POST['cardnumb'] : null;

    $stmt = $pdo->prepare("UPDATE clients SET lastName = ?, firstName = ?, birthDate = ?, card = ?, cardNumber = ? WHERE id = ?");
    $stmt->execute([$newLastName, $newFirstName, $newBirthday, $member, $cardNumber, $clientId]);

    echo "<p>Client information updated successfully!</p>";
    echo '<a href="index.php">Back to dashboard</a>';
} else {
    echo '<p>Invalid request</p>';
    echo '<a href="index.php">Back to dashboard</a>';
}
