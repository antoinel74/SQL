<h2>Choose a show to edit :</h2>
<form action="editShowsForm.php" class="editForm" method="POST">
    <label for="showID">Show ID:</label>
    <input type="number" name="showID" id="showID" required>

    <input type="submit" value="Select">
</form>

<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $showID = $_POST['showID'];

    $stmt = $pdo->prepare("SELECT * FROM shows WHERE id = ?");
    $stmt->execute([$showID]);
    $showData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$showData) {
        echo '<p>Show not found!</p>';
        echo '<a href="index.php">Back to dashboard</a>';
    } else {
        echo '<h2>Edit a show :</h2>';
        echo '<form action="editShows.php" class="editForm" method="POST">';
        echo '<input type="hidden" name="showID" value="' . $showData['id'] . '">';

        echo '<label for="title">Title:</label>';
        echo '<input type="text" name="title" id="title" value="' . $showData['title'] . '">';

        echo '<label for="performer">Performer :</label>';
        echo '<input type="text" id="performer" name="performer" value="' . $showData['performer'] . '">';

        echo '<label for="date">Date :</label>';
        echo '<input type="date" id="date" name="date" value="' . $showData['date'] . '">';

        echo '<label for="start">Start Time :</label>';
        echo '<input type="time" step="1" id="start" name="start" ' . $showData['startTime'] . '>';

        echo '<input type="submit" name="update" value="Update">';
        echo '<input type="submit" name="delete" value="Delete">';
        echo '</form>';
    }
}
?>