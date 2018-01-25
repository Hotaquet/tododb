<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lire</title>
  </head>
  <body>
    <?php
      $todo = null;

      if (isset($_GET['label'])) {
        $sql = 'SELECT * FROM tache'

        require __DIR__.'/create-pdo.php';

        if (
          $pdo_statement &&
          $pdo_statement->bindParam(':label', $_GET['label'], PDO::PARAM_INT) &&
          $pdo_statement->execute()
        ) {
          $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
        }

        if ($todo) {
    ?>
    <h1><?php echo $todo['label']; ?></h1>
    <p><?php echo $todo['description']; ?></p>
    <?php
        }
      }
    ?>
    <ul>
      <?php
        if ($todo) {
      ?>
      <li><a href="edit.php?id=<?php echo $todo['label']; ?>">modifier...</a></li>
      <li><a href="delete.php?id=<?php echo $todo['label']; ?>">supprimer</a></li>
      <?php
        }
      ?>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
