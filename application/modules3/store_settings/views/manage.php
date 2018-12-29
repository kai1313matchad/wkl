<?php
$system_logo = $this->db->get_where('settings' , array('type'=>'logo'))->row()->description;
$homepage_bg = $this->db->get_where('settings' , array('type'=>'homepage_background'))->row()->description;
$form_location = base_url().'store_settings/do_update';
?>


<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <span class="m-portlet__head-icon m--hide">
                    <i class="la la-gear"></i>
                </span>
                <h3 class="m-portlet__head-text">
                    Settings
                </h3>
            </div>
        </div>
    </div>

    <div class="m-portlet__body">
        <?php 
        if (isset($flash)) {
            echo $flash;
        }
        ?>
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#m_tabs_1_1">
                    General
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_2">
                    Homepage
                </a>
            </li>
           <!--  <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#m_tabs_1_3">
                    Meta
                </a>
            </li> -->
        </ul> 
        <div class="tab-content">
            <div class="tab-pane active" id="m_tabs_1_1" role="tabpanel">
                

                <div class="row">
                    <div class="col-md-6">
                        <form class="m-form m-form--fit m-form--label-align-right" action="<?= $form_location ?>" method="post">
                            <div class="m-portlet__body">
                                <div class="form-group m-form__group">
                                    <label for="shop_name">
                                        Shop Name
                                    </label>
                                    <input type="text" class="form-control m-input" id="shop_name" name="shop_name" placeholder="Enter Shop Name" value="<?php echo $this->db->get_where('settings' , array('type' =>'shop_name'))->row()->description;?>">
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('shop_name'); ?></div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="phone">
                                        Phone
                                    </label>
                                    <input type="text" class="form-control m-input" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $this->db->get_where('settings' , array('type' =>'phone'))->row()->description;?>" >
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('phone'); ?></div>
                                </div>
                                
                                <div class="form-group m-form__group">
                                    <label for="alamat">
                                        Alamat
                                    </label>
                                    <textarea class="form-control m-input" id="address" name="address" rows="3"><?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?></textarea>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('address'); ?></div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="email">
                                        Email
                                    </label>
                                    <input type="email" class="form-control m-input" id="email" name="email" placeholder="Enter Email" value="<?php echo $this->db->get_where('settings' , array('type' =>'email'))->row()->description;?>" >
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('email'); ?></div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="author">
                                        Author
                                    </label>
                                    <input type="text" class="form-control m-input" id="author" name="author" placeholder="Enter Author Name" value="<?php echo $this->db->get_where('settings' , array('type' =>'author'))->row()->description;?>" >
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('author'); ?></div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="description">
                                        Description
                                    </label>
                                    <textarea class="form-control m-input" id="description" name="description" rows="6"><?php echo $this->db->get_where('settings' , array('type' =>'description'))->row()->description;?></textarea>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('description'); ?></div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="keyword">
                                        Keyword
                                    </label>
                                    <textarea class="form-control m-input" id="keyword" name="keyword" rows="3"><?php echo $this->db->get_where('settings' , array('type' =>'keyword'))->row()->description;?></textarea>
                                    <div class="form-control-feedback" style="color: #f4516c;"><?php echo form_error('keyword'); ?></div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> 

                    <div class="col-md-6">
                        <?php echo form_open_multipart('store_settings/upload_logo', 'class=m-form m-form--fit m-form--label-align-right'); ?>
                            <div class="m-portlet__body">

                                <?php
                                $path_img = base_url().'marketplace/logo/'.$system_logo;
                                if ($system_logo != "") { ?>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Logo
                                    </label>
                                    <div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
                                        <img src="<?= $path_img ?>" width="" style="width: 100%;">
                                    </div>
                                </div>

                                <?php } ?>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Ganti Logo
                                    </label>
                                    <div></div>
                                    <label class="custom-file">
                                        <input type="file" id="file2" class="custom-file-input" name="name_field">
                                        <span class="custom-file-control form-control"></span>
                                    </label>
                                </div>
                               
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div> 

                </div>

            </div>
            <div class="tab-pane" id="m_tabs_1_2" role="tabpanel">

                <div class="row">

                    <div class="col-md-6">
                        <?php echo form_open_multipart('store_settings/upload_background', 'class=m-form m-form--fit m-form--label-align-right'); ?>
                            <div class="m-portlet__body">

                                <?php
                                $path_bg_img = base_url().'marketplace/images/'.$homepage_bg;
                                if ($homepage_bg != "") { ?>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Background
                                    </label>
                                    <div class="m-portlet m-portlet--bordered m-portlet--bordered-semi m-portlet--rounded">
                                        <img src="<?= $path_bg_img ?>" width="" style="width: 100%;">
                                    </div>
                                </div>

                                <?php } ?>

                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">
                                        Ganti Background
                                    </label>
                                    <div></div>
                                    <label class="custom-file">
                                        <input type="file" id="file2" class="custom-file-input" name="name_field2">
                                        <span class="custom-file-control form-control"></span>
                                    </label>
                                </div>
                               
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        <?php echo form_close(); ?>
                    </div> 

                </div>

            </div>
          <!--   <div class="tab-pane" id="m_tabs_1_3" role="tabpanel">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged
            </div> -->
           
        </div>
    </div>
    
</div>
<!--end::Portlet-->

