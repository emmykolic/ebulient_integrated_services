  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">

  <div class="info d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center mt-5">
          <h2 class="fade-downs" data-aos="fade-down">Welcome To <span class="small"><?=$this->setting->site_name?></span></h2>
          <p class="fade-description" data-aos="fade-up"><?=$this->setting->site_description?></p>
          <a id="contact" data-aos="fade-up" data-aos-delay="200" href="<?=BURL?>contact" class="btn-get-started">Contact Us</a>
        </div>
      </div>
    </div>
  </div>


    <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

      <div class="carousel-item active" style="background-image: url(<?=BURL?>themes/ebulient_landing/img/hero-carousel/hero-carousel-1.jpg)">
      </div>
      <div class="carousel-item" style="background-image: url(<?=BURL?>themes/ebulient_landing/img/hero-carousel/hero-carousel-2.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?=BURL?>themes/ebulient_landing/img/hero-carousel/hero-carousel-3.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?=BURL?>themes/ebulient_landing/img/hero-carousel/hero-carousel-4.jpg)"></div>
      <div class="carousel-item" style="background-image: url(<?=BURL?>themes/ebulient_landing/img/hero-carousel/hero-carousel-5.jpg)"></div>

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

  </section><!-- End Hero Section -->

  <main id="main">

      <!-- ======= Get Started Section ======= -->
      <section id="get-started" class="get-started section-bg">
        <div class="container">
          <div class="row justify-content-between gy-4">
            <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
              <div class="content">
              <!-- <h3>Minus hic non reiciendis ea possimus at quia.</h3> -->
                <p>EIS limited has built a strong franchise of quality and excellence over the
                  years and services a wide Oil & Gas industry customer base. Supported by
                  professional technical, operations & marketing teams, the company has
                  excellent team that delivers projects and is a financially strong and
                  stable company.
                  EIS limited continues to offer the highest standards of products & services
                  by leveraging on competencies, brand value and Strategic Alliances.
                  The company has excellent safety record and is an equal opportunity
                  company. Our people are multi-skilled and multi-talented with a
                  passion for quality service and continuous customer delight. <br><br>
                  <b>OUR VISION</b>
                  “To be a leading cutting edge company that provides sustainable
                  solutions to Africa Oil & Gas and Energy industry” <br><br>
                  <b>OUR MISSION</b>
                  “To provide quality, efficient and safe services to our clients that meets
                  and exceeds expectations” <br><br>
                  <b>OUR VALUE PROPOSITION</b>
                  <ul>
                    <li>EXCELLENCE</li>
                    <li>SAFE PROJECTS</li>
                    <li>CONTINUOUS LEARNING AND IMPROVEMENT</li>
                    <li>CARE AND RESPECT</li>
                  </ul>
                </p>
                <p>At EBULIENT INTEGRATED SERVICES LIMITED we believe in teamwork.
                  Teamwork is therefore highly encouraged amongst stakeholders because
                  together we can achieve more. Excellence and creativity is also our style of
                  service delivery because we see excellence and creativity as a hallmark of
                  professionalism in servicing our clients
                  <b>EIS limited solutions include:</b></p>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
              <div class="content">
                
                <p><b>Industrial gas & Chemicals | Chemical Cleaning | Engineering Services | Supply Services |</b><br><br>
                INDUSTRIAL GAS & CHEMICAL</p>
                <ul>
                  <b>Welding and Cutting gases</b>
                  <li>Oxygen</li>
                  <li>Acetylene</li>
                  <li>Propane</li>
                  <b>Inert gases</b>
                  <li>Nitrogen</li>
                  <li>Argon</li>
                  <li>Helium</li>
                </ul>
                <p>Fire Fighting Gases</p>
                <ul>
                  <li>Carbon dioxide</li>
                  <li>Refrigerants</li>
                  <li>Argonite</li>
                  <li>Argon/Carbon dioxide Mixture</li>
                </ul>
                <p>Refrigerant gases</p>
                <ul>
                  <li>134A</li>
                  <li>404</li>
                  <li>407C</li>
                  <li>F22 & F12</li>
                </ul>
                <p>Compressed Air & SCBA</p>
                <p>Specialty Gases</p>
                <ul>
                  <li>Calibration gases</li>
                  <li>Gas mixture</li>
                  <li>Hydrogen</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Get Started Section -->

      <!-- ======= Services Section ======= -->
      <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Our Services</h2>
            <p>Here're some mixures of the services we render  kindly click the link below to see full services.</p>
          </div>

          <div class="row gy-4">
            <?php while ($row =  $get_services->fetch_assoc()): ?>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item  position-relative">
                <div class="icon">
                  <i class="fa-solid fa-mountain-city"></i>
                </div>
                <h3><?=$row['service_name']?></h3>
                <?php
                    // Split points into an array using a delimiter
                    $points = explode(',', $row['points']);
                    foreach ($points as $point) {
                      echo "<li>" . htmlspecialchars($point) . "</li>";
                    }
                  ?>
                <a href="<?=BURL?>services/chemical_cleaning" class="readmore stretched-link">Learn more <i
                    class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->
            <?php endwhile;?>
          </div>

          <div class="row gy-4 mt-2 ">
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <img src="<?= BURL ?>themes/ebulient_landing/img/engineering-1.jpg" alt="" class="img-fluid">
                    <h3 class="text-center"></h3>
                    <a href="<?=BURL?>services/engineering" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
              </div><!-- End Service Item -->

              <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <img src="<?= BURL ?>themes/ebulient_landing/img/engineering-2.jpg" alt="" class="img-fluid">
                    <h3 class="text-center"></h3>
                    <a href="<?=BURL?>services/engineering" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
              </div><!-- End Service Item -->
            
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <img src="<?= BURL ?>themes/ebulient_landing/img/engineering-3.jpg" alt="" class="img-fluid">
                    <h3 class="text-center"></h3>
                    <a href="<?=BURL?>services/engineering" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
              </div><!-- End Service Item -->
            
          </div>

          <div class="row m-4">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= BURL ?>themes/ebulient_landing/img/service-supply-1.png" alt="" class="img-fluid">
                <h3 class="text-center"></h3>
            </div><!-- End Service Item -->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= BURL ?>themes/ebulient_landing/img/service-supply-2.png" alt="" class="img-fluid">
                <h3 class="text-center"></h3>
            </div><!-- End Service Item -->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= BURL ?>themes/ebulient_landing/img/service-supply-3.png" alt="" class="img-fluid">
                <h3 class="text-center"></h3>
            </div><!-- End Service Item -->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= BURL ?>themes/ebulient_landing/img/service-supply-4.png" alt="" class="img-fluid">
                <h3 class="text-center"></h3>
            </div><!-- End Service Item -->

            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= BURL ?>themes/ebulient_landing/img/service-supply-5.png" alt="" class="img-fluid">
                <h3 class="text-center"></h3>
            </div><!-- End Service Item -->
        </div>

        </div>
      </section><!-- End Services Section -->

      <!-- ======= Our Projects Section ======= -->
      <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Rentals</h2>
            <p>Here are the items we Rent!</p>
          </div>
          
          <?php 
          function sanitizeClassName($name) {
              return strtolower(preg_replace('/[^a-z0-9]+/', '-', trim($name)));
          }

          // Debugging: Check if functions are working
          // echo sanitizeClassName('Test Class Name'); // Should print: test-class-name

          ?>
          <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
              <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">All</li>
                  <?php while($filter_row = $get_filters->fetch_assoc()): ?>
                      <li data-filter=".filter-<?= sanitizeClassName($filter_row['name']) ?>"><?= $filter_row['name'] ?></li>
                  <?php endwhile; ?>
              </ul><!-- End Projects Filters -->

              <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                  <?php while($row = $get_rentals->fetch_assoc()): ?>
                      <?php 
                          $imgPath = BURL . $row['rental_img'];
                          $filterClass = 'filter-' . sanitizeClassName($row['name']);
                      ?>
                      <div class="col-lg-4 col-md-6 portfolio-item <?= $filterClass ?>">
                          <div class="portfolio-content h-100">
                              <img src="<?= $imgPath ?>" class="img-fluid" alt="">
                              <div class="portfolio-info">
                                  <h4><?= $row['name'] ?> <?= $row['rid'] ?></h4>
                                  <p><?=$row['name']?></p>
                                  <a href="<?= $imgPath ?>" title="<?= $row['name'] ?> 1"
                                    data-gallery="portfolio-gallery-<?= sanitizeClassName($row['name']) ?>" class="glightbox preview-link text-center">
                                    <i class="bi bi-zoom-in"></i></a>
                              </div>
                          </div>
                      </div><!-- End Projects Item -->
                  <?php endwhile; ?>
              </div><!-- End Projects Container -->
          </div><!-- End Portfolio Isotope -->
        </div>
      </section><!-- End Our Projects Section -->
    
    </section>
    <!-- End Recent Blog Posts Section -->

  </main><!-- End #main -->

