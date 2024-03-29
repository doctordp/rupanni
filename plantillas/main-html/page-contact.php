<?php
  header('Content-Type: text/html; charset=UTF-8');
  require('../../database.php');

  $msg = null;
  $titulo = null;
  $contenido = null;
  $email = null;
  $nombre = null;
  $fecha = null;
  $estado = null;

  function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890axbyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
  }

  // echo '#'. $user['id']. '+' . generarCodigo(rand(7,10)) . '#';

  if(isset($_POST['nombre'], $_POST['contenido'])){

    $titulo = "Consulta no cliente";
    $contenido = strip_tags($_POST['contenido']);

   

      $ticket = '#'. $user['id']. '!' . generarCodigo(rand(7,10)) . '#';

      $email = strip_tags($_POST['email']);
      $estado = strip_tags("1");
      $fecha = date('d-m-Y', time());
      $nombre_completo = strip_tags($_POST['nombre']);

      if(isset($_POST['contenido']) && isset($_POST['nombre']) && isset($_POST['email'])){
        $query = $conn->prepare("INSERT INTO soporte (titulo, contenido, email, nombre_completo, fecha, ticket, estado) VALUES(:titulo, :contenido, :email, :nombre_completo, :fecha, :ticket, :estado)");
        $query->execute([
            'titulo' => $titulo,
            'contenido' => $contenido,
            'email' => $email,
            'nombre_completo' => $nombre_completo,
            'fecha' => $fecha,
            'ticket' => $ticket,
            'estado' => $estado
        ]);
        if($query){
            $msg = '<br />
            <div class="alert alert-success alert-dismissible" id="myAlert">
                <button type="button" class="close">&times;</button>
                <strong>Success!</strong> It has been opened a new ticket. Thank you for contacting us.
            </div>
            ';

        } else {
            $msg = '<br />
            <div class="alert alert-danger alert-dismissible" id="myAlert">
                <button type="button" class="close">&times;</button>
                <strong>Error!</strong> An error has ocurred while creating the ticket.
            </div>
            ';    
        }
      }else{
        $msg = '<br />
        <div class="alert alert-danger alert-dismissible" id="myAlert">
            <button type="button" class="close">&times;</button>
            <strong>Error!</strong> Fill in all the fields.
        </div>
        ';    
      }

      
     

  }

?>
<!DOCTYPE html>
<html lang="zxx" class="js">
<head>
	<meta charset="utf-8">
<meta name="author" content="Softnio">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<!-- Fav Icon  -->
<link rel="shortcut icon" href="images/favicon.png">
<!-- Site Title  -->
<title>Page Contact | ICO Crypto - ICO Landing Page &amp; Multi-Purpose Cryptocurrency HTML Template</title>
<!-- Bundle and Base CSS -->
<link rel="stylesheet" href="assets/css/vendor.bundle.css?ver=192">
<link rel="stylesheet" href="assets/css/style.css?ver=192" id="changeTheme">
<!-- Extra CSS -->
<link rel="stylesheet" href="assets/css/theme.css?ver=192">




</head>
    


    <body class="nk-body body-wider bg-dark">


	<div class="nk-wrap">
		<header class="nk-header page-header is-transparent is-sticky is-shrink" id="header">
		    <!-- Header @s -->
			<div class="header-main">
				<div class="header-container container">
					<div class="header-wrap">
						<!-- Logo @s -->
						<div class="header-logo logo animated" data-animate="fadeInDown" data-delay=".6">
							<a href="./index-crocus-multi.php" class="logo-link">
								<img class="logo-dark" src="images/logo.png" srcset="images/logo2x.png 2x" alt="logo">
								<img class="logo-light" src="images/logo-full-white.png" srcset="images/logo-full-white2x.png 2x" alt="logo">
							</a>
						</div>

						<!-- Menu Toogle @s -->
						<div class="header-nav-toggle">
							<a href="#" class="navbar-toggle" data-menu-toggle="header-menu">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
						</div>

						<!-- Menu @s -->
						<div class="header-navbar animated" data-animate="fadeInDown" data-delay=".75">
							<nav class="header-menu" id="header-menu">
    <ul class="menu">
    <li class="menu-item">
        <a class="menu-link nav-link" href="./index-crocus-multi.php">Home</a>
        <!-- <div class="menu-sub menu-drop menu-mega menu-mega-3clmn">
            <div class="menu-mega-innr">
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="index-azalea.html">Azalea Dark<span class="badge badge-xs badge-light">v1.6</span></a></li>
                    <li class="menu-item"><a href="index-azalea-multi.html">Azalea Multi<span class="badge badge-xs badge-light">v1.6</span></a></li> 
                    <li class="menu-item"><a href="index-gentian.html">Gentian Dark<span class="badge badge-xs badge-light">v1.5</span></a></li>
                    <li class="menu-item"><a href="index-gentian-pro.html">Gentian Pro<span class="badge badge-xs badge-light">v1.5</span></a></li>
                    <li class="menu-item"><a href="index-gentian-multi.html">Gentian Multi<span class="badge badge-xs badge-light">v1.5</span></a></li>
                    <li class="menu-item"><a href="index-zinnia.html">Zinnia Pro</a></li>
                    <li class="menu-item"><a href="index-salvia.html">Salvia Pro</a></li>
                </ul>
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="index-lungwort.html">Lungwort Dark</a></li>
                    <li class="menu-item"><a href="index-jasmine.html">Jasmine Light</a></li>
                    <li class="menu-item"><a href="index-lobelia.html">Lobalia Dark</a></li>
                    <li class="menu-item"><a href="index-muscari.html">Muscari Pro</a></li>
                    <li class="menu-item"><a href="index-lavender.html">Lavender Pro</a></li>
                    <li class="menu-item"><a href="index-azure-pro.html">Azure Pro</a></li>
                    <li class="menu-item"><a href="index-azure.html">Azure Dark</a></li>
                </ul>
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="index-dark-pro.html">Default Dark Pro</a></li>
                    <li class="menu-item"><a href="index-light.html">Default Light</a></li>
                    <li class="menu-item"><a href="index-dark.html">Default Dark</a></li>
                    <li class="menu-item"><a href="index-linum-wallet.html">Linum Wallet<span class="badge badge-xs badge-light">v1.8</span></a></li>
                    <li class="menu-item"><a href="index-flax-wallet.html">Flax Wallet<span class="badge badge-xs badge-light">v1.8</span></a></li>
                    <li class="menu-item"><a href="index-crocus-multi.html">Crocus Multi<span class="badge badge-xs badge-light">v1.9</span></a></li>
                    <li class="menu-item"><a href="index-cyanus-multi.html">Cyanus Multi<span class="badge badge-xs badge-info">NEW</span></a></li>
                </ul> 
            </div>
        </div> -->
    </li>
    <li class="menu-item">
        <a class="menu-link nav-link" href="./page-about-v2.php">About Us</a>
        <!-- <ul class="menu-sub menu-drop menu-mega menu-mega-2clmn">
            <div class="menu-mega-innr">
                <ul class="menu-mega-list">
                    <li class="menu-item"><a class="menu-link nav-link" href="page-about.html">About Us - Base</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-about-v2.html">About Us - Linum</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-about-v3.html">About Us - Cyanus<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-team.html">Our Teams</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets.html">Wallets -v1</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-wallets-v2.html">Wallets -v2</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-features.html">Features</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-token-sale.html">Token Sale</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-roadmap.html">Roadmap</a></li>
                </ul>
                <ul class="menu-mega-list">
                    <li class="menu-item"><a class="menu-link nav-link" href="page-download.html">Download</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-faq.html">FAQs</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-contact.html">Contact - Base</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-contact-v2.html">Contact - Cyanus<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-exchange.html">Exchange - Cyanus<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-partner.html">Partner - Cyanus<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-mission.html">Mission - Cyanus<span class="badge badge-dot"></span></a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-career.html">Career - Cyanus<span class="badge badge-dot"></span></a></li>
                </ul>
            </div>
        </ul> -->
    </li>
     <li class="menu-item">
     <a class="menu-link nav-link" href="./blog-3clmn.php">Notices</a>
       <!-- <ul class="menu-sub menu-drop">
            <li class="menu-item has-sub">
                <a class="menu-link nav-link menu-toggle" href="#">Blog Pages</a>
                <ul class="menu-sub menu-drop">
                    <li class="menu-item"><a class="menu-link nav-link" href="blog-3clmn.html">Blog 3 Column</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="blog-sidebar-left.html">Blog Sidebar - Left</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="blog-sidebar-right.html">Blog Sidebar - Right</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="blog-details.html">Blog Single - Sidebar</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="blog-details-full.html">Blog Single - Full Width</a></li>
                </ul>
            </li>
            <li class="menu-item has-sub">
                <a class="menu-link nav-link menu-toggle" href="#">Ath Pages</a>
                <ul class="menu-sub menu-drop">
                    <li class="menu-item"><a class="menu-link nav-link" href="page-login.html">Login - v1</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-register.html">Register - v1</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-reset.html">Reset - v1</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-login-v2.html">Login - v2</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-register-v2.html">Register - v2</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="page-reset-v2.html">Reset - v2</a></li>
                </ul>
            </li>
            <li class="menu-item has-sub">
                <a class="menu-link nav-link menu-toggle" href="#">Coming Soon<span class="badge badge-xs badge-info">NEW</span></a>
                <ul class="menu-sub menu-drop">
                    <li class="menu-item"><a class="menu-link nav-link" href="coming-soon-azalea.html" target="_blank">Coming Soon - Azalea</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="coming-soon-gentian.html" target="_blank">Coming Soon - Gentian</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="coming-soon-gentian-alt.html" target="_blank">Coming Soon - Gentian Alt</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="coming-soon-dark.html" target="_blank">Coming Soon - Dark</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="coming-soon-light.html" target="_blank">Coming Soon - Light</a></li>
                </ul>
            </li>
            <li class="menu-item has-sub">
                <a class="menu-link nav-link menu-toggle" href="#">Error 404<span class="badge badge-xs badge-info">NEW</span></a>
                <ul class="menu-sub menu-drop">
                    <li class="menu-item"><a class="menu-link nav-link" href="error-404-gentian.html" target="_blank">404 - Gentian</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="error-404-gentian-alt.html" target="_blank">404 - Gentian Alt</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="error-404-azalea.html" target="_blank">404 - Azalea</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="error-404-dark.html" target="_blank">404 - Dark</a></li>
                    <li class="menu-item"><a class="menu-link nav-link" href="error-404-light.html" target="_blank">404 - Light</a></li>
                </ul>
            </li>
        </ul> -->
    </li> 
    <li class="menu-item">
        <a class="menu-link nav-link" href="./page-faq.php">FAQ</a>
        <!-- <div class="menu-sub menu-drop menu-mega menu-mega-2clmn">
            <div class="menu-mega-innr">
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="element-alert.html">Alert</a></li>
                    <li class="menu-item"><a href="element-button.html">Buttons</a></li>
                    <li class="menu-item"><a href="element-content.html">Contents</a></li>
                    <li class="menu-item"><a href="element-table.html">Tables</a></li>
                    <li class="menu-item"><a href="element-video.html">Videos</a></li>
                    <li class="menu-item"><a href="element-typography.html">Typography</a></li>
                    <li class="menu-item"><a href="element-progress-bar.html">Progress Bar</a></li>
                    <li class="menu-item"><a href="element-form.html">Form Elements</a></li>
                    <li class="menu-item"><a href="element-icon.html">Custom Icons<span class="badge badge-xs badge-info">v1.6.2</span></a></li>
                </ul>
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="element-tab.html">Tabs</a></li>
                    <li class="menu-item"><a href="element-grid.html">Grids</a></li>
                    <li class="menu-item"><a href="element-color.html">Colors</a></li>
                    <li class="menu-item"><a href="element-modal.html">Modals</a></li>
                    <li class="menu-item"><a href="element-chart.html">Charts</a></li>
                    <li class="menu-item"><a href="element-notification.html">Notification</a></li>
                    <li class="menu-item"><a href="element-countdown.html">Countdown</a></li>
                    <li class="menu-item"><a href="element-accordion.html">Accordions</a></li>
                </ul>
            </div>
        </div> -->
    </li>
    <!-- <li class="menu-item has-sub">
        <a class="menu-link nav-link menu-toggle" href="#">Blocks</a>
        <div class="menu-sub menu-drop menu-mega menu-mega-2clmn">
            <div class="menu-mega-innr">
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="block-navbar.html">Navbar</a></li>
                    <li class="menu-item"><a href="block-page-header.html">Page Header</a></li>
                    <li class="menu-item"><a href="block-footer.html">Footer</a></li>
                    <li class="menu-item"><a href="block-team.html">Team</a></li>
                    <li class="menu-item"><a href="block-banner.html">Banner <span class="badge badge-xs badge-hot">Hot</span></a></li>
                    <li class="menu-item"><a href="block-faq.html">FAQs</a></li>
                    <li class="menu-item"><a href="block-subscribe.html">Subscribe</a></li>
                </ul>
                <ul class="menu-mega-list">
                    <li class="menu-item"><a href="block-roadmap.html">Roadmaps</a></li>
                    <li class="menu-item"><a href="block-partner.html">Partners</a></li>
                    <li class="menu-item"><a href="block-token-info.html">Token Info</a></li>
                    <li class="menu-item"><a href="block-feature-card.html">Features Card</a></li>
                    <li class="menu-item"><a href="block-feature-panel.html">Features Panel</a></li>
                    <li class="menu-item"><a href="block-ath.html">Login / Register</a></li>
                    <li class="menu-item"><a href="block-contact.html">Contact</a></li>
                </ul>
            </div>
        </div>
    </li>-->
</ul>

    <ul class="menu-btns">
        <li><a href="../html-userpanel/login.php" class="btn btn-md btn-auto btn-grad no-change"><span>Login</span></a></li>
    </ul>
</nav>
						</div><!-- .header-navbar @e -->
					</div>                                                
				</div>
			</div><!-- .header-main @e -->

			<!-- Banner @s -->
			<!-- <div class="header-banner bg-theme-grad">
				<div class="nk-banner">
				    <div class="banner banner-page">
				        <div class="banner-wrap">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-lg-9">
                                        <div class="banner-caption cpn tc-light text-center">
                                            <div class="cpn-head">
                                                <h2 class="title ttu">Contact</h2>
                                                <p>We designed a brand-new cool design and lots of features, the latest version of the template supports advanced block base scenarios, and more.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				    </div>
				</div> --><!-- .nk-banner -->
				<div class="nk-ovm shape-a-sm"></div>
			</div>
			<!-- .header-banner @e -->
		</header>
    
        <main class="nk-pages">
            <section class="section section-contact bg-transparent">
            <div class="tab-content nk-preview-content">
                    <div class="tab-pane fade show active" id="contact-default-04">
                        <!-- Copy from here -->
                        <section class="section section-contact bg-white ov-h">
                            <div class="container">
                                <!-- Block @s -->
                                <div class="nk-block block-contact">
                                    <div class="row justify-content-center gutter-vr-30px">
                                        <div class="col-lg-3">
                                            <div class="section-head section-head-sm section-head-s9 text-center text-lg-left">
                                                <h6 class="title title-xs title-s1 tc-primary">Contact</h6>
                                                <h2 class="title">Contact</h2>
                                                <div class="">
                                                    <p>Any question? Reach out to us and we’ll get back to you shortly.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <ul class="contact-list contact-list-s2">
                                                    <li>
                                                        <em class="contact-icon fas fa-phone"></em>
                                                        <div class="contact-text">
                                                            <span>+1 (302) 585-0930</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-envelope"></em>
                                                        <div class="contact-text">
                                                            <span>support@rupanisolutions.com</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-paper-plane"></em>
                                                        <div class="contact-text">
                                                            <span>16192 Coastal Hwy Lewes, DE 19958</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 offset-lg-1">
                                            <div class="gap-6x d-none d-lg-block"></div>
                                            <div class="gap-4x d-none d-lg-block"></div>
                                            <!-- <form class="contact-form nk-form-submit" action="./page-contact.php" method="post" novalidate="validate">
                                                <div class="field-item field-item-s2">
                                                    <input name="nombre" type="text" class="input-bordered required" placeholder="Your Name">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <input name="email" type="email" class="input-bordered required email" placeholder="Your Email">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <textarea name="contenido" class="input-bordered input-textarea required" placeholder="Your Message"></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-s2 btn-md btn-grad">Submit</button>
                                                    </div>
                                                </div>
                                            </form> -->
                                            <form class="contact-form" action=" " method="post">
                                                <div class="field-item field-item-s2">
                                                    <input name="nombre" type="text" class="input-bordered required" placeholder="Your Name">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <input name="email" type="email" class="input-bordered required email" placeholder="Your Email">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <textarea name="contenido" class="input-bordered input-textarea required" placeholder="Your Message" value=" "></textarea>
                                                </div>

                                                <div class="row">
                                                
                                                </div><!-- .row -->
                                                <div class="gaps-1x"></div><!-- 10px gap -->
                                                <div class="d-sm-flex justify-content-between align-items-center">
                                                <button type="submit" class="btn btn-s2 btn-md btn-grad">Submit</button>                                                    <div class="gaps-2x d-sm-none"></div>
                                                    <!-- <span class="color-success"><em class="ti ti-check-box"></em> All Changes are saved</span> -->
                                                </div>
                                            </form>
                                            <div><?php echo($msg);?></div>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 align-self-center">
                                            <div class="nk-block-img">
                                                <img src="images/gfx/gfx-q.png" alt="lungwort">
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .block @e -->
                            </div>
                        </section>
                        <!-- Stop here -->
                    </div>
                    <div class="tab-pane fade" id="contact-theme-04">
                        <!-- Copy from here -->
                        <section class="section section-contact bg-theme tc-light ov-h">
                            <div class="container">
                                <!-- Block @s -->
                                <div class="nk-block block-contact">
                                    <div class="row justify-content-center gutter-vr-30px">
                                        <div class="col-lg-3">
                                            <div class="section-head section-head-sm section-head-s9 text-center text-lg-left">
                                                <h6 class="title title-xs title-s1 tc-primary">Contact</h6>
                                                <h2 class="title">Get In Touch</h2>
                                                <div class="">
                                                    <p>Any question? Reach out to us and we’ll get back to you shortly.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <ul class="contact-list contact-list-s2">
                                                    <li>
                                                        <em class="contact-icon fas fa-phone"></em>
                                                        <div class="contact-text">
                                                            <span>+44 0123 4567</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-envelope"></em>
                                                        <div class="contact-text">
                                                            <span>info@company.com</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-paper-plane"></em>
                                                        <div class="contact-text">
                                                            <span>Join us on Telegram</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 offset-lg-1">
                                            <div class="gap-6x d-none d-lg-block"></div>
                                            <div class="gap-4x d-none d-lg-block"></div>
                                            <form class="contact-form nk-form-submit" action="form/contact.php" method="post">
                                                <div class="field-item field-item-s2">
                                                    <input name="contact-name" type="text" class="input-bordered required" placeholder="Your Name">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <input name="contact-email" type="email" class="input-bordered required email" placeholder="Your Email">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <textarea name="contact-message" class="input-bordered input-textarea required" placeholder="Your Message"></textarea>
                                                </div>
                                                <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-s2 btn-md btn-grad">Submit</button>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-results"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 align-self-center">
                                            <div class="nk-block-img">
                                                <img src="images/gfx/gfx-q.png" alt="lungwort">
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .block @e -->
                            </div>
                        </section>
                        <!-- Stop here -->
                    </div>
                    <div class="tab-pane fade" id="contact-image-04">
                        <!-- Copy from here -->
                        <section class="section section-contact tc-light ov-h">
                            <div class="container">
                                <!-- Block @s -->
                                <div class="nk-block block-contact">
                                    <div class="row justify-content-center gutter-vr-30px">
                                        <div class="col-lg-3">
                                            <div class="section-head section-head-sm section-head-s9 text-center text-lg-left">
                                                <h6 class="title title-xs title-s1 tc-primary">Contact</h6>
                                                <h2 class="title">Get In Touch</h2>
                                                <div class="">
                                                    <p>Any question? Reach out to us and we’ll get back to you shortly.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column justify-content-between h-100">
                                                <ul class="contact-list contact-list-s2">
                                                    <li>
                                                        <em class="contact-icon fas fa-phone"></em>
                                                        <div class="contact-text">
                                                            <span>+44 0123 4567</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-envelope"></em>
                                                        <div class="contact-text">
                                                            <span>info@company.com</span>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <em class="contact-icon fas fa-paper-plane"></em>
                                                        <div class="contact-text">
                                                            <span>Join us on Telegram</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 offset-lg-1">
                                            <div class="gap-6x d-none d-lg-block"></div>
                                            <div class="gap-4x d-none d-lg-block"></div>
                                            <form class="contact-form nk-form-submit" action="form/contact.php" method="post">
                                                <div class="field-item field-item-s2">
                                                    <input name="contact-name" type="text" class="input-bordered required" placeholder="Your Name">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <input name="contact-email" type="email" class="input-bordered required email" placeholder="Your Email">
                                                </div>
                                                <div class="field-item field-item-s2">
                                                    <textarea name="contact-message" class="input-bordered input-textarea required" placeholder="Your Message"></textarea>
                                                </div>
                                                <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-s2 btn-md btn-grad">Submit</button>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-results"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .col -->
                                        <div class="col-lg-4 align-self-center">
                                            <div class="nk-block-img">
                                                <img src="images/gfx/gfx-q.png" alt="lungwort">
                                            </div>
                                        </div><!-- .col -->
                                    </div><!-- .row -->
                                </div><!-- .block @e -->
                            </div>
                            <div class="bg-image" data-overlay="theme" data-opacity="95">
                                <img src="images/bg/bg-a.jpg" alt="background">
                            </div>
                        </section>
                        <!-- Stop Here -->
                    </div>
                </div>
    

			</section>
        </main>

		<footer class="nk-footer bg-theme-grad">
            <!-- <section class="section no-pdy section-contact bg-transparent">
			
				<div class="container">
					<div class="nk-block block-contact">
                        <div class="row justify-content-center no-gutters">
                            <div class="col-lg-8">
                                <div class="subscribe-wrap bg-grad tc-light round">
                                    <div class="section-head section-head-sm wide-auto-sm text-center">
                                        <h4 class="title title-sm">Don’t miss out, Be the first to know</h4>
                                        <p class="text-white">Get notified about the details of the Token Sale in May, as well as other important development update.</p>
                                    </div>
                                    <form action="form/subscribe.php" class="nk-form-submit" method="post">
                                        <div class="field-inline field-inline-s2 bg-white shadow-soft">
                                            <div class="field-wrap">
                                                <input class="input-solid required email" type="text" name="contact-email" placeholder="Enter your email">
                                                <input type="text" class="d-none" name="form-anti-honeypot" value="">
                                            </div>
                                            <div class="submit-wrap">
                                                <button class="btn btn-secondary">Let Me Join</button>
                                            </div>
                                        </div>
                                        <div class="form-results"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
				
				<div class="nk-ovm ovm-top ovm-h-50 bg-light"></div>
				
			</section> -->
			<!-- // -->
			<section class="section section-footer tc-light bg-transparent">
			
				<div class="container">
				    <!-- Block @s -->
					<div class="nk-block block-footer">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                <div class="wgs wgs-menu">
                                    <h6 class="wgs-title">Company</h6>
                                    <div class="wgs-body">
                                        <ul class="wgs-links">
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Meet Our Team</a></li>
                                            <li><a href="#">Advisors</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="#">Insights</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                <div class="wgs wgs-menu">
                                    <h6 class="wgs-title">Legal</h6>
                                    <div class="wgs-body">
                                        <ul class="wgs-links">
                                            <li><a href="#">Terms &amp; Conditions</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms of Sales</a></li>
                                            <li><a href="#">Whitepaper</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-lg-2 col-sm-4 mb-4 mb-sm-0">
                                <div class="wgs wgs-menu">
                                    <h6 class="wgs-title">Quick Links</h6>
                                    <div class="wgs-body">
                                        <ul class="wgs-links">
                                            <li><a href="#">Ecosystems</a></li>
                                            <li><a href="#">Tokens</a></li>
                                            <li><a href="#">Roadmaps</a></li>
                                            <li><a href="#">Faqs</a></li>
                                            <li><a href="#">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .col -->
                           <!--  <div class="col-lg-6 mb-4 mb-lg-0 order-lg-first">
                                <div class="wgs wgs-text">
                                    <div class="wgs-body">
                                        <a href="./" class="wgs-logo">
                                            <img src="images/logo-full-white.png" srcset="images/logo-full-white2x.png 2x" alt="logo">
                                        </a>
                                        <p>Copyright © 2018 ICO Crypto. <br>ABN: 2018AD947. All rights reserved. </p>
                                        <p class="copyright-text">Template by <a href="https://softnio.com/">Softnio</a>. Handcrafted by iO.</p>
                                    </div>
                                </div>
                            </div> -->
                        </div>
					</div><!-- .block @e -->
				</div>
				
			</section>
			<div class="nk-ovm shape-b"></div>
		</footer>
	</div>

	<div class="preloader"><span class="spinner spinner-round"></span></div>
	
	<!-- JavaScript -->
	<script src="assets/js/jquery.bundle.js?ver=192"></script>
	<script src="assets/js/scripts.js?ver=192"></script>
	<script src="assets/js/charts.js"></script>
</body>
</html>
