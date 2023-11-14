<h2>Choose a booking to delete :</h2>
<form action="deleteBookingForm.php" class="editForm" method="POST">
    <label for="clientId">Client ID:</label>
    <input type="number" name="clientId" id="clientId" required>

    <input type="submit" value="Select">
</form>

<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clientId = $_POST['clientId'];

    $stmt = $pdo->prepare("SELECT * FROM bookings WHERE clientId = ?");
    $stmt->execute([$clientId]);
    $bookingData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$bookingData) {
        echo '<p>Show not found!</p>';
        echo '<a href="index.php">Back to dashboard</a>';
    } else {
        echo '<h2>Edit a show :</h2>';
        echo '<form action="deleteBooking.php" class="deleteForm" method="POST">';

        echo '<label for="clientId">Client ID:</label>';
        echo '<input type="text" name="clientId" id="clientId" value="' . $bookingData['clientId'] . '">';

        echo '<label for="bookingId">Reservation ID :</label>';
        echo '<input type="text" id="bookingId" name="bookingId" value="' . $bookingData['id'] . '">';

        echo '<input type="submit" value="Delete">';
        echo '</form>';
    }
}
?>