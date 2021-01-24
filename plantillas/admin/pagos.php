<?php
  ob_start();
  require('../../database.php');
  error_reporting(0);
  session_start();
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
  $query = $conn->prepare("SELECT * FROM pagos");
  $query->execute();
  $user1 = $query->fetchAll();
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

          <h1 class="h3 mb-4 text-gray-800">Panel - Users table</h1>
          
          <a href="insertar_pago.php" class="btn btn-success form-control"> Insertar nuevo pago</a>
          <hr />
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Budget</th>
                      <th>Direction</th>
                      <th>Zip code</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Region / State</th>
                      <th>Phone Number</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>User</th>
                      <th>Email</th>
                      <th>Date</th>
                      <th>Budget</th>
                      <th>Direction</th>
                      <th>Zip code</th>
                      <th>City</th>
                      <th>Country</th>
                      <th>Region / State</th>
                      <th>Phone Number</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                     <?php foreach($user1 as $u): ?>
                        <td>
                           <?php echo($u['user']); ?>
                        </td>
                        <td>
                           <?php echo($u['email']); ?>
                        </td>
                        <td>
                           <?php echo($u['fecha']); ?>
                        </td>
                        <td>
                          <?php echo($u['budget'].'$'); ?>
                        </td>
                        <td>
                          <?php echo($u['direccion']); ?>
                        </td>
                        <td>
                          <?php echo($u['zip']); ?>
                        </td>
                        <td>
                          <?php echo($u['ciudad']); ?>
                        </td>
                        <td>
                          <?php echo($u['pais']); ?>
                        </td>
                        <td>
                          <?php echo($u['region']); ?>
                        </td>
                        <td>
                          <?php echo($u['numero']); ?>
                        </td>
                      </tr>
                     <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
    $(document).ready(function() {
      $('.tabla').DataTable();
    });   

  </script>

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