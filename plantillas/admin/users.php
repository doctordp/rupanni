<?php
  ob_start();
  session_start();

  require('../../database.php');

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

  $user_option = null;

  if(isset($_GET['user_option'])){
    $user_option = strip_tags($_GET['user_option']);
    $sql = $conn->prepare("SELECT * FROM users WHERE id = :id");
    $sql->execute([
      'id' => $user_option
    ]);
    $usuario = $sql->fetch();
    if($usuario<=0){
      header('Location: usuarios.php');
    }
  }
  if($_GET['user_option']==null) {
    header('Location: usuarios.php');
  }

?>
<!DOCTYPE html>
<html lang="es">

<?php
  include('header/head.php');
  include('header/menu.php');
?>
<?php if(!empty($user) && $user['rango']==2): ?>
        <!-- Begin Page Content -->
        <div class="container w3-layout-container">
          <div class="w3-cell-row">
          <div class="">

          <h1 class="h3 mb-4 text-gray-800"><i class="fas fa-angle-right"></i><?php echo $usuario['nombre_completo']; ?></h1>
          <hr />
          <div class="form-group">
            <form action="src/update.php" method="post">
              <label for="nombre">ID: </label>
              <input type="text" class="form-control" name="id" value="<?php echo $usuario['id'] ?>">
              <label for="nombre">Email: </label>
              <input type="text" class="form-control" name="email" value="<?php echo $usuario['email'] ?>">
              <label for="nombre">Fecha: </label>
              <input type="text" class="form-control" name="fecha" value="<?php echo $usuario['fecha'] ?>">
              <br /><br />
              <input type="submit" value="UPDATE" class="btn btn-info">
            </form>
          </div>
        <!-- /.container-fluid -->
        </div>
        </div>
      </div>
      <!-- End of Main Content -->

      <?php include('header/footer.php'); ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<?php elseif(!empty($user) && $user['rango']==1): ?>
<?php header('Location: ../html-userpanel/index.php'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>
</body>

</html>
<?php
ob_end_flush();
?>