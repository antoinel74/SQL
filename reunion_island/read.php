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
    echo '<form>';
    echo '<table border="1">';
    echo '<tr>';
    foreach ($data[0] as $key => $value) {
      echo '<th>' . $key . '</th>';
    }
    echo '<th>Edit</th>';
    echo '<th>Delete</th>';
    echo '</tr>';

    foreach ($data as $row) {
      echo '<tr>';
      foreach ($row as $value) {
        echo '<td>' . $value . '</td>';
      }
      echo '<td><a href="update.php?id=' . $row['id'] . '&name=' . $row['name'] . '&difficulty=' . $row['difficulty'] . '&distance=' . $row['distance'] . '&duration=' . $row['duration'] . '&height_difference=' . $row['height_difference'] . '">Edit</a></td>';
      echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
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