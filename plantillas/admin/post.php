<?php
  ob_start();
  session_start();
  error_reporting(0);
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

          <h1 class="h3 mb-4 text-gray-800">Post a notice</h1>
          <hr />
          <form action="src/postn.php" method="post">
            <label for="comment">Title: </label>
            <br />
            <input type="text" class="form-control" name="titulo">
            <br />
            <label for="comment">Content: </label>
            <br />
            <textarea class="form-control" rows="17" id="comment" name="contenido"></textarea>
            <br />
            <input type="submit" class="btn btn-success" value="Post">
          </form>
<br /><br /><br /><br />
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
<?php header('Location: /login/paneles/usuario/'); ?>
<?php elseif(empty($user) && $user['rango']==0): ?>
<?php header('Location: /'); ?>
<?php endif; ?>
</body>

</html>
<?php
ob_end_flush();
?>