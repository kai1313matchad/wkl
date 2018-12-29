<?php
	function _attempt_make_active($link_text) {
		if ((current_url() == base_url().'youraccount/welcome') AND ($link_text == "your_message")) {
			echo 'class="active"';
		}
	}
?>

<ul class="nav nav-tabs" style="margin-top: 24px;">
  <li role="presentation" <?= _attempt_make_active('your_message') ?>>
  	<a href="<?= base_url() ?>youraccount/welcome">Your Messages</a>
  </li>
  <li role="presentation"><a href="#">Your Orders</a></li>
  <li role="presentation"><a href="#">Update Your Profile</a></li>
  <li role="presentation"><a href="<?= base_url() ?>youraccount/logout">Logout</a></li>
</ul>