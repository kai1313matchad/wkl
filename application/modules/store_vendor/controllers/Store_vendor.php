<?php
class Store_vendor extends MX_Controller 
{
    private $perPage = 2;
function __construct() {
parent::__construct();
}

    public function index()
    {   
        $this->load->module('site_security');
        $this->site_security->_make_sure_logged_in();

        $data['productions'] = $this->create_vendor_productions();
        $data['printing'] = $this->create_vendor_printing(); 
        $data['legals'] = $this->create_vendor_legals(); 
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->market($data);
    }

    function create_vendor_insurance() {
        $this->load->module('vendor');
        $this->load->module('timedate');

        $cat = 1;

        if($this->input->get("page") != ''){
            $page = $this->input->get("page");
            $offset = $this->perPage * $page; 
            $limit = $this->perPage; 
            $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND status = 1 ORDER BY id DESC LIMIT $offset ,$limit";
            $vendors = $this->vendor->_custom_query($mysql_query)->result();

            foreach ($vendors as $vendor) {
                $nama = $vendor->nama;
                $email = $vendor->email;
                $telp = $vendor->telp;
                $alamat = $vendor->alamat;
                $keuntungan = $vendor->keuntungan;
                $link = $vendor->url;
                $pic = $vendor->pic;
                $img = base_url().'marketplace/vendor/vendor_asuransi.jpg';
                $id = $vendor->id;

                echo "<article class='box'>
                        <figure class='col-sm-5 col-md-4'>
                            <a title='' href='#'><img width='270' height='160' alt='' src='".$img."'></a>
                            <br>
                            <!--
                            <div class='row'>
                                <div class='col-sm-4'>
                                    <ul>
                                        <li><a href='".base_url()."store_vendor/download_file/SIUP/".$id."'><i class='fa fa-download'></i> SIUP</a></li>
                                        <li><a href='".base_url()."store_vendor/download_file/TDP/".$id."'><i class='fa fa-download'></i> TDP</a></li>
                                      
                                    </ul>
                                </div>
                                <div class='col-sm-8'>
                                    <ul>
                                        
                                        <li><a href='".base_url()."store_vendor/download_file/NPWP/".$id."'><i class='fa fa-download'></i> NPWP perusahaan</a></li>
                                        <li><a href='".base_url()."store_vendor/download_file/Akte/".$id."'><i class='fa fa-download'></i> Akte perusahaan</a></li>
                                    </ul>
                                </div>    
                            </div>
                            -->
                        </figure>
                        <div class='details col-xs-12 col-sm-7 col-md-8'>
                            <div>
                                <div id='info-general'>
                                    <h4 class='box-title'>".$nama."<br><small>".$pic."</small></h4>
                                    <br>
                                    <span><i class='soap-icon-phone yellow-color'></i> ".$telp."</span>
                                    <span><i class='soap-icon-message yellow-color'></i> ".$email."</span>
                                    <br>
                                    <span><i class='soap-icon-departure yellow-color'></i> ".$alamat."</span>";
                                    if ($link != '') {
                                        echo "<br>
                                        <a href='".$link."' target='_blank'><span><i class='soap-icon-globe yellow-color'></i> ".$link."</span></a>";
                                    }

                             echo"</div>
     
                            </div>
                            <div class='keuntungan'>
                                <p>".$keuntungan."</p>
                            </div>
                            
                        </div>
                    </article><hr>";

            }
        }
    }

    function create_vendor_production() {
        $this->load->module('vendor');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('timedate');

        $cat = 2;

        if($this->input->get("page") != ''){
            $page = $this->input->get("page");
            $offset = $this->perPage * $page; 
            $limit = $this->perPage; 
            $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND status = 1 ORDER BY id DESC";
            $vendors = $this->vendor->_custom_query($mysql_query)->result();

            foreach ($vendors as $vendor) {
                $nama = $vendor->nama;
                $email = $vendor->email;
                $telp = $vendor->telp;
                $alamat = $vendor->alamat;
                $nama_provinsi = $this->store_provinces->get_name_from_province_id($vendor->cat_prov);
                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($vendor->cat_city)));
                
                echo "<article class='box'>
                        
                        <figure class='col-sm-5 col-md-4'>
                            <a title='' href='#' class='hover-effect'><img width='270' height='160' alt='' src='http://placehold.it/270x160'></a>
                        </figure>
                        <div class='details col-xs-12 col-sm-7 col-md-8'>
                            <div>
                                <div id='info-general'>
                                    <h4 class='box-title'>".$nama."</h4>
                                    <br>
                                    <span><i class='soap-icon-phone yellow-color'></i> ".$telp."</span>
                                    <span><i class='soap-icon-message yellow-color'></i> ".$email."</span>
                                </div>
                            </div>
                            <div class='kota'>
                                <p><i class='soap-icon-departure yellow-color'></i> ".$alamat." <br><span>".$nama_kota."</span></p>
                            </div>
                            <div class='provinsi'>
                                <span>".$nama_provinsi."</span>
                            </div>
                        </div>
                    </article>";

            }
        }
    }

    // function create_vendor_printing() {
    //     $this->load->module('vendor');
    //     $this->load->module('store_provinces');
    //     $this->load->module('store_cities');
    //     $this->load->module('timedate');

    //     $cat = 2;
    //     $kategori = 2;

    //     if($this->input->get("page") != ''){
    //         $page = $this->input->get("page");
    //         $offset = $this->perPage * $page; 
    //         $limit = $this->perPage; 
    //         $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND kategori = $kategori AND status = 1 ORDER BY id DESC";
    //         $vendors = $this->vendor->_custom_query($mysql_query)->result();

    //         foreach ($vendors as $vendor) {
    //             $nama = $vendor->nama;
    //             $email = $vendor->email;
    //             $telp = $vendor->telp;
    //             $alamat = $vendor->alamat;
    //             $nama_provinsi = $this->store_provinces->get_name_from_province_id($vendor->cat_prov);
    //             $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($vendor->cat_city)));
                
    //             echo "<article class='box'>
                        
    //                     <figure class='col-sm-5 col-md-4'>
    //                         <a title='' href='#' class='hover-effect'><img width='270' height='160' alt='' src='http://placehold.it/270x160'></a>
    //                     </figure>
    //                     <div class='details col-xs-12 col-sm-7 col-md-8'>
    //                         <div>
    //                             <div id='info-general'>
    //                                 <h4 class='box-title'>".$nama."</h4>
    //                                 <br>
    //                                 <span><i class='soap-icon-phone yellow-color'></i> ".$telp."</span>
    //                                 <span><i class='soap-icon-message yellow-color'></i> ".$email."</span>
    //                             </div>
    //                         </div>
    //                         <div class='kota'>
    //                             <p><i class='soap-icon-departure yellow-color'></i> ".$alamat." <br><span>".$nama_kota."</span></p>
    //                         </div>
    //                         <div class='provinsi'>
    //                             <span>".$nama_provinsi."</span>
    //                         </div>
    //                     </div>
    //                 </article>";

    //         }
    //     }
    // }

     function create_vendor_legal2() {
        $this->load->module('vendor');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('timedate');

        $cat = 3;

        if($this->input->get("page") != ''){
            $page = $this->input->get("page");
            $offset = $this->perPage * $page; 
            $limit = $this->perPage; 
            $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND status = 1 ORDER BY id DESC";
            $vendors = $this->vendor->_custom_query($mysql_query)->result();

            foreach ($vendors as $vendor) {
                $nama = $vendor->nama;
                $email = $vendor->email;
                $telp = $vendor->telp;
                $alamat = $vendor->alamat;
                $nama_provinsi = $this->store_provinces->get_name_from_province_id($vendor->cat_prov);
                $nama_kota = ucwords(strtolower($this->store_cities->get_name_from_city_id($vendor->cat_city)));
                
                echo "<div class='col-sm-6 col-md-4'>
                            <article class='box'>
                                <figure>
                                    <a href='#' class='hover-effect'><img width='270' height='160' alt='' src='http://placehold.it/270x160'></a>
                                </figure>
                                <div class='details'>
                                    
                                    <h4 class='box-title'>".$nama."</h4>
                                    <div class='feedback'>
                                        <span><i class='soap-icon-phone yellow-color'></i> ".$telp."</span>
                                        <span class='review'><i class='soap-icon-message yellow-color'></i> ".$email."</span>
                                    </div>
                                    <p class='description kota'>
                                        <span><i class='soap-icon-departure yellow-color'></i> ".$alamat."</span>
                                        <br>
                                        <span>".$nama_kota." - ".$nama_provinsi."</span>
                                    </p>
                                    <div class='action'>
                                        <a class='button btn-small yellow full-width' href='#'>VIEW</a>
                                    </div>
                                </div>
                            </article>
                        </div>";

            }
        }
    }

    function create_vendor_productions() {
        $this->load->module('vendor');
        $cat = 2;
        $kategori = 2;
        $mysql_query = $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND kategori = $kategori AND status = 1 ORDER BY id DESC";
        $vendors = $this->vendor->_custom_query($mysql_query);

        return $vendors;
    }

    function create_vendor_printing() {
        $this->load->module('vendor');
        $cat = 2;
        $kategori = 1;
        $mysql_query = $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND kategori = $kategori AND status = 1 ORDER BY id DESC";
        $vendors = $this->vendor->_custom_query($mysql_query);

        return $vendors;
    }

    function create_vendor_legals() {
        $this->load->module('vendor');
        $cat = 3;
        $mysql_query = $mysql_query = "SELECT * FROM vendor WHERE vendor_cat = $cat AND status = 1 ORDER BY id DESC";
        $vendors = $this->vendor->_custom_query($mysql_query);

        return $vendors;
    }

    function download_file($type, $update_id) {
        $this->load->module('site_security');
        $this->load->module('vendor');
        $this->site_security->_make_sure_logged_in();

        header("Content-type:application/image");

        $data = $this->vendor->fetch_data_from_db($update_id);
        $nama = $data[$type];
        $loc = $this->vendor->location($type);
        $path = base_url().$loc;

        $name = $path.$nama;
        $data = file_get_contents($path.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

}