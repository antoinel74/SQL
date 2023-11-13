<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['clientId'];
    $newFirstName = $_POST['firstname'];
    $newLastName = $_POST['name'];
    $newBirthday = $_POST['birthday'];
    $member = isset($_POST['fidelity']) ? 1 : 0;
    $cardNumber = !empty($_POST['cardnumb']) ? $_POST['cardnumb'] : null;

    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$clientId]);
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$clientData) {
        echo '<p>Client not found!</p>';
        echo '<button>Back to dashboard</button>';
    } else {
        $stmt = $pdo->prepare("UPDATE clients SET lastName = ?, firstName = ?, birthDate = ?, card = ?, cardNumber = ? WHERE id = ?");
        $stmt->execute([$newLastName, $newFirstName, $newBirthday, $member, $cardNumber, $clientId]);

        echo "Client first name updated successfully!";
        echo '<button>Back to dashboard</button>';
    }
}
