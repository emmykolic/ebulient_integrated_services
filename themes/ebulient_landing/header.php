<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> <?php if (isset($this->page_title) && $this->page_title != "") : ?><?= $this->page_title; ?><?php else : ?><?= $this->setting->site_name; ?> <?php endif; ?> </title>

    <meta name="description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?>  <?= $this->page_description; ?><?php else : ?> <?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta name="keywords" content="<?php if (isset($this->page_keywords) && $this->page_keywords != '') : ?>  <?= $this->page_keywords; ?><?php else : ?> <?= $this->setting->site_keywords; ?><?php endif; ?>" />
    <meta name="author" content="<?php if (isset($this->page_author) && $this->page_author != '') : ?> <?= $this->page_author; ?><?php else : ?> <?= $this->setting->site_author; ?><?php endif; ?>" />
    <meta property="og:title" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <?= $this->page_title; ?> <?php else :  ?> <?= $this->setting->site_name; ?>  <?php endif; ?>" />
    <meta property="og:image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?> <?php else : ?><?= BURL . 'assets/' . $this->setting->site_logo; ?> <?php endif; ?>" />
    <meta property="og:url" content="<?php if (isset($this->page_url) && $this->page_url != '') : ?> <?= $this->page_url; ?> <?php else : ?> <?= $this->setting->site_url; ?><?php endif; ?>" />
    <meta property="og:site_name" content="<?= $this->setting->site_name ?>" />
    <meta property="og:description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?> <?= $this->page_description; ?> <?php else : ?><?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta name="twitter:title" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <?= $this->page_title; ?> <?php else : ?> <?= $this->setting->site_name; ?><?php endif; ?>" />
    <meta name="twitter:image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?> <?php else : ?><?= BURL . 'assets/' . $this->setting->site_logo; ?><?php endif; ?>" />
    <meta name="twitter:url" content="<?php if (isset($this->page_url) && $this->page_url != '') : ?> <?= $this->page_url; ?><?php else : ?> <?= $this->setting->site_url; ?><?php endif; ?>" />
    <meta name="twitter:card" content="<?php if (isset($this->page_twitter_card) && $this->page_twitter_card != '') : ?> <?= BURL . 'assets/' . $this->page_image; ?><?php endif; ?>" />
    <meta itemprop="name" content="<?php if (isset($this->page_title) && $this->page_title != '') : ?> <? $this->page_title; ?><?php else : ?> <?= $this->setting->site_name; ?><?php endif; ?>" />
    <meta itemprop="description" content="<?php if (isset($this->page_description) && $this->page_description != '') : ?> <?= $this->page_description; ?> <?php else : ?> <?= $this->setting->site_description; ?><?php endif; ?>" />
    <meta itemprop="image" content="<?php if (isset($this->page_image) && $this->page_image != '') : ?> <? BURL . 'assets/' . $this->page_image; ?> <?php else : ?> <?= BURL . 'assets/' . $this->setting->site_screenshot; ?><?php endif; ?>" />

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">
  <link rel="shortcut icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=BURL?>themes/ebulient_landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=BURL?>themes/ebulient_landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=BURL?>themes/ebulient_landing/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?=BURL?>themes/ebulient_landing/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?=BURL?>themes/ebulient_landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?=BURL?>themes/ebulient_landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=BURL?>themes/ebulient_landing/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="<?=BURL?>themes/ebulient_landing/img/eisltd.jpeg" alt="" height="40" class="my-1">
        <h1>Ebulient Integrated Services Limited<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?=BURL?>" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="projects.php">Careers</a></li>
          <li><a href="blog.php">Blog</a></li>
          <li class="dropdown"><a href="#"><span>Services</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                    class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="<?=BURL?>contact">Contact</a></li>
          <li><a href="<?=BURL?>login">login</a></li>

          <?php if ($this->auth->user->type == 9): ?>
          <li><a href="<?=BURL?>dashboard">Dashboard</a></li>
          <?php endif; ?>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->