<?php
class Invoices extends MX_Controller 
{

    var $mailFrom;
    var $mailPass;

    function __construct() {
        parent::__construct();
        $this->load->model(array('invoice', 'client', 'item', 'payment', 'app'));
        $this->filter_by = $this->_filter_by();
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
    }

    public function transactions($invoice_id = null)
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $this->load->model('Payment');
        // $this->template->title(lang('payments'));
        // $data['page'] = lang('invoices');

        // $data['invoices'] = $this->_show_invoices();
        // $data['datatables'] = true;
        $data['payments'] = Payment::by_invoice($invoice_id);
        $data['id'] = $invoice_id;

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "invoice_payments";
        $this->load->module('templates');
        $this->templates->admin(isset($data) ? $data : null);
       
    }

function generate_invoice_number() {
    $query = $this->db->query('SELECT reference_no, inv_id FROM invoices WHERE inv_id = (SELECT MAX(inv_id))');

    // $query = self::$db->select('reference_no')->select_max('inv_id')->get('invoices');
    if ($query->num_rows() > 0) {
        $row = $query->row();
        $ref_number = intval(substr($row->reference_no, -4));
        $next_number = $ref_number + 1;
        if ($next_number < 1) {
            $next_number = 1;
        }
        $next_number = $this->ref_exists($next_number);

        return sprintf('%04d', $next_number);
    } else {
        return sprintf('%04d', 1);
    }
}

public function ref_exists($next_number)
{
    $next_number = sprintf('%04d', $next_number);
    $records = $this->db->where('reference_no', 'INV'.$next_number)
        ->get('invoices')->num_rows();
    if ($records > 0) {
        return $this->ref_exists($next_number + 1);
    } else {
        return $next_number;
    }
}

public function index()
{
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $data['query'] = $this->get('inv_id');

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function add() {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('invoices');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('reference_no', 'Reference Number', 'trim|required');
        $this->form_validation->set_rules('client', 'Klien', 'trim|required');
        $this->form_validation->set_rules('due_date', 'Jatuh Tempo', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            if (is_numeric($update_id)) {
                $this->_update($update_id, $data);
                $flash_msg = "The invoice were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('invoices/add/'.$update_id);
            } else {
                $data['date_saved'] = time();
                $this->_insert($data);
                $update_id = $this->get_max();

                $flash_msg = "The invoice was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('invoices/view/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Tambah Invoice";
    } else {
        $data['headline'] = "Update Invoice";
    }

    $data['clients'] = $this->manage_daftar->get('id');

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function view($invoice_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->site_security->_make_sure_is_admin();

    $data['invoices'] = $this->_show_invoices(); // GET a list of the Invoices
    $data['id'] = $invoice_id;

    invoice::evaluate_invoice($invoice_id);

    $data['update_id'] = $invoice_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function edit($invoice_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->load->module('store_basket');
    $this->site_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit');

    if ($submit == "Cancel") {
        redirect('invoices/');
    }

    if ($submit == "Submit") {
        // process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('reference_no', 'Reference Number', 'trim|required');
        $this->form_validation->set_rules('client', 'Klien', 'trim|required');
        $this->form_validation->set_rules('due_date', 'Jatuh Tempo', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();

            if (is_numeric($invoice_id)) {
                $this->_update($invoice_id, $data);
                $flash_msg = "The invoice were successfully updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('invoices/view/'.$invoice_id);
            } else {
                $data['date_saved'] = time();
                $this->_insert($data);
                $invoice_id = $this->get_max();

                $flash_msg = "The invoice was successfully added.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('invoices/view/'.$invoice_id);
            }
        }
    }

    if ((is_numeric($invoice_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($invoice_id);
    } else {
        $data = $this->fetch_data_from_post();
    }

    if (!is_numeric($invoice_id)) {
        $data['headline'] = "Tambah Invoice";
    } else {
        $data['headline'] = "Update Invoice";
    }

    $i = Invoice::view_by_id($invoice_id);
    $id_klien = $i->client;

    $data['locations'] = $this->store_basket->get_all_own_cart($id_klien);
    $data['clients'] = $this->manage_daftar->get('id');
    $data['id'] = $invoice_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "edit";
    $this->load->module('templates');
    $this->templates->admin($data);
}

function delete($invoice_id = null) {
    if ($this->input->post()) {
        $invoice = $this->input->post('invoice', true);
        Invoice::delete($invoice);

        redirect('invoices');
    } 
}

public function remind($invoice = null) {

}

public function send_invoice($invoice_id = null) {
    $this->load->module('site_security');
    if ($this->input->post()) {
        $id = $this->input->post('invoice');
        $invoice = Invoice::view_by_id($id);

        $client = Client::view_by_id($invoice->client);
        $due = Invoice::get_invoice_due_amount($id);

        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $signature = App::email_template('email_signature', 'template_body');

        $this->_email_invoice($invoice, $message, $subject, $cc = 'off');

        $data = array(
            'emailed' => 'Yes', 
            'date_sent' => time()
        );

        Invoice::update($id, $data);

        // Log Activity
        $activity = array(
            'user' => $this->site_security->_get_user_id(),
            'module' => 'invoices',
            'module_field_id' => $id,
            'activity' => 'activity_invoice_sent',
            'icon' => 'fa-envelope',
            'value1' => $invoice->reference_no,
        );
        App::Log($activity);

    }
}

public function _email_invoice($invoice_id, $message, $subject, $cc)
{
    $this->load->module('site_security');
    $this->load->helper('file');

    $data['message'] = $message;
    $invoice = Invoice::view_by_id($invoice_id);

    $message = $this->load->view('email_template', $data, true);
    $recipient = Client::view_by_id($invoice->client)->email;
       
    $attach['inv_id'] = $invoice_id;
    
    // create attach file
    $this->attach_pdf($invoice_id);
    
    $attached_file = './resource/tmp/'.$invoice->reference_no.'.pdf';
    $attachment_url = base_url().'resource/tmp/'.$invoice->reference_no.'.pdf';

    if (strtolower($cc) == 'on') {
        $cc = $this->site_security->_get_user_mail();
    }

    $user = 'Customer Support';
    $mailTo = $recipient;
    $message = 'message';           
    $subjek = 'Selamat Bergabung di Wiklan.com';   

    $this->load->library('email');
    $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
    $this->email->to($mailTo);
    $this->email->subject($subjek);
    $this->email->message($message);
    $this->email->bcc('cs@wiklan.com');
    $this->email->cc('cs@wiklan.com'); 

    // check attachments
    if($attached_file != ''){ 
        $this->email->attach($attached_file);
    }

    if($this->email->send() == false){
        show_error($this->email->print_debugger());
    } else {
        return TRUE;
    }

    //Delete invoice in tmp folder
    if (is_file('./resource/tmp/'.$invoice->reference_no.'.pdf')) {
        unlink('./resource/tmp/'.$invoice->reference_no.'.pdf');
    }
}

public function attach_pdf($invoice_id) {
    $data['id'] = $invoice_id;
    $html = $this->load->view('invoice_pdf', $data, true);

    //this the the PDF filename that user will get to download
    $pdfFilePath = Invoice::view_by_id($invoice_id)->reference_no.'.pdf';

    include('./resource/lib/mpdf60/mpdf.php');
    $mpdf=new mPDF('','F4','','',15,15,15,16,9,9,'P');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    
    $mpdf->Output('./resource/tmp/'.$pdfFilePath,'F');
    return base_url().'resource/tmp/'.$pdfFilePath;
    // exit;
}

public function preview($invoice_id = null) {
    $data['id'] = $invoice_id;

    $this->load->view('invoice_pdf', $data);
}

public function pdf($invoice_id = null) {
   
    $data['id'] = $invoice_id;

    $html = $this->load->view('invoice_pdf', $data, true);

    //this the the PDF filename that user will get to download
    $pdfFilePath = Invoice::view_by_id($invoice_id)->reference_no.'.pdf';

    include('./resource/lib/mpdf60/mpdf.php');
    $mpdf=new mPDF('','F4','','',15,15,15,16,9,9,'P');
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html);
    
    $mpdf->Output($pdfFilePath, "D");
    exit;

}

public function cancel($invoice = null)
{
    $this->load->module('site_security');
    if ($this->input->post()) {
        $invoice_id = $this->input->post('id');
        $info = Invoice::view_by_id($invoice_id);

        $due = Invoice::get_invoice_due_amount($invoice_id);

        $data = array('status' => 'Cancelled');
        App::update('invoices', array('inv_id' => $invoice_id), $data);

        // $inv_cur = $info->currency;
        // $cur_i = App::currencies($inv_cur);

    // Log activity
        $data = array(
            'module' => 'invoices',
            'module_field_id' => $invoice_id,
            'user' => $this->site_security->_get_user_id(),
            'activity' => 'activity_invoice_cancelled',
            'icon' => 'fa-usd',
            'value1' => $info->reference_no,
            'value2' => $due,
            );
        App::Log($data);

        $flash_msg = "The invoice was successfully cancelled.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('invoices/view/'.$invoice_id);
        // Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('invoice_cancelled_successfully'));
    } else {
        $flash_msg = "The invoice was successfully cancelled.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('invoices/view/'.$invoice_id);
    }
}

public function mark_as_paid($invoice = null) {
    if ($this->input->post()) {
        $invoice_id = $this->input->post('invoice');
        $this->load->helper('string');
        $info = Invoice::view_by_id($invoice_id);

        $due = Invoice::get_invoice_due_amount($invoice_id);

        $transaction = array(
            'invoice' => $invoice_id,
            'paid_by' => $info->client,
            'payment_method' => '1',
            'currency' => $info->currency,
            'amount' => Applib::format_deci($due),
            'payment_date' => date('Y-m-d'),
            'trans_id' => random_string('nozero', 6),
            'month_paid' => date('m'),
            'year_paid' => date('Y'),
        );

        App::save_data('payments', $transaction);

        $data = array('status' => 'Paid');
        App::update('invoices', array('inv_id' => $invoice_id), $data);

        $inv_cur = $info->currency;
        $cur_i = App::currencies($inv_cur);

        // Log activity
        $data = array(
            'module' => 'invoices',
            'module_field_id' => $invoice_id,
            'user' => $this->session->userdata('user_id'),
            'activity' => 'activity_payment_of',
            'icon' => 'fa-usd',
            'value1' => $cur_i->symbol.' '.$due,
            'value2' => $info->reference_no,
        );
        App::Log($data);

        Applib::go_to('invoices/view/'.$invoice_id, 'success', lang('payment_added_successfully'));
    }
}

public function timeline($invoice_id = null) {
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();
    
    $data['activities'] = Invoice::activities($invoice_id);
    $data['invoices'] = $this->_show_invoices();
    $data['id'] = $invoice_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "timeline";
    $this->load->module('templates');
    $this->templates->admin($data);
}

public function pay($invoice_id = null)
{
    $this->load->library('session');
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    $this->load->model('Payment');
    if ($this->input->post()) {
        $invoice_id = $this->input->post('invoice');

        $paid_amount = self::format_deci($this->input->post('amount'));

        $this->form_validation->set_rules('amount', 'Amount', 'required');

        if ($this->form_validation->run() == false) {
            redirect('invoices/view/'.$invoice_id); 
        } else {
            $due = Invoice::get_invoice_due_amount($invoice_id);

            if ($paid_amount > $due) {
                // error overpaid
                redirect('invoices/view/'.$invoice_id);
            }

            if ($this->input->post('attach_slip') == 'on') {
                if (file_exists($_FILES['payment_slip']['tmp_name']) || is_uploaded_file($_FILES['payment_slip']['tmp_name'])) {
                    $upload_response = $this->upload_slip($this->input->post());
                    if ($upload_response) {
                        $attached_file = $upload_response;
                    } else {
                        $attached_file = null;
                        // error upload file
                        redirect('invoices/view/'.$invoice_id);
                    }
                }
            }

            $data = array(
                'invoice' => $invoice_id,
                'paid_by' => Invoice::view_by_id($invoice_id)->client,
                'payment_method' => $this->input->post('payment_method'),
                'currency' => $this->input->post('currency'),
                'amount' => $paid_amount,
                'payment_date' => Applib::date_formatter($this->input->post('payment_date')),
                'trans_id' => $this->input->post('trans_id'),
                'notes' => $this->input->post('notes'),
                'month_paid' => date('m'),
                'year_paid' => date('Y'),
            );

            $payment_id = Payment::save_pay($data);

            if (isset($attached_file)) {
                $data = array('attached_file' => $attached_file);
                Payment::update_pay($payment_id, $data);
            }

            if (Invoice::payment_status($invoice_id) == 'fully_paid') {
                Invoice::update($invoice_id, array('status' => 'Paid'));
            }
            // Log Activity
            $cur = Invoice::view_by_id($invoice_id)->currency;
            $cur_i = App::currencies($cur);

            $data = array(
                'user' => $this->session->userdata('id_admin'),
                'module' => 'invoices',
                'module_field_id' => $invoice_id,
                'activity' => 'activity_payment_of',
                'icon' => 'fa-usd',
                'value1' => 'Rp. '.$paid_amount,
                'value2' => Invoice::view_by_id($invoice_id)->reference_no,
            );
            App::Log($data); // Log activity

            if ($this->input->post('send_thank_you') == 'on') {
                $this->_send_payment_email($invoice_id, $paid_amount);
            } //send thank you email

            if (config_item('notify_payment_received') == 'TRUE') {
                $this->_notify_admin($invoice_id, $paid_amount, $cur);
            }
            // success payment add
            redirect('invoices/view/'.$invoice_id);
        }
    } else {
        

        $data['id'] = $invoice_id;
        $data['invoices'] = $this->_show_invoices();

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "pay_invoice";
        $this->load->module('templates');
        $this->templates->admin($data);
    }
}

static function format_deci($num){
    $num = str_replace(',', '.', $num);
    return number_format($num,2,'.','');
}

function fetch_data_from_post() {
    $data['reference_no'] = $this->input->post('reference_no', true);
    $data['client'] = $this->input->post('client', true);
    $data['id_transaction'] = $this->input->post('id_transaction', true);
    $data['due_date'] = $this->input->post('due_date', true);
    $data['notes'] = $this->input->post('notes', true);
    $data['tax'] = $this->input->post('ppn', true);
    $data['tax2'] = $this->input->post('pph', true);
    $data['discount'] = $this->input->post('discount', true);
    $data['status'] = $this->input->post('status', true);
    $data['archived'] = $this->input->post('archived', true);
    $data['date_sent'] = time();
    $data['date_saved'] = time();
    $data['inv_deleted'] = $this->input->post('inv_deleted', true);
    $data['emailed'] = $this->input->post('emailed', true);
    $data['viewed'] = $this->input->post('viewed', true);
    $data['alert_overdue'] = $this->input->post('alert_overdue', true);
    $data['extra_fee'] = $this->input->post('extra_fee', true);
    return $data;
}

function fetch_data_from_db($updated_id) {
    $query = $this->get_where($updated_id);
    foreach ($query->result() as $row) {
        $data['inv_id'] = $row->inv_id;
        $data['reference_no'] = $row->reference_no;
        $data['client'] = $row->client;
        $data['id_transaction'] = $row->id_transaction;
        $data['due_date'] = $row->due_date;
        $data['notes'] = $row->notes;
        $data['tax'] = $row->tax;
        $data['tax2'] = $row->tax2;
        $data['discount'] = $row->discount;
        $data['status'] = $row->status;
        $data['archived'] = $row->archived;
        $data['date_sent'] = $row->date_sent;
        $data['date_saved'] = $row->date_saved;
        $data['inv_deleted'] = $row->inv_deleted;
        $data['emailed'] = $row->emailed;
        $data['viewed'] = $row->viewed;
        $data['alert_overdue'] = $row->alert_overdue;
        $data['extra_fee'] = $row->extra_fee;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

     // List items ordered
    public function has_items($id, $type = 'invoice')
    {
        $table = ($type == 'invoice' ? '' : 'estimate_').'items';

        return $this->db->where($type.'_id', $id)->order_by('item_order', 'asc')->get($table)->result();
    }

    public function _show_invoices($user_id = null)
    {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_is_admin();

        if ($this->site_security->_make_sure_is_admin() == TRUE) {
            return $this->all_invoices($this->filter_by);
        } else {
            return $this->client_invoices($this->manage_daftar->get_company($user_id), $this->filter_by);
        }
    }

    public function all_invoices($filter_by = null)
    {

        switch ($filter_by) {
            case 'paid':
            return invoice::paid_invoices();
            break;

            case 'unpaid':
            return invoice::unpaid_invoices();
            break;

            case 'partially_paid':
            return invoice::partially_paid_invoices();
            break;

            case 'recurring':
            return invoice::recurring_invoices();
            break;

            default:
            return invoice::get_invoices();
            break;
        }
    }

    public function client_invoices($company, $filter_by)
    {

        switch ($filter_by) {

            case 'paid':
                return invoice::paid_invoices($company);
                break;

            case 'unpaid':
                return invoice::unpaid_invoices($company);
            break;

            case 'partially_paid':
                return invoice::partially_paid_invoices($company);
            break;

            case 'recurring':
                return invoice::recurring_invoices($company);
            break;

            default:
                return invoice::get_client_invoices($company);
            break;
        }
    }

    public function _filter_by()
    {
        $filter = isset($_GET['view']) ? $_GET['view'] : '';

        switch ($filter) {

            case 'paid':
            return 'paid';
            break;

            case 'unpaid':
            return 'unpaid';
            break;

            case 'partially_paid':
            return 'partially_paid';

            break;
            case 'recurring':
            return 'recurring';
            break;

            default:
            return null;
            break;
        }
    }

function get($order_by)
{
    $this->load->model('mdl_invoices');
    $query = $this->mdl_invoices->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_invoices');
    $query = $this->mdl_invoices->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_invoices');
    $query = $this->mdl_invoices->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_invoices');
    $query = $this->mdl_invoices->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_invoices');
    $this->mdl_invoices->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_invoices');
    $this->mdl_invoices->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_invoices');
    $this->mdl_invoices->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_invoices');
    $count = $this->mdl_invoices->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_invoices');
    $max_id = $this->mdl_invoices->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_invoices');
    $query = $this->mdl_invoices->_custom_query($mysql_query);
    return $query;
}

}