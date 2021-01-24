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

	$titulo = null;
	$contenido = null;

	if(isset($_POST['titulo'], $_POST['contenido'])){

		$titulo = strip_tags($_POST['titulo']);
		$contenido = strip_tags($_POST['contenido']);
		$segs = time();
		$fecha = date('d-m-Y', $segs);

		$sql = $conn->prepare("INSERT INTO noticias (titulo, contenido, fecha) VALUES (:titulo, :contenido, :fecha)");
		$sql->execute([
			'titulo' => $titulo,
			'contenido' => $contenido,
			'fecha' => $fecha
		]);

		if($sql){
			header('Location: ../noticias.php');
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