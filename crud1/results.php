<?php
@require 'connect.php';

try {
    $query = $pdo->query('SELECT * FROM clients');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    echo '<pre>';
    print_r($data);
    echo '</pre>';
} catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
}


try {
    $query = $pdo->query('SELECT type FROM showTypes');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);
} catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
}
