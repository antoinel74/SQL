<?php
require 'connect.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['clientId'];

    $stmtDelete = $pdo->prepare("DELETE FROM bookings WHERE clientId = ?");
    $stmtDelete->execute([$clientId]);

    echo "<p>Client deleted successfully!</p>";
    echo '<a href="index.php">Back to dashboard</a>';
} else {
    echo '<p>Invalid request</p>';
    echo '<a href="index.php">Back to dashboard</a>';
}
