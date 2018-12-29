<section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

        <?php
            foreach ($query->result() as $row) {
            
            if ($row->image == '') {
              $location = base_url().'marketplace/images/default_v3-usrnophoto1.png';
            } else {
               $location = base_url().'LandingPageFiles/testimoni/'.$row->image;   
            }
        ?>	

          <div class="testimonial-item">
            <img src="<?= $location ?>" class="testimonial-img" alt="">
            <h3><?= $row->nama ?></h3>
            <h4><?= $row->profil ?></h4>
            <p>
              <img src="http://localhost:85/hmvc/LandingPageFiles/img/quote-sign-left.png" class="quote-sign-left" alt="">
              <?= $row->testimoni ?>
              <img src="http://localhost:85/hmvc/LandingPageFiles/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

        <?php 
           } 
        ?>  

        </div>

      </div>
    </section>