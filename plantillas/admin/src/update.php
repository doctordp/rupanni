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

	$email = null;
	$balance = null;

	if(isset($_POST['id'])){

		$id = strip_tags($_POST['id']);

		$email = strip_tags($_POST['email']);
		$balance = strip_tags($_POST['balance']);

		$sql = $conn->prepare("UPDATE `users` SET `id`=:id,`email`=:email WHERE `id`=:id");
		$sql->execute([
			'id' => $id,
			'email' => $email,
			'balance' => $balance
		]);

		if($sql){
			header('Location: ../usuarios.php');
		} else {
			echo 'Se ha producido un error al tratar de actualizar la query en la base de datos.';
		}

	}
  
  ?>
<?php elseif(!empty($user) && $user['rango']==1): ?>
<?php header('Location: ../html-userpanel/index.php'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>