<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Parcourir les todos</title>
  </head>
  <body>
    <h1>todo-list</h1>
    <ul>
    <?php
      

require 'config-example.php';



    $sql = 'SELECT * FROM tache';
    $todos = [];

      require __DIR__.'/create-pdo.php';

      if ($pdo_statement && $pdo_statement->execute()) {
        $todos = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
      }

      foreach ($todos as $todo) {
    ?>
      <li>
        <a href="read.php?id=<?php echo $todo['label']; ?>">
          <?php echo $todo['description']; ?>
        </a>
      </li>
    <?php
      }
    ?>
      <li><a href="add.php">ajouter une tâche...</a></li>
    </ul>
</body>
</html>
