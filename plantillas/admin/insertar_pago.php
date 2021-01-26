<?php
  ob_start();
  session_start();
  // error_reporting(0);
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

  $usuario = null;
  $budget = null;
  $email = null;
  $direccion = null;
  $zip = null;
  $ciudad = null;
  $pais = null;
  $region = null;
  $numero = null;
  $fecha = null;
  $msg = null;

  if(isset($_POST['usuario'])){

    $usuario = strip_tags($_POST['usuario']);
    $budget = strip_tags($_POST['budget']);
    $email = strip_tags($_POST['email']);
    $direccion = strip_tags($_POST['direccion']);
    $zip = strip_tags($_POST['zip']);
    $ciudad = strip_tags($_POST['ciudad']);
    $pais = strip_tags($_POST['pais']);
    $region = strip_tags($_POST['region']);
    $numero = strip_tags($_POST['numero']);

    $fecha = date('d-m-Y', time());

    $sql2 = $conn->prepare("INSERT INTO pagos (user, budget, email, fecha, direccion, zip, ciudad, pais, region, numero) VALUES (:user, :budget, :email, :fecha, :direccion, :zip, :ciudad, :pais, :region, :numero)");
    $sql2->execute([
      'user' => $usuario,
      'budget' => $budget,
      'email' => $email,
      'fecha' => $fecha,
      'direccion' => $direccion,
      'zip' => $zip,
      'ciudad' => $ciudad,
      'pais' => $pais,
      'region' => $region,
      'numero' => $numero
    ]);

    if($sql2) {
      $msg = '<br />
          <div class="alert alert-success alert-dismissible" id="myAlert">
            <button type="button" class="close">&times;</button>
            <strong>Success!</strong> It has been inserted the user into the `pagos` table...
          </div>
      ';
      header("Refresh:2; url=pagos.php");
    } else {
      $msg = '<br />
          <div class="alert alert-danger alert-dismissible" id="myAlert">
            <button type="button" class="close">&times;</button>
            <strong>Error!</strong> It has ocurred an error...
          </div>
      ';
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

          <h1 class="h3 mb-4 text-gray-800">Panel - Insertar pago</h1>
          <?php 
            echo $msg;
          ?>
          <form action="insertar_pago.php" method="post">
            <label for="comment">Usuario: </label>
            <input type="text" name="usuario" class="form-control" required><br />


            <label for="comment">Budget: </label>
            <input type="text" name="budget" class="form-control" required><br />


            <label for="comment">Email: </label>
            <input type="text" name="email" class="form-control" required><br />


            <label for="comment">Direccion: </label>
            <input type="text" name="direccion" class="form-control" required><br />


            <label for="comment">Zip: </label>
            <input type="text" name="zip" class="form-control" required><br />


            <label for="comment">Ciudad: </label>
            <input type="text" name="ciudad" class="form-control" required><br />


            <label for="comment">Pais: </label>
            <input type="text" name="pais" class="form-control" required><br />


            <label for="comment">Region: </label>
            <input type="text" name="region" class="form-control" required><br />

            <label for="comment">Número de contacto: </label>
            <input type="text" name="numero" class="form-control" required><br />

            <input type="submit" class="form-control btn btn-success" value="Insertar"><br /><br />
          </form>


          <!-- TradingView Widget END -->


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
  <script type="text/javascript">
  $(document).ready(function(){
    $(".close").click(function(){
      $("#myAlert").alert("close");
    });
  });
  </script>
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