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

  if(isset($_GET['id'])){

    $id = strip_tags($_GET['id']);

    $sql = $conn->prepare("SELECT * FROM soporte WHERE id = :id");
    $sql->execute([
        'id' => $id
    ]);
    $datos = $sql->fetch();
    if($datos <= 0){
      header('Location: soporte.php');
    }
  } 
  if($_GET['id']==null) {
    header('Location: soporte.php');
  }

  $chat2 = $conn->prepare("SELECT * FROM soporte_chat WHERE id_chat=:id");
  $chat2->execute([
    'id' => $id
  ]);
  $c2 = $chat2->fetchAll();

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

          <h1 class="h3 mb-4 text-gray-800"><?php echo $datos['nombre_completo']; ?> | <?php echo $datos['ticket']; ?> | <?php if($datos['estado']==1){ echo "<a style='text-shadow: 0 0 12px lime; color: green;'>Open</a>"; } elseif($datos['estado']==2){echo "<a style='text-shadow: 0 0 12px darkred; color: red;'>Closed</a>";} ?></h1>
          <hr />
          <div class="container-fluid">
            <div class="genpre">
              <h5><?php echo $datos['titulo']; ?></h5>
              <hr />
              <pre><?php echo $datos['contenido']; ?></pre>
              <hr />
              <p style="font-size: 8px; text-align: right;"> <?php echo $datos['fecha']; ?> </p>
            </div>
            <br> <br />
            <?php
              foreach ($c2 as $chat2) {
                ?>
                <div class="genpre">
                  <h5><?php if($chat2['autor']==1){ echo '<p style="text-align: left; text-shadow: 0 0 12px darkgreen; color: green;">'.$datos['nombre_completo'].'</p>';} if($chat2['autor']==2){echo '<p style="text-align: right; text-shadow: 0 0 12px darkred; color: red;">Admin</p>';} ?></h5>
                  <hr />
                  <pre><?php echo $chat2['mensaje']; ?></pre>
                  <hr />
                  <p style="font-size: 8px; text-align: right;"> <?php echo $datos['fecha']; ?> </p>
                </div>
                <br> <br />
                <?php
              }
            ?>
          </div>
          <hr />
          <?php
            if($datos['estado']==1){
              echo '
                <form action="src/comentar.php" method="get">
                <br />
                <label for="comment">Comentar: </label>
                  <textarea class="form-control" rows="6" id="comment" name="comentario" required></textarea>
                  <br />
                  <input type="text" class="oculto" name="id" value="'.strip_tags($_GET["id"]).'" readonly>
                  <input type="submit" value="Comment" class="btn btn-success"> &nbsp;&nbsp;
                  <a href="src/close.php?id='.strip_tags($_GET["id"]).'" class="btn btn-danger">Close ticket</a>

                </form>
              ';
            } elseif($datos['estado']==2){
              echo '<h2 class="h1 mb-4 text-gray-800" style="text-align: center;">CLOSED</h2>';
            }
          ?>
          <br /><br />
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
  <script>
    $(document).ready(function() {
      $(".oculto").hide(); 
    });
  </script>>
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