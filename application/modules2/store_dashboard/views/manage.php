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

<?php
    $edit_profil = base_url().'store_profile';
?>
                <div id="dashboard" class="tab-pane fade in active">
                    <div class="row block">
                        <div class="col-sm-6 col-md-8">
                            <h1 class="no-margin skin-color"><?= $username ?></h1>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <span><a href="<?= $edit_profil ?>" class="button btn-small dark-orange">edit profil</a></span>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row block">
                        <div class="col-sm-6 col-md-3">
                            <a href="hotel-list-view.html">
                                <div class="fact blue">
                                    <div class="numbers counters-box">
                                        <dl>
                                            <dt class="display-counter" data-value="3200">0</dt>
                                            <dd>Outstanding</dd>
                                        </dl>
                                        <i class="icon soap-icon-flexible"></i>
                                    </div>
                                    <div class="description">
                                        <i class="icon soap-icon-longarrow-right"></i>
                                        <span>View Hotels</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a href="flight-list-view.html">
                                <div class="fact yellow">
                                    <div class="numbers counters-box">
                                        <dl>
                                            <dt class="display-counter" data-value="4509">0</dt>
                                            <dd>Expenses</dd>
                                        </dl>
                                        <i class="icon soap-icon-features"></i>
                                    </div>
                                    <div class="description">
                                        <i class="icon soap-icon-longarrow-right"></i>
                                        <span>View Flights</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a href="car-list-view.html">
                                <div class="fact red">
                                    <div class="numbers counters-box">
                                        <dl>
                                            <dt class="display-counter" data-value="3250">0</dt>
                                            <dd>Last Month</dd>
                                        </dl>
                                        <i class="icon soap-icon-calendar"></i>
                                    </div>
                                    <div class="description">
                                        <i class="icon soap-icon-longarrow-right"></i>
                                        <span>View Cars</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a href="cruise-list-view.html">
                                <div class="fact green">
                                    <div class="numbers counters-box">
                                        <dl>
                                            <dt class="display-counter" data-value="1570">0</dt>
                                            <dd>This Month</dd>
                                        </dl>
                                        <i class="icon soap-icon-calendar-check flip-effect"></i>
                                    </div>
                                    <div class="description">
                                        <i class="icon soap-icon-longarrow-right"></i>
                                        <span>View Cruises</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    
                    <div class="row block">
                        <div class="col-md-6 notifications">
                            <h2>Aktifitas</h2>
                            <div class="recent-activity" style="background-color: #fff; padding: 10px; border: 5px solid #ddd;">
                                
                                <section class="comment-list block">
                                    <div class="slimScrollDiv2" style="position: relative; overflow: hidden; width: auto; height: 400px;">
                                        <section class="slim-scroll2" style="overflow-y:scroll; position:relative; width: auto; height: 400px; padding-right: 10px;">
                                            <?php
                                            $this->load->module('timedate');
                                            foreach ($activities->result() as $activity) {
                                                $user_id = $activity->user;
                                                $user = Client::view_by_id($user_id);
                                                $act = str_replace('_', ' ', $activity->activity);
                                                $pic = $user->pic;
                                                
                                            ?>
                                            <article id="comment-id-1" class="comment-item small">
                                                <div class="pull-left thumb-sm">
                                                    <img src="<?php echo base_url(); ?><?php echo ($pic != '') ? 'marketplace/photo_profil/'.$pic : 'marketplace/images/default_v3-usrnophoto1.png'?>" class="img-circle">
                                                </div>
                                                <section class="comment-body m-b-lg">
                                                    <header class="b-b">
                                                        <strong style="font-size: 12px;"><?= $user->username ?></strong>
                                                        <span class="text-muted text-xs"><?= $activity->activity_date ?></span>
                                                    </header>
                                                    <div style="font-size: 12px; color: #2d3e52; line-height: 18px;">
                                                        <?= $act ?>
                                                    </div>
                                                </section>
                                            </article>

                                            <?php } ?>

                                        </section>
                                        <div class="slimScrollBar" style="background: rgb(51, 51, 51); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 0px; height: 86.7209px;"></div>
                                        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 0px;"></div>
                                    </div>
                                </section>
                                <a href="#" class="button green btn-small full-width">LIHAT SEMUA</a>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            <a href="#" class="button green btn-small full-width">LIHAT SEMUA</a>
                        </div>
                    </div>
                    <hr>
                    
                </div>
               