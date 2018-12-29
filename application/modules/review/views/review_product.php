<?php
$action_location = base_url().'review/simpan_ulasan';
$back_location = base_url();
$prod = $this->db->where('prod_code', $prod_code)->get('store_item')->row();
$image_location = base_url().'marketplace/limapuluh/900x500/'.$prod->limapuluh;
$view_product = base_url()."product/billboard/".$prod->item_url;
$nama_prod = $prod->item_title;
$pic = $prod->limapuluh;
?>

<style>
	.container {
		height: 100%;
		padding-top: 20px;
		padding-bottom: 20px;
	}
	
   .rating2 {
        unicode-bidi: bidi-override;
        direction: rtl;
        width: 15em;
    }

    .rating2 input {
        position: absolute;
        left: -999999px;
    }

    .rating2 label {
        display: inline-block;
        font-size: 0;
    }

    .rating2 > label:before {
        position: relative;
        font: 24px/1 FontAwesome;
        display: block;
        content: "\f005";
        color: #ccc;
        background: -webkit-linear-gradient(-45deg, #d9d9d9 0%, #b3b3b3 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .rating2 > label:hover:before,
    .rating2 > label:hover ~ label:before,
    .rating2 > label.selected:before,
    .rating2 > label.selected ~ label:before {
        color: #f0ad4e;
        background: -webkit-linear-gradient(-45deg, #fcb551 0%, #d69a45 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<div class="container">
    <div class="row">

		<!-- alert -->
		<?php 
		if (isset($flash)) {
			echo $flash;
		}
		?>
    	<div class="col-sms-4 col-sm-4 col-md-4">

        </div>
    	
        <div id="main" class="col-sms-4 col-sm-4 col-md-4">
            <div class="booking-section travelo-box">
                
                <form class="booking-form" action="<?= $action_location ?>" method="post">
                	<input type="hidden" name="user_id" id="userId" value="<?= $user_id ?>">
        			<input type="hidden" name="prod_id" id="prodId" value="<?= $prod_code ?>">
                    <div class="person-information">
			            <h2>Berikan Ulasanmu!</h2>
			            <div class="lokasi">
			            	<div class="image">
			            		<a title="" href="<?= $view_product ?>" class=""><img width="270" height="160" alt="" src="<?= ($pic != '') ? $image_location : 'http://placehold.it/270x160' ?>"></a>
			            	</div>
			            	<div class="info">
			            		<span style="text-align: center;"><a href="<?= $view_product ?>"><?= $nama_prod ?> </a></span>
			            	</div>
			            </div>
                        <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Judul Ulasan</label>
                                <input type="text" class="input-text full-width" placeholder="" name="headline" value="<?=set_value('headline')?>" required />
                            </div>
                            <span class="focus-input100"><?php echo form_error('headline'); ?></span>
                        </div>
			            <div class="form-group row">
                            <div class="col-sm-12 col-md-12">
                                <label>Ulasan</label>
                                <textarea class="input-text full-width" placeholder="" style="height: 100px;" name="ulasan" required></textarea>
                            </div>
                            <span class="focus-input100"><?php echo form_error('ulasan'); ?></span>
                        </div> 
                        <div class="row form-group">
			                <div class="col-sms-12 col-sm-12">
			                    <label>Rating</label>

			                    <div class="rating2">
			                      <label>
			                        <input type="radio" name="rating" value="5" title="5 stars"> 5
			                      </label>
			                      <label>
			                        <input type="radio" name="rating" value="4" title="4 stars"> 4
			                      </label>
			                      <label>
			                        <input type="radio" name="rating" value="3" title="3 stars"> 3
			                      </label>
			                      <label>
			                        <input type="radio" name="rating" value="2" title="2 stars"> 2
			                      </label>
			                      <label>
			                        <input type="radio" name="rating" value="1" title="1 star"> 1
			                      </label>
			                    </div>

			                </div>                        
			            </div>   
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <button type="submit" class="full-width btn-large" name="submit" value="Submit">SIMPAN</button>
                            &nbsp;
                            <a href="<?= $back_location ?>" class="button btn-large orange full-width" style="font-weight: bold;">CANCEL</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sms-4 col-sm-4 col-md-4">

        </div>
        
    </div>
</div>

<script>
     $('.rating2 input').change(function () {
        var $radio = $(this);
        $('.rating2 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });
</script>       