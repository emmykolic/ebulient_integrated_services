  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?=BURL?>themes/ebulient_landing/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2 class="text-center">Our Services</h2>
        <ol>
          <li><a href="<?=BURL?>">Home</a></li>
          <li>Services</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      <h2 class="text-center">CHEMICAL CLEANING SERVICES</h2>
      <p class="text-center">EIS Limited chemical cleaning division utilizes highly-trained, skilled technicians to
        provide innovative, safe and cost effective cleaning and metal passivation solutions to
        diverse industries, ranging from heavy oil refining to ultra-sterile dairy and potable
        water installations.</p>
        <div class="row gy-4 mt-5">
        <!-- CHEMICAL CLEANING SERVICES -->
        <div class="container">
          <div class="row">
            <?php while ($row = $get_chemical_cleaning->fetch_assoc()): ?>
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                  <div class="icon mb-3">
                    <img src="<?= BURL . $row['service_img'] ?>" alt="" class="img-fluid" style="max-height: 150px; margin-bottom: 20px;">
                  </div>
                  <h3 class="text-center"><?= htmlspecialchars($row['service_name']) ?></h3>
                  <?php
                    // Split points into an array using a delimiter
                    $points = explode(',', $row['points']);
                    foreach ($points as $point) {
                      echo "<li>" . htmlspecialchars($point) . "</li>";
                    }
                  ?>
                  <!-- <a href="service-details.html" class="readmore stretched-link">Learn more <i class="bi bi-arrow-right"></i></a> -->
                </div>
              </div><!-- End Service Item -->
            <?php endwhile; ?>
          </div>
        </div>



        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->