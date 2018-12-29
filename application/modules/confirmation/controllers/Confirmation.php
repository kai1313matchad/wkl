<?php
class Confirmation extends MX_Controller 
{
    var $mailFrom;
    var $mailPass;
    // var $mailFrom = 'systemmatch@match-advertising.com';
    // var $mailPass = 'Rahasia2017';
    var $path_image = './marketplace/konfirmasi/';
    function __construct() {
        parent::__construct();
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
    }

    function send_mail_confirmation($email, $username, $inv_code, $rekening, $jml, $tgl, $bank) {
        // $this->load->module('site_settings');
        $this->load->module('bank');
        $nominal = substr(str_replace( ',', '', $jml), 0);
        $rupiah = number_format($nominal,0,',','.');
        $riba = $this->bank->get_nama_and_rek($bank);

        // $config = Array(
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_port' => 465,
        //     'smtp_user' => $this->mailFrom,
        //     'smtp_pass' => $this->mailPass,
        //     'mailtype'  => 'html', 
        //     'charset'   => 'utf-8'
        // );

        $user = 'Customer Support';
        $mailTo = $email;
        $message = '<!DOCTYPE html PUBLIC ".//W3C//DTD XHTML 1.0 Strct//EN"
                    "http://www.w3.org/TR/xhtml1-strict.dtd"><html>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    </head><body>';
        $message .= '<strong><p>Dear '.$username.',</p></strong>';
        $message .= '<p>Selamat anda berhasil melakukan <strong><a href="' . base_url() .'confirmation">konfirmasi pembayaran</a></strong> sebagai klien di Wiklan.com. Pastikan data anda masukan sudah benar dan valid.</p>';

        $message .= '<table>
        <tbody>
            <tr>
                <td><strong>No Invoice</strong></td>
                <td>:</td>
                <td>'.$inv_code.'</td>
            </tr>
            <tr>
                <td><strong>No Rekening</strong></td>
                <td>:</td>
                <td>'.$rekening.'</td>
            </tr>
            <tr>
                <td><strong>Jumlah Transfer</strong></td>
                <td>:</td>
                <td>'.$rupiah.'</td>
            </tr>
            <tr>
                <td><strong>Tanggal Transfer</strong></td>
                <td>:</td>
                <td>'.$tgl.'</td>
            </tr>
            <tr>
                <td><strong>Transfer Bank</strong></td>
                <td>:</td>
                <td>'.$riba.'</td>
            </tr>
        </tbody>
    </table>';
       
        $message .= '<p>Jika perlu bantuan bisa <strong><a href="' . base_url() .'templates/home#contact">Hubungi Kami</a></strong> perihal konfirmasi pembayaran atau pertanyaan lain-nya.</p><br>';
        
        $message .= '<strong><p>Terima Kasih, Salam Hormat.</p></strong>';
        $message .= '<p>Customer Support </p><br>';
        $message .= '<em><p>*Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem.</p></em>';
        $message .= '</body></html>';           
        $subjek = 'Wiklan - Konfirmasi Pembayaran';

        // $this->load->library('email');
        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->email->set_header('MIME-Version', '1.0; charset= utf-8');
        // $this->email->set_header('Content-type', 'text/html');
        // $this->email->from($this->mailFrom, 'Konfirmasi');
        // $this->email->to($mailTo);
        // $this->email->cc($this->mailFrom);
        // $this->email->subject($subjek);
        // $this->email->message($message);   

        $this->load->library('email');
        $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
        $this->email->to($mailTo);
        $this->email->subject($subjek);
        $this->email->message($message);
        $this->email->bcc('cs@wiklan.com');
        $this->email->cc('cs@wiklan.com');
        // $this->email->send();

        //$this->email->message(strip_tags($message));
        if($this->email->send() == false){
            show_error($this->email->print_debugger());
        } else {
            return TRUE;
        }
    }

function add_confirm() {
    $this->load->library('session');

    $submit = $this->input->post('submit');

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('order_id', 'Order ID', 'trim|required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('no_rek', 'No Rekening', 'trim|required');
        $this->form_validation->set_rules('jml_transfer', 'Nominal Transfer', 'trim|required');
        $this->form_validation->set_rules('nama_bank', 'Bank', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            // jika ada gambar
            if ($_FILES['bukti']['name']) {

                $nama_baru = str_replace(' ', '_', $_FILES['bukti']['name']);       
                $nmfile = date("ymdHis").'_'.$nama_baru;

                $config['upload_path']          = $this->path_image;
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['file_name']            = $nmfile; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                // check upload berhasil ato tidak
                if ($this->upload->do_upload('bukti'))
                {
                    
                    // insert other data to db
                    $confirm_data = $this->fetch_data_from_post();
                    $this->_insert($confirm_data);
                    // send mail confirmation
                    $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('nama', true), $this->input->post('order_id', true), $this->input->post('no_rek', true), str_replace('.', '', $this->input->post('jml_transfer', true)), $this->input->post('tgl_transaksi', true), $this->input->post('nama_bank', true));
                    $update_id = $this->get_max();

                    $data = array('upload_data' => $this->upload->data());

                    $upload_data = $data['upload_data'];
                    $file_name = $upload_data['file_name'];
                    // $this->_generate_thumbnail($file_name);

                    //update database
                    $update_data['pic_evidance'] = $$nmfile;
                    $this->_update($update_id, $update_data);

                    $flash_msg = "Konfirmasi pembayaran Anda berhasil di kirim.";
                    $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('confirmation');
                
                } else {
                    // $data['error'] = array('error' => $this->upload->display_errors("<p style='color:red;'>", "</p>"));
                    // $data['banks'] = $this->bank->get('id');
                    // $data['view_file'] = "payment_confirmation";
                    // $this->load->module('templates');
                    // $this->templates->market($data);

                    $flash_msg = "The image was failed uploaded.";
                    $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('confirmation');

                }

            } else {  // jika tanpa gambar
                $data = $this->fetch_data_from_post();
                $this->_insert($data);
                // send mail confirmation
                $this->send_mail_confirmation($this->input->post('email', true), $this->input->post('nama', true), $this->input->post('order_id', true), $this->input->post('no_rek', true), str_replace('.', '', $this->input->post('jml_transfer', true)), $this->input->post('tgl_transaksi', true), $this->input->post('nama_bank', true));

                $$flash_msg = "The payment confirmation was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('confirmation');
            }
            
        } else {
            $flash_msg = "The payment confirmation added was failed.";
            $value = '<div class="alert alert-danger alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('confirmation');
        }
    }
}

function getData() {
    $this->load->module('bank');
    $this->load->module('site_settings');
    $this->load->module('timedate');

    $mysql_query = "SELECT * FROM payment_conf ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $edit_confirmation = base_url()."confirmation/create/".$row->id;
        $opened = $row->opened;
        $status = $row->status;

        if ($status == 1) {
            $status_label = "m-badge--success";
            $status_desc = "Active";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Inactive";
        }

        $nama_bank = $this->bank->get_nama_bank($row->nama_bank);
        $waktu = $this->timedate->get_nice_date($row->created_at, 'indo');

        $data_payment[] = array(
            "#" => $no++,
            "Invoice ID" => $row->invoice_id,
            "No Rekening" => $row->no_rek,
            "Kustomer"    => "<span class='".$this->open($opened)."'>".$row->customer."</span>",
            "Nominal" => $this->site_settings->currency_format2($row->jml_transfer),
            "Bank" => $nama_bank,
            "Tanggal" => $waktu,
            "Aksi" => "
                <span style='overflow: visible; width: 110px;''>                      
                <a href='".$edit_confirmation."' class='m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' title='Edit details'>                          
                    <i class='la la-edit'></i>                      
                </a>                        
                <a href='#' onclick='hapus_dokumen(\"".$row->id."\")' class='m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill' title='Delete' data-toggle='modal' data-target=''>                           
                    <i class='la la-trash'></i>                     
                </a>    
                </span>
            "
        );
    }
    echo json_encode($data_payment);
}

function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function check_order_id() {
    $this->load->module('invoices');

    $invoice_id = $this->input->post('id');
    if (is_numeric($invoice_id)) {
        $data['error'] = 'tidak ada data';
    } else {
        // cek now
        $col = 'reference_no';
        $val = $invoice_id;
        $query = $this->invoices->get_where_custom($col, $val);

        // $mysql_query = 'SELECT * FROM invoices WHERE reference_no = $invoice_id';
        // $query = $this->invoices->_custom_query($mysql_query);

        if ($query->num_rows() > 0) {
            $data['success'] = 'data ada';
        } else {
            $data['error'] = 'tidak ada data';
        }

    }

    echo json_encode($data);
}

function _compress_report($file_name, $type) {
    $this->load->module('manage_product');
    $loc = $this->manage_product->location($type);
    // create thumbnail

    $config['image_library'] = 'gd2';
    $config['source_image'] = $loc.$file_name;
    $config['new_image'] = $loc.'300x160/'.$file_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 300;
    $config['height']       = 160;

    // $this->image_lib->initialize($config);
    $this->load->library('image_lib', $config);
    $this->image_lib->resize();
}

function add_image() {
    $nama_baru = str_replace(' ', '_', $_FILES['userfile']['name']);
                
    $nmfile = date("ymdHis").'_'.$nama_baru;

    $config['upload_path']          = $loc; //$this->path;
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size'] = '50048'; //maksimum besar file 5 mb
    $config['max_width']  = '1600'; //lebar maksimum 1288 px
    $config['max_height']  = '768'; //tinggi maksimu 768 px    
    $config['file_name'] = $nmfile; //nama yang terupload nantinya

    $location = base_url().$loc.$nmfile;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
        $error_msg = $this->upload->display_errors();
        $flash_msg = "The file were could not be added.";
        $value = '<div class="alert alert-notice alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_product/maintenance/'.$update_id);
    }
    else
    {
        $this->_compress_report($nmfile, $type);

        $this->db->insert('maintain_report', array('prod_id' => $prod_id, 'image' => $nmfile, 'type' => $type, 'token' => $token, 'created_at' => time()));

        $flash_msg = "The file were successfully added.";
        $value = '<div class="alert alert-success alert-dismissible show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_product/maintenance/'.$update_id);
    }    
}

public function index()
{
    $this->load->library('session');
    $this->load->module('bank');
    $data['flash'] = $this->session->flashdata('item');
    $mysql_query = "SELECT * FROM bank WHERE status = 1";
    $data['banks'] = $this->bank->_custom_query($mysql_query);
    $data['view_file'] = "payment_confirmation";
    $this->load->module('templates');
    $this->templates->market($data);  
}

function create() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('bank');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);

    if ((is_numeric($update_id))) {
        $data = $this->fetch_data_from_db($update_id);
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Konfirmasi Pembayaran";
    } else {
        $data['headline'] = "Lihat Konfirmasi Pembayaran";
    }

    $this->_set_to_opened($update_id);

    $data['banks'] = $this->bank->get('id');
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

 function _set_to_opened($update_id) {
    $data['opened'] = 1;
    $this->_update($update_id, $data);
}

function manage() {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $mysql_query = 'SELECT * FROM payment_conf ORDER BY id DESC';
    $data['query'] = $this->_custom_query($mysql_query);

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function fetch_data_from_post() {
    $data['invoice_id'] = $this->input->post('invoice_id', true);
    $data['no_rek'] = $this->input->post('no_rek', true);

    $tgl_transaksi = $this->input->post('tgl_transaksi', true);
    //fix start date
    $transaksi_date = explode('/', $tgl_transaksi);
    $transaction_date = strtotime($transaksi_date[2].'-'.$transaksi_date[0].'-'.$transaksi_date[1]);

    $data['tgl_transaksi'] = $transaction_date;
    $data['customer'] = $this->input->post('nama', true);
    $data['telpon'] = $this->input->post('telpon', true);
    $data['jml_transfer'] = str_replace('.', '', $this->input->post('jml_transfer', true));
    $data['nama_bank'] = $this->input->post('nama_bank', true);
    $data['email'] = $this->input->post('email', true);
    $data['catatan'] = $this->input->post('catatan', true);   
    $data['status'] = $this->input->post('status', true);
    $data['created_at'] = time();
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['id'] = $row->id;
        $data['invoice_id'] = $row->invoice_id;
        $data['no_rek'] = $row->no_rek;
        $data['tgl_transaksi'] = $row->tgl_transaksi;
        $data['customer'] = $row->customer;
        $data['telpon'] = $row->telpon;
        $data['jml_transfer'] = $row->jml_transfer;
        $data['nama_bank'] = $row->nama_bank;
        $data['email'] = $row->email;
        $data['pic_evidance'] = $row->pic_evidance;
        $data['status'] = $row->status;
        $data['catatan'] = $row->catatan;
        $data['created_at'] = $row->created_at;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}


function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('site_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit == "Cancel") {
        redirect('manage_faq/create/'.$update_id);
    } elseif ($submit == "Delete") {
        // delete the item record from db
        $this->_delete($update_id);
        // $this->_process_delete($update_id);

        $flash_msg = "The faq were successfully deleted.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('manage_faq/manage');
    }
}

function get($order_by)
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_confirmation');
    $this->mdl_confirmation->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_confirmation');
    $count = $this->mdl_confirmation->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_confirmation');
    $max_id = $this->mdl_confirmation->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_confirmation');
    $query = $this->mdl_confirmation->_custom_query($mysql_query);
    return $query;
}

}