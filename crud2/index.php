<?php
@require 'connect.php';

/* try {
    $query = $pdo->query('SELECT firstname, lastname, birthDate, cardNumber, type FROM clients');
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
            echo "Card Type :" . (string)$row['type'] . "<br>";
        }
        echo "<br>";
    }
} catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
} */

@require 'form.php';
@require 'formShow.php';
