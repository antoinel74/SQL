<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];

    $stmt = $pdo->prepare("DELETE FROM tickets WHERE bookingsId = ?");
    $stmt->execute([$bookingId]);

    echo "<p>Reservation(s) deleted successfully!</p>";
    echo '<a href="index.php">Back to dashboard</a>';
} else {

    echo "<p>Invalid request</p>";
    echo '<a href="index.php">Back to dashboard</a>';
}
