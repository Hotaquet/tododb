<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifier...</title>
  </head>
  <body>
    <?php
      $todo = null;

      if (isset($_GET['id'])) {
        if (isset($_POST['title'], $_POST['description'])) {
          $sql = 
            'UPDATE tache' .
            'SET title=:title, description=:description' .
            'WHERE tacheid=:tacheid';

          require __DIR__.'/create-pdo.php';

          if (
            $pdo_statement &&
            $pdo_statement->bindParam(':tacheid', $_GET['tacheid'], PDO::PARAM_INT) &&
            $pdo_statement->bindParam(':label', $_POST['label']) &&
            $pdo_statement->bindParam(':description', $_POST['description']) &&
            $pdo_statement->execute()
          ) {
            header('Location:read.php?id=' . $_GET['tacheid']);
            exit;
          }
        } else {
          $sql = 'SELECT * FROM todos WHERE tacheid=:tacheid';

          require __DIR__.'/create-pdo.php';

          if (
            $pdo_statement &&
            $pdo_statement->bindParam(':tacheid', $_GET['tacheid'], PDO::PARAM_INT) &&
            $pdo_statement->execute()
          ) {
            $todo = $pdo_statement->fetch(PDO::FETCH_ASSOC);
          }

          if ($todo) {
    ?>
    <form action="" method="post">
      <div>
        <label> 
          titre :
          <input type="text" name="title" value="<?php echo $todo['label']; ?>">
        </label>
      </div>
      <div>
        <label>
          description :
          <textarea name="description"><?php echo $todo['description']; ?></textarea>
        </label>
      </div>
      <div>
        <input type="submit" value="envoyer">
      </div>
    </form>
    <?php
          }
        }
      }
    ?>
    <ul>
      <?php
        if ($todo) {
      ?>
      <li><a href="read.php?id=<?php echo $todo['label']; ?>">annuler</a></li>
      <?php
        }
      ?>
      <li><a href="index.php">retour à l'index</a></li>
    </ul>
  </body>
</html>
