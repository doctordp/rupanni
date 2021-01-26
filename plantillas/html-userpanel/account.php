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
  } else {
    header('Location: ../../');
  }

?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Softnio">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="ICO Crypto is a modern and elegant landing page, created for ICO Agencies and digital crypto currency investment website.">
	<!-- Fav Icon  -->
	<link rel="shortcut icon" href="images/favicon.png">
	<!-- Site Title  -->
	<title>Account Covidtrade</title>
	<!-- Vendor Bundle CSS -->
	<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=101">
	<!-- Custom styles for this template -->
	<link rel="stylesheet" href="assets/css/style.css?ver=101">
	
</head>

<body class="user-dashboard">
    
    
<div class="topbar">
        <div class="topbar-md d-lg-none">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="#" class="toggle-nav">
                        <div class="toggle-icon">
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                            <span class="toggle-line"></span>
                        </div>
                    </a><!-- .toggle-nav -->

                    <div class="site-logo">
                        <a href="./index.php" class="site-brand">
                            <img src="images/logo.png" alt="logo" srcset="images/logo2x.png 2x">
                        </a>
                    </div><!-- .site-logo -->
                    
                    <div class="dropdown topbar-action-item topbar-action-user">
                        <a href="#" data-toggle="dropdown"> <img class="icon" src="images/user-thumb-sm.png" alt="thumb"> </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="user-dropdown">
                                <div class="user-dropdown-head">
                                    <h6 class="user-dropdown-name"><?php echo($user['nombre_completo']); ?><!-- <span>(IXIA1A105)</span> --></h6>
                                    <span class="user-dropdown-email"><?php echo ($user['email']); ?></span>
                                </div>
                                <!-- <div class="user-dropdown-balance">
                                    <h6>ICO TOKEN BALANCE</h6>
                                    <h3>120,000,000 IC0X</h3>
                                    <ul>
                                        <li>1.240 BTC</li>
                                        <li>19.043 ETH</li>
                                        <li>6,500.13 USD</li>
                                    </ul>
                                </div> -->
                               <!--  <ul class="user-dropdown-btns btn-grp guttar-10px">
                                    <li><a href="#" class="btn btn-xs btn-warning">Confirm Email</a></li>
                                    <li><a href="./kyc.php" class="btn btn-xs btn-warning">KYC Pending</a></li>
                                </ul> -->
                                <div class="gaps-1x"></div>
                                <ul class="user-dropdown-links">
                                    <li><a href="./account.php"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                    <li><a href="./security.php"><i class="ti ti-lock"></i>Security</a></li>
                                    <li><a href="./activity.php"><i class="ti ti-eye"></i>Activity</a></li>
                                </ul>
                                <ul class="user-dropdown-links">
                                    <li><a href="../../logout.php"><i class="ti ti-power-off"></i>Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- .toggle-action -->
                </div><!-- .container -->
            </div><!-- .container -->
        </div><!-- .topbar-md -->
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div class="topbar-lg d-none d-lg-block">
                    <div class="site-logo">
                        <a href="./index.php" class="site-brand">
                            <img src="images/logo.png" alt="logo" srcset="images/logo2x.png 2x">
                        </a>
                    </div><!-- .site-logo -->
                </div><!-- .topbar-lg -->

                <div class="topbar-action d-none d-lg-block">
                    <ul class="topbar-action-list">
                        <li class="topbar-action-item topbar-action-link">
                            <a href="./index.php"><em class="ti ti-home"></em> Go to main site</a>
                        </li><!-- .topbar-action-item -->

                        <!-- <li class="dropdown topbar-action-item topbar-action-language">
                            <a href="#" data-toggle="dropdown"> EN <em class="ti ti-angle-down"></em> </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">FR</a></li>
                                <li><a href="#">JY</a></li>
                                <li><a href="#">CH</a></li>
                            </ul>
                        </li> --><!-- .topbar-action-item -->

                        <li class="dropdown topbar-action-item topbar-action-user">
                            <a href="#" data-toggle="dropdown"> <img class="icon" src="images/user-thumb-sm.png" alt="thumb"> </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="user-dropdown">
                                    <div class="user-dropdown-head">
                                        <h6 class="user-dropdown-name"><?php echo($user['nombre_completo']); ?><!-- <span>(IXIA1A105)</span>--></h6>
                                        <span class="user-dropdown-email"><?php echo ($user['email']); ?></span>
                                    </div>
                                   <!--  <div class="user-dropdown-balance">
                                        <h6>ICO TOKEN BALANCE</h6>
                                        <h3>120,000,000 IC0X</h3>
                                        <ul>
                                            <li>1.240 BTC</li>
                                            <li>19.043 ETH</li>
                                            <li>6,500.13 USD</li>
                                        </ul>
                                    </div> -->
                                    <ul class="user-dropdown-links">
                                        <li><a href="./account.php"><i class="ti ti-id-badge"></i>My Profile</a></li>
                                        <li><a href="./security.php"><i class="ti ti-lock"></i>Security</a></li>
                                        <!-- <li><a href="./activity.php"><i class="ti ti-eye"></i>Activity</a></li> -->
                                    </ul>
                                    <ul class="user-dropdown-links">
                                        <li><a href="../../logout.php"><i class="ti ti-power-off"></i>Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li><!-- .topbar-action-item -->
                    </ul><!-- .topbar-action-list -->
                </div><!-- .topbar-action -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- TopBar End -->
    
    
    <div class="user-wraper">
        <div class="container">
            <div class="d-flex">
            <div class="user-sidebar">
                    <div class="user-sidebar-overlay"></div>
                    <div class="user-box d-none d-lg-block">
                        <div class="user-image">
                            <img src="images/user-thumb-lg.png" alt="thumb">
                        </div>
                        <h6 class="user-name"><?php echo($user['nombre_completo']); ?></h6>
<!--                         <div class="user-uid">Unique ID: <span>IXIA1A105</span></div>
 -->                        <ul class="btn-grp guttar-10px"><!-- 
                            <li><a href="#" class="btn btn-xs btn-warning">Confirm Email</a></li>
                            <li><a href="./kyc.php" class="btn btn-xs btn-warning">KYC Pending</a></li> -->
                        </ul>
                    </div><!-- .user-box -->
                    <ul class="user-icon-nav">
                        <li><a href="./index.php"><em class="ti ti-dashboard"></em>Dashboard</a></li>
                        <li><a href="./kyc.php"><em class="ti ti-files"></em>KYC Application</a></li>
                        <li><a href="./tokens.php"><em class="ti ti-pie-chart"></em>Invest Now!</a></li>
                        <li><a href="./transactions.php"><em class="ti ti-control-shuffle"></em>Transactions</a></li>
                        <li><a href="./referrals.php"><em class="ti ti-infinite"></em>Referral</a></li>
                        <li><a href="./account.php"><em class="ti ti-user"></em>Account</a></li>
                        <li><a href="./security.php"><em class="ti ti-lock"></em>Security</a></li>
                    </ul><!-- .user-icon-nav -->
                    <div class="user-sidebar-sap"></div><!-- .user-sidebar-sap -->
                    <ul class="user-nav">
                        <li><a href="how-to.html">How to buy?</a></li>
                        <li><a href="../main-html/page-faq.php">Faqs</a></li>
                        <li><a href="#">Whitepaper</a></li>
                        <li>Contact Support<span>info@icocrypto.com</span></li>
                    </ul><!-- .user-nav -->
                    <div class="d-lg-none">
                        <div class="user-sidebar-sap"></div>
                        <div class="gaps-1x"></div>
                        <ul class="topbar-action-list">
                            <li class="topbar-action-item topbar-action-link">
                                <a href="./index.php"><em class="ti ti-home"></em> Go to main site</a>
                            </li><!-- .topbar-action-item -->
                            <!-- <li class="dropup topbar-action-item topbar-action-language">
                                <a href="/" data-toggle="dropdown" aria-haspopup="true"> EN <em class="ti ti-angle-up"></em> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">FR</a></li>
                                    <li><a href="#">JY</a></li>
                                    <li><a href="#">CH</a></li>
                                </ul>
                            </li -->><!-- .topbar-action-item -->
                        </ul><!-- .topbar-action-list -->
                    </div>
                </div><!-- .user-sidebar -->
                
                <div class="user-content">
                    <div class="user-panel">
                        <h2 class="user-panel-title">Account Information</h2>
                        <!-- <div class="alert-box alert-primary">
                            <div class="alert-txt"><em class="ti ti-alert"></em>Confirm your email address</div>
                            <a href="#" class="btn btn-sm btn-primary">Resend Email</a>
                        </div> --><!-- .alert-box -->
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal-data">Personal Data</a>
                            </li><!-- 
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#wallet-address">Wallet Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#notification">Notification</a>
                            </li> -->
                        </ul><!-- .nav-tabs-line -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="personal-data">
                                <form action="#">
                                    <div class="input-item input-with-label">
                                        <label for="full-name" class="input-item-label">Full Name</label>
                                        <input class="input-bordered" type="text" id="full-name" name="full-name" placeholder="<?php echo($user['nombre_completo']);?>" readonly>
                                    </div><!-- .input-item -->
                                    <!-- <div class="input-item input-with-label">
                                        <label for="sur-name" class="input-item-label">Surname</label>
                                        <input class="input-bordered" type="text" id="sur-name" name="sur-name">
                                    </div> --><!-- .input-item -->
                                    <div class="input-item input-with-label">
                                        <label for="email-address" class="input-item-label">Email Address</label>
                                        <input readonly class="input-bordered" type="text" id="email-address" name="email-address" placeholder="<?php echo($user['email']);?>">
                                    </div>
                                    <!-- .input-item -->
                                    <!--<div class="input-item input-with-label">
                                        <label for="mobile-number" class="input-item-label">Mobile Number</label>
                                        <input class="input-bordered" type="text" id="mobile-number" name="mobile-number">
                                    </div> --><!-- .input-item -->
                                    <div class="row">
                                       <!--  <div class="col-md-6">
                                            <div class="input-item input-with-label">
                                                <label for="date-of-birth" class="input-item-label">Date of Birth</label>
                                                <input class="input-bordered date-picker" type="text" id="date-of-birth" name="date-of-birth">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-item input-with-label">
                                                <label for="nationality" class="input-item-label">Nationality</label>
                                                <select class="country-select" name="Nationality" id="Nationality">
                                                    <option value="us">United State</option>
                                                    <option value="uk">United KingDom</option>
                                                    <option value="fr">France</option>
                                                    <option value="ch">China</option>
                                                    <option value="cr">Czech Republic</option>
                                                    <option value="cb">Colombia</option>
                                                </select>
                                            </div>
                                        </div> -->
                                    </div><!-- .row -->
                                    <div class="gaps-1x"></div><!-- 10px gap -->
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary">Update</button>
                                        <div class="gaps-2x d-sm-none"></div>
                                        <!-- <span class="color-success"><em class="ti ti-check-box"></em> All Changes are saved</span> -->
                                    </div>
                                </form><!-- form -->
                            </div><!-- .tab-pane -->
                            <div class="tab-pane fade" id="wallet-address">
                                <p>In order to receive your ICOX Tokens, please select your wallet addres and you have to put the address below input box. You will receive ICOX tokens to this address after the Token Sale end.</p>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item input-with-label">
                                                <label for="swalllet" class="input-item-label">Select Wallet </label>
                                                <select class="input-bordered" name="swalllet" id="swalllet">
                                                    <option value="eth">Ethereum</option>
                                                    <option value="dac">DashCoin</option>
                                                    <option value="bic">BitCoin</option>
                                                </select>
                                            </div><!-- .input-item -->
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                    <div class="input-item input-with-label">
                                        <label for="token-address" class="input-item-label">Your Address for tokens:</label>
                                        <input class="input-bordered" type="text" id="token-address" name="token-address" value="0xde0b295669a9fd93d5f28d9ec85e40f4cb697bae">
                                        <span class="input-note">Note: Address should be ERC20-compliant.</span>
                                    </div><!-- .input-item -->
                                    <div class="gaps-2x"></div>
                                    <div class="note note-plane note-danger">
                                        <em class="fas fa-info-circle"></em>
                                        <p>DO NOT USE your exchange wallet address such as Kraken, Bitfinex, Bithumb, Binance etc. You can use MetaMask, MayEtherWallet, Mist wallets etc. Do not use the address if you don’t have a private key of the your address. You WILL NOT receive ICOX Tokens and WILL LOSE YOUR FUNDS if you do.</p>
                                    </div>
                                    <div class="gaps-3x"></div>
                                    <div class="gaps-1x"></div><!-- 10px gap -->
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <button class="btn btn-primary">Update</button>
                                        <div class="gaps-2x d-sm-none"></div>
                                        <span class="color-success"><em class="ti ti-check-box"></em> Saved your wallet address</span>
                                    </div>
                                </form><!-- form -->
                            </div><!-- .tab-pane -->
                            <div class="tab-pane fade" id="notification">
                                <p>You can manage your all kind of notification from here.</p>
                                <div class="gaps-1x"></div>
                                <ul class="notification-list">
                                    <li>
                                        <span>Notify me by email about resumption of sales</span>
                                        <div class="padl-2x"><input class="input-switch" type="checkbox" id="rsmpts"><label for="rsmpts"></label></div>
                                    </li>
                                    <li>
                                        <span>Notify me by email for latest news</span>
                                        <div class="padl-2x"><input class="input-switch" type="checkbox" checked id="lnews"><label for="lnews"></label></div>
                                    </li>
                                    <li>
                                        <span>Alert me by email for unusual activity.</span>
                                        <div class="padl-2x"><input class="input-switch" type="checkbox" checked id="unuact"><label for="unuact"></label></div>
                                    </li>
                                </ul>
                                <div class="gaps-4x"></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span></span>
                                    <span class="color-success"><em class="ti ti-check-box"></em> Update Notification Settings</span>
                                </div>
                            </div><!-- .tab-pane -->
                        </div><!-- .tab-content -->
                    </div><!-- .user-panel -->
                </div><!-- .user-content -->
            </div><!-- .d-flex -->
        </div><!-- .container -->
    </div>
    <!-- UserWraper End -->
    
    
    <div class="footer-bar">
        <div class="container">
            <!-- <div class="row">
                <div class="col-md-7">
                    <span class="footer-copyright">Copyright 2018, <a href="#">ICO Crypto</a>.  All Rights Reserved.</span>
                </div>
                <div class="col-md-5 text-md-right">
                    <ul class="footer-links">
                        <li><a href="policy.html">Privacy Policy</a></li>
                        <li><a href="policy.html">Terms of Sales</a></li>
                    </ul>
                </div>
            </div> -->
        </div><!-- .container -->
    </div>
    <!-- FooterBar End -->
    
    
	<!-- JavaScript (include all script here) -->
	<script src="assets/js/jquery.bundle.js?ver=101"></script>
	<script src="assets/js/script.js?ver=101"></script>
</body>
</html>
