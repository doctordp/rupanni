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

	$id = null;

	if(isset($_POST['id'])){

		$id = strip_tags($_POST['id']);


		$sql = $conn->prepare("DELETE FROM users WHERE id=:id");
		$sql->execute([
			'id' => $id
		]);

		if($sql){
			header('Location: ../usuarios.php');
		} else {
			echo 'Se ha producido un error al tratar de ejecutar la query en la base de datos.';
		}

	}
  
  ?>
<?php elseif(!empty($user) && $user['rango']==1): ?>
<?php header('Location: /login/paneles/usuario/'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>