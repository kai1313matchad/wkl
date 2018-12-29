<?php
$shop_phone = $this->db->get_where('settings' , array('type'=>'phone'))->row()->description;
$shop_whatsapp = $this->db->get_where('settings' , array('type'=>'WA'))->row()->description;
$shop_email = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
?>

<div class="travelo-box contact-box">
    <h4 style="color: #02799e; font-weight: 800;">Butuh Bantuan WIKLAN?</h4>
    <p style="text-align: justify;">Kami akan dengan senang hati membantu Anda. Tim kami siap melayani Anda 24/7 (Respon Cepat 24 Jam).</p>
    <address class="contact-details">
        <span class="contact-phone" style="font-size: 16px; margin: 0 0 10px;"><i class="soap-icon-phone"></i> : <?= $shop_phone ?> </span>
        <br>
        <span class="contact-phone whatsapp" style="font-size: 16px; margin: 0 0 10px;"><i class="soap-icon-conference"></i> : <?= $shop_whatsapp ?></span>
        <br>
        <span class="contact-phone" style="font-size: 16px; margin: 0 0 10px;"><i class="soap-icon-letter"></i> : <a href="#" class="contact-email2"><?= $shop_email ?></a></span>
    </address>
</div>