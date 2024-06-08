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

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">
    <link rel="shortcut icon" href="<?= BURL ?>assets/<?= $this->setting->site_favicon; ?>">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?=BURL?>themes/default_admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?=BURL?>themes/default_admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?=BURL?>themes/default_admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?=BURL?>themes/default_admin/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="element.html" class="dropdown-item">Other Elements</a>
                        </div>
                    </div>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->