<section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pertanyaan yang Sering ditanyakan</h3>
          <span class="section-divider"></span>
          <p class="section-description">Berikut ini pertanyaan-pertanyaan yang sering ditanyakan :</p>
        </div>

        <ul id="faq-list" data-aos="fade-up" class="aos-init aos-animate">
        <?php
            $aria = 'true';
            $item_class = ' show';
            foreach ($query->result() as $row) {
        ?>
          	
          <li>
            <a data-toggle="collapse" class="" href="#faq<?= $row->id ?>" aria-expanded="<?= $aria ?>"><?= $row->pertanyaan ?> <i class="ion-android-remove"></i></a>
            <div id="faq<?= $row->id ?>" class="collapse <?= $item_class ?>" data-parent="#faq-list" style="">
              <p>
                <?= $row->jawaban ?>
              </p>
            </div>
          </li>
        <?php 
            $aria = 'false';
            $item_class = '';
          } 
        ?>  
          
     
        </ul>
      </div>
    </section>

