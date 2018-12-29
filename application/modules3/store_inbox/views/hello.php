<?php
$customer_id = $this->session->userdata('user_id');

echo Modules::run('store_inbox/_draw_customer_inbox', $customer_id);
?>