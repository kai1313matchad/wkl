<?php
$this->load->module('manage_daftar');
$coin = $this->manage_daftar->get_total_coin($param2);
?>

<style type="text/css">
	.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;   
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%; 
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>

<div class="modal-header" style="background-color: rgb(52, 191, 163);">
	<h5 class="modal-title" id="exampleModalLabel" style="color: #fff;">
		Penukaran
	</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			×
		</span>
	</button>
</div>
<?php
	$attributes = array('class' => 'm-form m-form--fit m-form--label-align-right');
    echo form_open(base_url().'manage_score/tukar', $attributes); 
?>	
<div class="modal-body">

	<input type="hidden" name="user_id" value="<?=$param2?>">
	<div class="m-portlet__body">
		
		<div class="m-form__group form-group">
			<label><span id="points"><?= $points ?></span> POIN</label>
			<input type="hidden" name="poin" value="<?= $points ?>" id="poin">
		</div>
		<div class="m-form__group form-group">

			<input type="range" min="0" max="<?= $points ?>" class="slider" step="10" value="0" id="myRange">

		</div>
		<div class="m-form__group form-group">
			<label><span id="coin">0</span> COIN</label>
			<input type="hidden" name="koin" id="koin">
		</div>

	</div>
    
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">
		Close
	</button>
	<button type="submit" name="submit" value="Submit" class="btn btn-success">
		Submit
	</button>
</div>

</form>

<script>
	document.getElementById('myRange').addEventListener('change', inputSlider);

	function inputSlider(e) {
		const val = <?= $points ?>;
		const kali = 10;
		var poin = document.getElementById('poin');
		var koin = document.getElementById('koin');
		var points = document.getElementById('points');
		var coin = document.getElementById('coin');
		var slider = e.target.value;
		console.log(e.target.value);

		// poin
		poin.value = val - slider; 
		koin.value = slider * kali;

		points.innerHTML = poin.value;
		coin.innerHTML = koin.value;

	}
</script>