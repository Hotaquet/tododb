<?php

if (isset($_GET['label'])) {
  $sql = 
    'UPDATE tache' .
    'SET deleted_at=CURRENT_TIMESTAMP() ' .
    'WHERE label=:label';

  require __DIR__.'/create-pdo.php';

  if (
    !$pdo_statement ||  
    !$pdo_statement->bindParam(':id', $_GET['label'], PDO::PARAM_INT) ||
    !$pdo_statement->execute()
  ) {
    header('Location:read.php?id=' . $_GET['label']);
    exit;
  }
}

header('Location:index.php');
