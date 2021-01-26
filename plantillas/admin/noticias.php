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

  $sql = $conn->prepare("SELECT * FROM noticias ORDER BY id DESC");
  $sql->execute();
  $noticias = $sql->fetchAll();

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

          <h1 class="h3 mb-4 text-gray-800"><a href="post.php" class="btn btn-success" style=""><i class="far fa-file-alt"></i>&nbsp;&nbsp;Post&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;Notices</h1>
          <hr />

          <div class="container-fluid" style="padding-top: 10px;">
          <?php foreach($noticias as $n): ?>
          <div class="card shadow mb-4">
            <div class="card-body">
                <h5 style="text-align: center;"><?php echo($n['titulo']); ?></h5>
                <hr />
                <pre><?php echo($n['contenido']); ?></pre>
                <hr />
                <p><a href="src/borrar_noticia.php?id=<?php echo $n['id']; ?>" class="btn btn-danger">Delete</a></p>
            </div>
          </div>
            <br /><br />
          <?php endforeach; ?>
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