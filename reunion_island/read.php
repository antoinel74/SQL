<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Randonnées</title>
  <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>

<body>
  <h1>Liste des randonnées</h1>
  <?php
  @require 'connect.php';

  try {
    $query = $pdo->query('SELECT * FROM hiking');
    $data = $query->fetchAll(PDO::FETCH_ASSOC);

    echo '<table border="1">';
    echo '<tr>';
    foreach ($data[0] as $key => $value) {
      echo '<th>' . $key . '</th>';
    }
    echo '</tr>';

    foreach ($data as $row) {
      echo '<tr>';
      foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
    echo '</form>';
  } catch (Exception $e) {
    die('Erreur PDO: ' . $e->getMessage());
  }
  ?>
</body>

</html>