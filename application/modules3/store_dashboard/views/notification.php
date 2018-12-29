<style type="text/css">

.comment-list {
    position: relative;
    background-color: #fff;
    *padding: 10px;
}

.comment-list .comment-item {
    margin-top: 0;
    position: relative;
}

.comment-list .comment-item>.thumb-sm {
    width: 36px;
}

.comment-list .comment-item .arrow.left {
    top: 20px;
    left: 39px;
}

.comment-list .comment-item .comment-body {
    margin-left: 46px;
}

.comment-list .comment-item .panel-body {
    padding: 10px 15px;
}

.comment-list .comment-item .panel-heading,
.comment-list .comment-item .panel-footer {
    position: relative;
    font-size: 12px;
    background-color: #fff;
}

.comment-list .comment-reply {
    margin-left: 46px;
}

/*.comment-list:before {
    position: absolute;
    top: 0;
    bottom: 35px;
    left: 18px;
    width: 1px;
    background: #e0e4e8;
    content: '';
}*/

.small {
    font-size: 80%;
}

.thumb-sm {
    width: 36px;
    display: inline-block;
}
.thumb img,
.thumb-xs img,
.thumb-sm img,
.thumb-md img,
.thumb-lg img {
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}

.m-b-lg {
    margin-bottom: 30px;
}

.b-b {
    border-bottom: 1px solid #cfcfcf;
}

.comment-item:first-child {
    margin-top: 25px;
}

.yellow-bg {
    background-color: #fdb714;
}

</style>           

                <div id="dashboard" class="tab-pane fade in active">
                      
                    <div class="row block">
                        
                        <div class="col-md-12">
                            <h2>Notifikasi</h2>
                            <div class="recent-activity" style="overflow-y:scroll; position:relative; width: auto; height: 500px; padding-right: 10px;">
                                <ul>
                                    <?php
                                    $this->load->module('manage_product');
                                    foreach ($notifications->result() as $notif) {
                                        $notif_title = ucwords($notif->notify_title);
                                        $notif_body = $notif->notification;
                                        $notif_date = $notif->notification_date;
                                        $notif_img = $notif->image;
                                        $notif_icon = $notif->icon;
                                        $notif_item = $notif->module_field_id;

                                        if (is_numeric($notif_item)) {
                                            $item_pic = $this->manage_product->get_img_from_id($notif_item);
                                        }
                                        $color = ($notif->opened != 1) ? 'yellow-bg' : 'white-bg' ;
                                    ?>
                                    <li>
                                        <a href="#">
                                            
                                            <span class="price">
                                                <?php
                                                if ($notif_img != '') { ?>
                                                    <img src="<?= base_url() ?>marketplace/images/<?= $notif_img ?>">
                                                <?php } ?>
                                                <?php if ($notif_item != '') { ?>
                                                    
                                                    <img src="<?= base_url() ?>marketplace/limapuluh/70x70/<?= $item_pic ?>">
                                                <?php } ?>
                                            </span>
                                            <h5 class="box-title" style="font-weight: bold; line-height: 18px; margin-bottom: 10px;">
                                                <?= $notif_title ?><small style="margin-top: 5px; font-size: 12px; color: #2d3e52; line-height: 18px; text-transform: none;"><?= $notif_body ?></small>
                                            </h5>
                                            <i class="icon <?= $notif_icon ?> yellow-color"></i><span style="font-size: 10px;"><?= $notif_date ?> WIB</span>
                                        </a>
                                    </li>
                                    <?php } ?>
                                    
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                </div>
               