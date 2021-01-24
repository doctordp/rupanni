<?php

  session_start();

  require('database.php');

  if(isset($_SESSION['user_id'])){
    $rec = $conn->prepare('SELECT * FROM users WHERE id = :id');
    $rec->bindParam(':id', $_SESSION['user_id']);
    $rec->execute();
    $ss = $rec->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if(count($ss) > 0) {
      $user = $ss;
    }
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Sesión iniciada</title>
</head>
<body>

  <?php if(!empty($user) && $user['rango']==1): ?>

  <?php
    header('Location: ./index.php');
  ?>

  <?php elseif(!empty($user) && $user['rango']==2): ?>

  <?php
    header('Location: ../admin/index.php');
  ?>

  <?php elseif(empty($user) || $user['rango']==0): ?>
    <?php
      header('Location: login.php');
      // echo 'nada';
    ?>
  <?php endif; ?>
</body>
</html>