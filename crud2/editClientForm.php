<h2>Choose a client to edit :</h2>
<form action="" class="editForm" method="POST">
    <label for="clientId">Client ID:</label>
    <input type="number" name="clientId" id="clientId" required>

    <input type="submit" value="Select">
</form>

<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['clientId'];

    $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$clientId]);
    $clientData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$clientData) {
        echo '<p>Client not found!</p>';
        echo '<a href="index.php">Back to dashboard</a>';
    } else {
        echo '<h2>Edit a client profile:</h2>';
        echo '<form action="editClient.php" class="editForm" method="POST">';
        echo '<input type="hidden" name="clientId" value="' . $clientData['id'] . '">';

        echo '<label for="name">Name:</label>';
        echo '<input type="text" name="name" id="name" value="' . $clientData['lastName'] . '">';

        echo '<label for="firstname">Firstname :</label>';
        echo '<input type="text" id="firstname" name="firstname" value="' . $clientData['firstName'] . '">';

        echo '<label for="birthday">Birthday</label>';
        echo '<input type="date" id="birthday" name="birthday" value="' . $clientData['birthDate'] . '">';

        echo '<label for="fidelity">Member :</label>';
        echo '<input type="checkbox" id="fidelity" name="fidelity" ' . ($clientData['card'] ? 'checked' : '') . '>';

        echo '<label for="cardnumb">Member Card Number :</label>';
        echo '<input type="number" name="cardnumb" id="cardnumb" value="' . $clientData['cardNumber'] . '">';

        echo '<input type="submit" value="Update">';
        echo '</form>';
    }
}
?>