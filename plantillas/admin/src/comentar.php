<?php
  
  require '../../../database.php';
  
  session_start();

  $id = null;

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

<?php if(!empty($user) && $user['rango']==2): ?>
  <?php


  $comentario = null;

  if(isset($_GET['comentario'])){
    $id = strip_tags($_GET['id']);
    $segs = time();
    $fecha = date('d-m-Y', $segs);

    $comentario = strip_tags($_GET['comentario']);
    $sql1 = $conn->prepare("INSERT INTO soporte_chat (mensaje, autor, fecha, id_chat) VALUES(:comentario, :autor, :fecha, :id)");
    $sql1->execute([
      'comentario' => $comentario,
      'autor' => 2,
      'fecha' => $fecha,
      'id' => $id
    ]);
    if($sql1){
      header('Location: ../chat.php?id='.strip_tags($_GET['id']));
      return true;
    } else {
      echo 'Hubo un error al tratar de subir el comentario';
    }
  }
  
  ?>
<?php elseif(!empty($user) && $user['rango']==1): ?>
<?php header('Location: /login/paneles/usuario/'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>