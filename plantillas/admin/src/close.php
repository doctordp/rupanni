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

	if($_GET['id']==null){
		header('Location: /');
	}

	if(isset($_GET['id'])){

		$id = strip_tags($_GET['id']);

		$sql = $conn->prepare("
			UPDATE `soporte` SET `estado`=2 WHERE id=:id
		");
		$sql->execute([
			'id' => $id
		]);
		if($sql){
			header('Location: ../soporte.php');
		} else {
			echo 'Hubo un error al tratar de cerrar el ticket';
		}
	}
	?>
<?php elseif(!empty($user) && $user['rango']==1): ?>
<?php header('Location: /login/paneles/usuario/'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>