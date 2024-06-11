

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?=BURL?>themes/ebulient_landing/img/breadcrumbs-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>Contact</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Contact</li>
        </ol>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-map"></i>
              <h3>Our Address</h3>
              <p>5a Ezegbakagbaka Close, Woji, Port Harcourt.Rivers State. Nigeria.</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-envelope"></i>
              <h3>Email Us</h3>
              <p><a href="mailto:info@eislltd.com">info@eislltd.com</a></p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-telephone"></i>
              <h3>Call Us</h3>
              <p><a href="tel:+2347020916198">07020916198</a></p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">

          <div class="col-lg-6 ">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3975.821988533051!2d6.949746674320447!3d4.800596740784827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sEBULIENT%20INTEGRATED%20SERVICES%20LIMITED%208%20www.eislltd.com%20eislltd%40yahoo.com%20info%40eislltd.com%205a%20Ezegbakagbaka%20Close%2C%20Woji%2C%20Port%20Harcourt.Rivers%20State.%20Nigeria.!5e0!3m2!1sen!2sbd!4v1718141487181!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div><!-- End Google Maps -->


          <div class="col-lg-6">
            <form action="<?=BURL?>contact/contactAction" method="post" role="form" class="php-email-form">
                <div class="row gy-4">
                    <div class="col-lg-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-lg-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <button class="text-center" type="submit">Send Message</button>
            </form>
        </div>


        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->