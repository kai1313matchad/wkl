<?php $form_pendaftaran_location = base_url().'pendaftaran'; ?>

<section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

        	<?php
        		foreach ($query->result() as $row) {
        		$location = base_url().'assets/LandingPageFiles/banner/'.$row->big_pic;
        	?>
          <div class="carousel-item active" style="background-image: url('<?= $location ?>');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2><?= $row->judul ?></h2>
                <p><?= $row->deskripsi ?></p>
                <a href="<?= $form_pendaftaran_location ?>" class="btn-get-started scrollto">Daftar</a>
              </div>
            </div>
          </div>

          <?php } ?>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
 </section> 

