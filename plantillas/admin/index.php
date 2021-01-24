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

          <h1 class="h3 mb-4 text-gray-800">Panel - Home</h1>


          <!-- TradingView Widget BEGIN -->
          <div class="tradingview-widget-container ">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
            "symbols": [
              {
                "proName": "OANDA:SPX500USD",
                "title": "S&P 500"
              },
              {
                "proName": "OANDA:NAS100USD",
                "title": "Nasdaq 100"
              },
              {
                "proName": "FX_IDC:EURUSD",
                "title": "EUR/USD"
              },
              {
                "proName": "BITSTAMP:BTCUSD",
                "title": "BTC/USD"
              },
              {
                "proName": "BITSTAMP:ETHUSD",
                "title": "ETH/USD"
              }
            ],
            "colorTheme": "light",
            "isTransparent": false,
            "displayMode": "adaptive",
            "locale": "es"
          }
            </script>
          </div>
          <!-- TradingView Widget END -->


          <!-- TradingView Widget BEGIN -->
          <div class="w3-container w3-cell">
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "NYSE:DAL",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#e3f2fd",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          </div>
          <!-- TradingView Widget END -->

          <!-- TradingView Widget BEGIN -->
          <div class="w3-container w3-cell">
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "JNUG",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#e3f2fd",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          </div>
          <!-- TradingView Widget END -->

          <div class="w3-container w3-cell">
          <!-- TradingView Widget BEGIN -->
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "CURRENCYCOM:CNK",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#E3F2FD",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          <!-- TradingView Widget END -->
          </div>

          <br />
          <!-- TradingView Widget BEGIN -->
          <div class="w3-container w3-cell">
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "CURRENCYCOM:NCLH",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#e3f2fd",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          </div>
          <!-- TradingView Widget END -->


          <!-- TradingView Widget BEGIN -->
          <div class="w3-container w3-cell">
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "NYSE:OHI",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#e3f2fd",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          </div>
          <!-- TradingView Widget END -->
          <div class="w3-container w3-cell">
          <!-- TradingView Widget BEGIN -->
          <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
            {
            "symbol": "NYSE:CCL",
            "width": 350,
            "height": 220,
            "locale": "es",
            "dateRange": "12m",
            "colorTheme": "light",
            "trendLineColor": "#37a6ef",
            "underLineColor": "#E3F2FD",
            "isTransparent": false,
            "autosize": false,
            "largeChartUrl": ""
          }
            </script>
          </div>
          <!-- TradingView Widget END -->
          </div>


          <!-- TradingView Widget BEGIN -->
          <div class="tradingview-widget-container">
            <div id="tradingview_7f5dc"></div>
            <div class="tradingview-widget-copyright"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
            <script type="text/javascript">
            new TradingView.widget(
            {
            "width": 980,
            "height": 610,
            "symbol": "NASDAQ:AAPL",
            "interval": "D",
            "timezone": "Etc/UTC",
            "theme": "light",
            "style": "1",
            "locale": "es",
            "toolbar_bg": "#f1f3f6",
            "enable_publishing": false,
            "allow_symbol_change": true,
            "container_id": "tradingview_7f5dc"
          }
            );
            </script>
          </div><br /><br /><br />
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