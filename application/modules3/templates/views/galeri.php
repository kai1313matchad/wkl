<style type="text/css">

  #portfolio .portfolio-item .portfolio-info {
    min-height: 100px !important;
  }
  #portfolio .portfolio-item .portfolio-info h6 a {
    color: #000;
    font-weight: 800;
    line-height: 20px;
    font-size: 16px;
  }
</style>

<section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">Galeri</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              <li data-filter=".filter-billboard">Billboard</li>
              <li data-filter=".filter-jpo">JPO</li>
              <li data-filter=".filter-baliho">Baliho</li>
              <li data-filter=".filter-videotron">Videotron</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">

        <?php
            foreach ($query->result() as $row) {
            $location = base_url().'LandingPageFiles/galeri/big_pics/'.$row->big_pic;	
            $kategori = $row->kategori;
            $judul = $row->judul;
        ?>

          <div class="col-lg-4 col-md-6 portfolio-item <?= $kategori ?> wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="<?= $location ?>" class="img-fluid" alt="">
                <a href="<?= $location ?>" data-lightbox="portfolio" data-title="<?= $judul ?>" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h6><a href="#"><?= $judul ?></a></h6>
                
              </div>
            </div>
          </div>

        <?php 
           } 
        ?> 

        </div>

      </div>
    </section><!-- #portfolio -->
