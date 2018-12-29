<style>
	.review-form {
        min-height: 300px;
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

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Ulas Lokasi</h4>
</div>
<div class="modal-body">
	<?php 
	$form_location = base_url()."transaction/ulas_lokasi"; 
	?>
    <form class="review-form" id="inputReview" method="post" action="<?= $form_location ?>">    
        <input type="hidden" name="user_id" id="userId" value="<?php echo $this->session->userdata('user_id') ?>">
        <input type="hidden" name="session_id" id="session" value="<?= $param2 ?>">
        <div class="no-padding no-float">
            <div class="row form-group">
                <div class="col-sms-12 col-sm-12">
                    <label>Headline</label>
                    <input type="text" class="input-text full-width" placeholder="" name="headline" id="headline">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-sms-12 col-sm-12">
                    <label>Ulasan</label>
                    <textarea type="text" class="input-text full-width" style="height: 100px;" name="ulasan" id="ulasan"></textarea>
                </div>
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

            <div class="row from-group">
                <div class="col-sms-12 col-sm-12">
                    <button type="submit" name="submit" value="Submit" id="btnReview" class="load-more button green full-width btn-large fourty-space">SUBMIT</button>
                </div>
            </div>

        </div>
    </form>

</div>
       
<script>
     tjq('.rating2 input').change(function () {
        var $radio = tjq(this);
        tjq('.rating2 .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });
</script>       