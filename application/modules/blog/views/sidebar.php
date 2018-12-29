<?php
$search_blog = base_url().'blog/search_article';    
?>

<style>
    .recent-posts h4 span, .search-title, .contact-box h4 {
        color: #02799e;
        font-weight: 800;
    }
    .recent-posts ul li {
        *display: -webkit-box;
        *display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: reverse;
        -ms-flex-direction: column-reverse;
        flex-direction: column-reverse;
    }
    .recent-posts li:not(:first-child) {
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid rgba(0,0,0,0.05);
    }
    .recent-posts .post-date {
        font-size: 12px !important;
        color: #a09fa0 !important;
    }
    .recent-posts ul li a {
        margin-top: 5px;
        font-weight: 400;
        font-size: 14px;
        color: #46808e;
        text-align: justify;
    }

    .recent-posts ul li a:hover {
        color: #02799e;
    }
</style>

                        <div class="travelo-box">
                            <h5 class="box-title search-title">Cari Artikel</h5>
                            <div class="with-icon full-width">
                                <form class="search-article" action="<?= $search_blog ?>" method="post">
                                    <input type="text" class="input-text full-width" placeholder="cari artikel" id="inputArticle" name="keywords" onClick="disAutoCom(this);">
                                    <button type="submit" class="icon green-bg white-color"><i class="soap-icon-search"></i></button>
                                </form>
                                <div id="result-suggestions"></div>
                            </div>
                        </div>
                       
                        
                  <!-- <div class="travelo-box contact-box">
			                <h4>Butuh Bantuan WIKLAN?</h4>
			                <p style="text-align: justify;">Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
			                <address class="contact-details">
			                    <span class="contact-phone"><i class="soap-icon-phone"></i> (031) 51201088 </span>
			                    <br>
			                    <a class="contact-email" href="#">cs@wiklan.com</a>
			                </address>
			            </div> -->

                        <?= Modules::run('templates/need_help') ?>


                        <div class="recent-posts travelo-box contact-box">
                            <h4><span>Recent Posts</span></h4>
                            <ul>
                                <?php 
                                $this->load->module('timedate');
                                foreach ($recents->result() as $post): 
                                    $post_date = $this->timedate->get_nice_date($post->created, 'indon');
                                    $post_path = base_url().'blog/view/'.$post->slug;
                                ?>
                                <li>
                                    <a href="<?= $post_path ?>"><?= $post->title ?></a>
                                    <span class="post-date"><?= $post_date ?></span>
                                </li>
                               
                                <?php endforeach ?>
                            </ul>
                        </div>

<script>
tjq(document).ready(function() {
    tjq("#inputArticle").keyup(function() {
      var inpstr = tjq(this).val();
      if (inpstr.length > 3) {
          tjq.ajax({
              type: "post",
              url: "<?= base_url('blog/live_search') ?>",
              data: {liveSearch:inpstr},
              cache: false,
              success: function (res) {
                  tjq("#result-suggestions").fadeIn();
                  tjq("#result-suggestions").html(res);
              }
          });
  
          tjq("input#inputArticle").blur(function () {
              tjq('#result-suggestions').fadeOut();
          });
      }
  });
});
/* Disable autocomplete */
var flag = 1;
   function disAutoCom(obj){
        if(flag){
        obj.setAttribute("autocomplete","off");
            flag = 0;
      }
        obj.focus();
}
</script>