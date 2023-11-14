<h2>Choose a bookind ID to delete :</h2>
<form action="deleteTicketsForm.php" class="deleteForm" method="POST">
    <label for="bookingId">Booking ID:</label>
    <input type="number" name="bookingId" id="bookingId" required>

    <input type="submit" value="Select">
</form>

<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingId = $_POST['bookingId'];

    $stmt = $pdo->prepare("SELECT * FROM tickets WHERE bookingsId = ?");
    $stmt->execute([$bookingId]);
    $ticketsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$ticketsData) {
        echo '<p>Reservation not found!</p>';
        echo '<a href="index.php">Back to dashboard</a>';
    } else {
        echo '<h2>Delete reservations :</h2>';

        foreach ($ticketsData as $row) {
            echo '<form action="deleteBooking.php" class="deleteForm" method="POST">';

            echo '<label for="clientId">Reservation number:</label>';
            echo '<input type="text" name="reservation" id="reservation" value="' . $row['id'] . '">';

            echo '<label for="price">Price :</label>';
            echo '<input type="number" id="price" name="price" value="' . $row['price'] . '">';

            echo '<label for="bookingId">Reservation ID :</label>';
            echo '<input type="number" id="bookingId" name="bookingId" value="' . $row['bookingsId'] . '">';
            echo '</form>';
        }
        echo '<form action="deleteAllTickets.php" method="POST">';
        echo '<input type="hidden" name="bookingId" value="' . $bookingId . '">';
        echo '<button type="submit">Delete all</button>';
        echo '</form>';
    }
}
?>