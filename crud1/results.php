<?php
@require 'connect.php';

try {
    $query = $pdo->query('SELECT firstname, lastname, birthDate, cardNumber FROM clients');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $row) {
        $fidelity = "No";
        if (!empty($row['cardNumber'])) {
            $fidelity = "Yes";
        }
        echo "Name: " . $row['lastname'] . "<br>";
        echo "Firstname: " . $row['firstname'] . "<br>";
        echo "Birthday: " . $row['birthDate'] . "<br>";
        echo "Member: " . $fidelity . "<br>";
        if ($fidelity == "Yes") {
            echo "CardNumber :" . (string)$row['cardNumber'] . "<br>";
        }
        echo "<br>";
    }
} catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
}


try {
    $query = $pdo->query('SELECT * FROM shows ORDER BY title ASC');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Shows</h2>";

    foreach ($data as $row) {
        echo "Spectacle :" . $row['title'] . "<br>";
        echo "Artist :" . $row['performer'] . "<br>";
        echo "Date :" . $row['date'] . "<br>";
        echo "Start-Time :" . $row['startTime'] . "<br><br>";
    }
} catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
}
