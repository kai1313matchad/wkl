 <section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Partnership</h3>
        </header>

        <div class="owl-carousel clients-carousel">
        <?php
            foreach ($query->result() as $row) {
            $location = base_url().'LandingPageFiles/client/'.$row->image;	
        ?>
          <img src="<?= $location ?>" alt="">
         
        <?php 
           } 
        ?>    
        </div>

      </div>
    </section>