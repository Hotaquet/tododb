<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <title>Modifier...</title>
  </head>
  <body>
    <?php
      if (isset($_POST['label'], $_POST['description'])) {
        $sql = 
          'INSERT INTO tache (label, description)' .
          'VALUES (:label, :description)';

        require __DIR__.'/create-pdo.php';

        if (
          $pdo_statement &&
          $pdo_statement->bindParam(':label', $_POST['label']) &&
          $pdo_statement->bindParam(':description', $_POST['description']) &&
          $pdo_statement->execute()
        ) {
          header('Location:index.php');
          exit;
        }
      }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>

    <form action="" method="post">
    <div class="container">
        <div class="row">      
    <div>
        <label>
          titre :
          <input type="text" name="label" value="">
        </label>
      </div>
       <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
<div>
        <label>
          description :
          <textarea name="description"></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
    <br>
    <ul>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
