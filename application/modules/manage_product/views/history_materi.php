<style>

</style>
<h2>History iklan</h2>
                        
<div class="intro table-wrapper full-width hidden-table-sms">
    
    <div class="col-sm-12 col-lg-12 table-cell">
            <?php foreach ($query->result() as $row) { 
            	$path_image = base_url().'./marketplace/materi/convert/'.$row->materi;
            ?>
            
            <div class="col-md-4" style="padding: 10px;">
                <div class="" style="padding-right: 5px; ">
                    
                    <img src="<?= $path_image ?>" class="img-responsive img-thumbnail">

                </div>
            </div>
            <?php } ?>    
    </div>
</div>