<?php
@require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $stmtDelete = $pdo->prepare("DELETE FROM hiking WHERE id = ?");
    $stmtDelete->execute([$id]);

    echo "<p>Path deleted successfully!</p>";
    echo '<a href="read.php">Back to dashboard</a>';
} else {
    echo '<p>Invalid request</p>';
    echo '<a href="read.php">Back to dashboard</a>';
}
