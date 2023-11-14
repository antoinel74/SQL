<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['title'])) {
    $showID = $_POST['showID'];
    $newTitle = $_POST['title'];
    $newPerformer = $_POST['performer'];
    $newDate = $_POST['date'];
    $newStart = date("H:i:s", strtotime($_POST['start']));

    $stmt = $pdo->prepare("UPDATE shows SET title = ?, performer = ?, date = ?, startTime = ? WHERE id = ?");
    $stmt->execute([$newTitle, $newPerformer, $newDate, $newStart, $showID]);

    echo "<p>Show information updated successfully!</p>";
    echo '<a href="index.php">Back to dashboard</a>';
} else {

    echo "<p>Invalid request</p>";
    echo '<a href="index.php">Back to dashboard</a>';
}
