<?php
class Store_orders extends MX_Controller 
{

    var $mailFrom;
    var $mailPass;
    var $path_approval;
    var $limit_upload;
    function __construct() {
        parent::__construct();
        $this->load->model(array('invoice', 'client', 'item', 'payment', 'app'));
        $this->load->model(array('Client', 'App', 'Project'));
        $mailFrom = $this->db->get_where('settings' , array('type'=>'email'))->row()->description;
        $mailPass = $this->db->get_where('settings' , array('type'=>'password'))->row()->description;
        $path_approval = './marketplace/approval/';
        $limit_upload = 12;
    }

    

function update_poin($order_id, $old_poin = 0, $new_poin) {
    $this->load->module('site_security');
    $this->site_security->_make_sure_is_admin();

    // get poin
    $point = $this->db->where('id', $order_id)->get('store_orders')->row()->poin;

    // proses pengurangan poin
    $this->substract_poin($order_id, $point, $old_poin);

    // current poin
    $curr_point = $this->db->where('id', $order_id)->get('store_orders')->row()->poin;

    // proses penambahan poin
    $this->add_poin($order_id, $curr_point, $new_poin);
    
}

function substract_poin($id, $point, $old_poin) {
    $curr_point = $point - $old_poin;

    $this->_update($id, array('poin' => $curr_point));
    return TRUE;
}

function add_poin($id, $curr_point, $new_poin) {
    $now_point = $curr_point + $new_poin;

    $this->_update($id, array('poin' => $now_point));
    return TRUE;
}

    function scoring() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_score');
        $this->load->module('manage_poin');
        $this->site_security->_make_sure_is_admin();

        $order_id = $this->input->post('order_id');
        $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
        $visual = $this->input->post('visual');
        $penerangan = $this->input->post('penerangan');
        $view = $this->input->post('view');
        $report = $this->input->post('report');
        $konstruksi = $this->input->post('konstruksi');
        $maintenance = $this->input->post('maintenance');
        $old_poin = $this->input->post('old_poin');
        $bulan = $this->input->post('bulan');

        $submit = $this->input->post('submit');
        if ($submit == 'Submit') {
            $data = array(
                'order_id' => $order_id,
                'user_id' => $user_id,
                'bulan' => $bulan,
                'visual' => $visual,
                'penerangan' => $penerangan,
                'view' => $view,
                'report' => $report,
                'konstruksi' => $konstruksi,
                'maintenance' => $maintenance,
                'created' => time(),
                'modified' => time()
            );

            // new poin
            $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;

            if ($this->manage_score->check_availability2($order_id, $user_id, $bulan) == 'TRUE') {
                // get id score
                $id_score = $this->manage_score->get_id2($order_id, $user_id, $bulan);
                // update score
                $this->manage_score->_update($id_score, $data);
                
                // jumlah poin yang didapat
                $jml_point = $this->manage_score->get_score2($order_id, $user_id, $bulan);

                // update points di tabel points
                $this->manage_poin->update_poin($user_id, $old_poin, $total);

                // update poin di tabel store_order
                // $this->db->update('store_orders', array('poin' => $jml_point), array('id' => $order_id));
                $this->update_poin($order_id, $old_poin, $total);
                
                $flash_msg = "Penilaian Updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_orders/penilaian/'.$order_id);
            } else {
                // insert data to tabel score
                $this->manage_score->_insert($data);
                
                // update poin di tabel store_order
                // $this->db->update('store_orders', array('poin' => $total), array('id' => $order_id));
                $this->update_poin($order_id, $old_poin, $total);

                // cek data availabel
                if ($this->manage_poin->check_availability($user_id) == 'TRUE') {
                    // update points di tabel points
                    $this->manage_poin->update_poin($user_id, $old_poin, $total);
                } else {
                    // insert jml poin di tabel points
                    $this->manage_poin->_insert(array('user_id'=> $user_id, 'points'=> $total, 'created'=> time(), 'modified'=>time(), 'status'=>1));
                }

                $flash_msg = "Penilaian Submitted.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_orders/penilaian/'.$order_id);
            }
        }
            
    }

    function score() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_score');
        $this->load->module('manage_poin');
        $this->site_security->_make_sure_is_admin();

        $order_id = $this->input->post('order_id');
        $user_id = $this->db->where('id', $order_id)->get('store_orders')->row()->shopper_id;
        $visual = $this->input->post('visual');
        $penerangan = $this->input->post('penerangan');
        $view = $this->input->post('view');
        $report = $this->input->post('report');
        $konstruksi = $this->input->post('konstruksi');
        $maintenance = $this->input->post('maintenance');
        $old_poin = $this->input->post('old_poin');

        $submit = $this->input->post('submit');
        if ($submit == 'Submit') {
            $data = array(
                'order_id' => $order_id,
                'user_id' => $user_id,
                'visual' => $visual,
                'penerangan' => $penerangan,
                'view' => $view,
                'report' => $report,
                'konstruksi' => $konstruksi,
                'maintenance' => $maintenance,
                'created' => time(),
                'modified' => time()
            );

            // new poin
            $total = $visual + $penerangan + $view + $report + $konstruksi + $maintenance;

            if ($this->manage_score->check_availability($order_id, $user_id) == 'TRUE') {
                $id_score = $this->manage_score->get_id($order_id, $user_id);
                $this->manage_score->_update($id_score, $data);
                
                // jumlah poin yang didapat
                $jml_point = $this->manage_score->get_score($order_id, $user_id);

                // update points di tabel points
                $this->manage_poin->update_poin($user_id, $old_poin, $total);

                // update poin di tabel store_order
                $this->db->update('store_orders', array('poin' => $jml_point), array('id' => $order_id));
                

                $flash_msg = "Penilaian Updated.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_orders/manage');
            } else {
                $this->manage_score->_insert($data);
                
                // update poin di tabel store_order
                $this->db->update('store_orders', array('poin' => $total), array('id' => $order_id));

                // cek data availabel
                if ($this->manage_poin->check_availability($user_id) == 'TRUE') {
                    // update points di tabel points
                    $this->manage_poin->update_poin($user_id, $old_poin, $total);
                } else {
                    // insert jml poin di tabel points
                    $this->manage_poin->_insert(array('user_id'=> $user_id, 'points'=> $total, 'created'=> time(), 'modified'=>time(), 'status'=>1));
                }

                $flash_msg = "Penilaian Submitted.";
                $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_orders/manage');
            }
        }
            
    }

    // function tes_reward($order_id) {
    //     $price = $this->db->where('id', $order_id)->get('store_orders')->row()->price;
    //     $reward = substr($price, 0, -6);
    //     echo $reward;
    // }

    function _get_reward($order_id) {
        $price = $this->db->where('id', $order_id)->get('store_orders')->row()->price;
        if ($price > 0) {
            $reward = substr($price, 0, -6);
            return $reward;
        }
    }

    function add_reward($order_id) {
        $this->load->module('manage_product');
        $this->load->module('manage_daftar');
        $order = $this->db->where('id', $order_id)->get('store_orders')->row();
        $shopper_id = $order->shopper_id;
        // get nominal coin
        $reward = $this->_get_reward($order_id);
        $data_user = $this->manage_daftar->fetch_data_from_db($shopper_id);
        $curr_coin = $data_user['coin'];
        if ($coin > 0) {
            //update database
            $update_data['coin'] = $curr_coin + $reward;
            $this->manage_daftar->_update($shopper_id, $update_data);
        }
    }

    function cek_tayang($order_id) {
        $now = time();
        // cek is orders approved
        $approved = $this->db->where('id', $order_id)->get('store_orders')->row()->approved;
        // get akhir tayang
        $end = $this->db->where('id', $order_id)->get('store_orders')->row()->end;

        if ($approved == 1) {
            
            if ($end - $now > 0) {
                $alert = '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            Info!
                        </strong>
                        masih tayang!
                    </div>';
            } else {
                $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            Alert!
                        </strong>
                        habis tayang!
                    </div>';
            }
        } else {
            $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        <strong>
                            Warning!
                        </strong>
                        belum di approve!
                    </div>';
        }

        return $alert;
    }

    function cek_slot($item_id) {
        if (!is_numeric($item_id)) {
            die('Non-numeric variable!');
        }

        $mysql_query = "SELECT SUM(slot) AS slots FROM store_orders WHERE item_id = $item_id AND order_status = 'Active' AND approved = 1";
        $query = $this->_custom_query($mysql_query);

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $count = $row->slots;
            }
        } else {
            $count = 0;
        }

        return $count;
    }

    function cek_termin($duration) {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        if ($duration <= 3) {
            $termin = 1;
        } elseif ($duration > 3 && $duration <= 9) {
            $termin = 2;
        } else {
            $termin = 3;
        }

        return $termin;
    }

    function send_approval($order_id = null) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_orders/manage');
        }

        if ($submit == "Submit") {
            // get id shopper from id orders
            $customer_id = $this->_get_customer_id($order_id);
            // get email from id user
            $recipient = $this->manage_daftar->get_email_from_id($customer_id); //'webdeveloper@wiklan.com'; 
            $customer_name = strtoupper($this->manage_daftar->_get_customer_name($customer_id));
            $lokasi = $this->_get_lokasi_name($order_id);

            $recipient1 = $recipient;
            $recipient2 = 'webdeveloper@wiklan.com';

            $email = array($recipient1, $recipient2);

            // jika ada file yg di upload
            if ($_FILES['approval']['name'] != '') {
                $filename = $_FILES['file']['name'];
                $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
                $nama_baru = str_replace(' ', '_', $new_filename);
            
                $nmfile = date("ymdHis").'_'.$nama_baru;
                $path_file = './marketplace/approval/'.$nmfile;
                
                $config['upload_path'] = './marketplace/approval/'; //$this->path_approval; //$this->path;
                $config['allowed_types'] = '*';
                $config['overwrite'] = FALSE;
                $config['remove_spaces'] = TRUE;
                $config['file_name'] = $nmfile;

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload('approval')) {
                    $user = 'Admin';
                    $mailTo = implode(', ', $email); //$recipient;
                    $subjek = 'MOHON ACC APPROVAL '.$customer_name.' untuk lokasi '.$lokasi;

                    // buat template
                    $data['user_id'] = $customer_id;
                    $mysql_query = "SELECT * FROM store_orders WHERE id = $order_id";
                    $data['products'] = $this->_custom_query($mysql_query);
                    $body = $this->load->view('mail_temp', $data, true);

                    $this->load->library('email');
                    $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
                    $this->email->to($mailTo);
                    $this->email->subject($subjek);
                    $this->email->message($body);
                    $this->email->attach($file_data['full_path']);
                    $this->email->bcc('cs@wiklan.com');
                    $this->email->cc('cs@wiklan.com');

                    if ($this->email->send()){
                        if (file_exists($path_file)) {
                            unlink($path_file);
                            $flash_msg = "Approval sended.";
                            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('store_orders/approval/'.$order_id); 
                        }
                        
                    } else {
                        if (file_exists($path_file)) {
                            unlink($path_file);
                            $flash_msg = "There is an error in email send.";
                            $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                            $this->session->set_flashdata('item', $value);
                            redirect('store_orders/approval/'.$order_id); 
                        }
                        // show_error($this->email->print_debugger());
                    }
                } else {
                    $flash_msg = "There is an error in attach file.";
                    $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('store_orders/approval/'.$order_id); 
                }
            }
        }

    }

function send_tax_report() {
    error_reporting(0);
    $this->load->library('session');
    $this->load->module('site_security');
    $this->load->module('manage_daftar');
    $this->site_security->_make_sure_is_admin();

    $order_id = $this->input->post('order_id');
    $user_id = $this->input->post('user_id');
    $submit = $this->input->post('submit');
    $no_invoice = $this->input->post('no_invoice');

    if ($submit == "Cancel") {
        redirect('store_orders/manage');
    }

    // var_dump($_FILES['file']['name']);
    // die();

    if ($submit == "Submit") {

        // get id shopper from id orders
        $customer_id = $this->_get_customer_id($order_id);
        // get email from id user
        $recipient = $this->manage_daftar->get_email_from_id($customer_id); //'webdeveloper@wiklan.com'; 
        $customer_name = strtoupper($this->manage_daftar->_get_customer_name($customer_id));
        $lokasi = $this->_get_lokasi_name($order_id);
        $no_transaksi = $this->db->where('id', $order_id)->get('store_orders')->row()->no_transaksi;

        $recipient1 = $recipient;
        $recipient2 = 'webdeveloper@wiklan.com';

        $email = array($recipient1, $recipient2);

        // jika ada file yg di upload
        if ($_FILES['file']['name'] != '') {
            $filename = $_FILES['file']['name'];
            $new_filename = str_replace(".", "_", substr($filename, 0, strrpos($filename, ".")) ).".".end(explode('.',$filename));
            $nama_baru = str_replace(' ', '_', $new_filename);
        
            $nmfile = date("ymdHis").'_'.$nama_baru;
            $path_file = './marketplace/approval/'.$nmfile;
            
            $config['upload_path'] = './marketplace/approval/'; //$this->path_approval; //$this->path;
            $config['allowed_types'] = '*';
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['file_name'] = $nmfile;

            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $user = 'Admin';
                $mailTo = implode(', ', $email); //$recipient;
                $subjek = 'BUKTI FAKTUR PAJAK PPN '.$customer_name.' untuk transaksi no '.$no_transaksi;

                // buat template
                $data['user_id'] = $customer_id;
                $mysql_query = "SELECT * FROM store_orders WHERE id = $order_id";
                $data['products'] = $this->_custom_query($mysql_query);
                $data['no_invoice'] = $no_invoice;
                $body = $this->load->view('mail_body', $data, true);

                $this->load->library('email');
                $this->email->from('cs@wiklan.com', 'Sistem Wiklan');
                $this->email->to($mailTo);
                $this->email->subject($subjek);
                $this->email->message($body);
                $this->email->attach($path_file);
                $this->email->bcc('cs@wiklan.com');
                $this->email->cc('cs@wiklan.com');

                if ($this->email->send()){
                    if (file_exists($path_file)) {
                        unlink($path_file);
                        $flash_msg = "Faktur Pajak Terkirim.";
                        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('store_orders/view/'.$order_id); 
                    }
                    
                } else {
                    if (file_exists($path_file)) {
                        unlink($path_file);
                        $flash_msg = "There is an error while sending email.";
                        $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        redirect('store_orders/view/'.$order_id); 
                    }
                    // show_error($this->email->print_debugger());
                }
            } else {
                $flash_msg = "There is an error in attach file.";
                $value = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('store_orders/view/'.$order_id); 
            }
        }
    }
}    

function get_id_from_session_id($code) {
    $query = $this->get_where_custom('session_id', $code);
    foreach ($query->result() as $row) {
        $id = $row->id;
    }

    if (!is_numeric($id)) {
        $id = 0;
    }

    return $id;
}

function get_count_materi($update_id) {
    $this->load->module('manage_materi');

    $query = $this->manage_materi->count_materi_order($update_id);
    // count it
    if ($query->num_rows() > 0) {
        $count = $query->num_rows();
    } else {
        $count = 0;
    }

    return $count;
}

function check_sum_materi($update_id) {
    $count = $this->get_count_materi($update_id);

    if ($count == $this->limit_upload) {
        $results['msg'] = 'TRUE';
        echo json_encode($results);
    } else {
        $results['msg'] = 'FALSE';
        echo json_encode($results);
    }
}

function get_initial_name($username) {
    $alias = substr($username, 0, 1);
    return strtoupper($alias);
}

function addCommentClient() {
    $user_id = $this->input->post('user_id');
    $order_id = $this->input->post('order_id');
    $chat_body = $this->input->post('comment');

    $data = array(
        'order_id' => $order_id,
        'cat_chat' => 'Klien',
        'user_id' => $user_id,
        'chat_body' => $chat_body,
        'created_at' => time()
    );

    if ($this->db->insert('chats', $data)) {
        return TRUE;
    }

}

function getCommentClient() {
    $this->load->module('manage_daftar');
    $this->load->module('timedate');
    $order_id = $this->input->post('order_id');

    // get all comment by req id
    $this->db->where('order_id', $order_id);
    $this->db->where('cat_chat', 'Klien');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('chats');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($row->user_id != 0) {
                $username = $this->manage_daftar->_get_customer_name($row->user_id);
                $alias = $this->get_initial_name($username);
                $message = 'm-messenger__message--in';
            } else {
                $message = 'm-messenger__message--out';
                $username = 'Admin';
            }

            $date = $this->timedate->get_nice_date($row->created_at, 'lengkap');
            
            echo "<div class='m-messenger__message ".$message."'>";
                if ($row->user_id != 0) {
                    echo "<div class='m-messenger__message-no-pic m--bg-fill-danger'>
                        <span>
                            ".$alias."
                        </span>
                    </div>";
                }
                    
              echo "<div class='m-messenger__message-body'>
                        <div class='m-messenger__message-arrow'></div>
                        <div class='m-messenger__message-content'>
                            <div class='m-messenger__message-username'>
                                ".$username." <span class='tanggal-komen'>".$date."</span>
                            </div>
                            <div class='m-messenger__message-text'>
                                ".$row->chat_body."
                            </div>
                        </div>
                    </div>
                </div>";

        }
    }
}

function show_data($table, $column) {
    $mysql_query = 'select * from '.$table;
    $query = $this->db->query($mysql_query);
    foreach ($query->result() as $row) {
        $data = $row->$column;
        echo $data.'<br>';
    }
}

function show_column($table) {
    $mysql_query = 'show columns from materi';
    $query = $this->db->query($mysql_query);
    foreach ($query->result() as $row) {
        $column_name = $row->Field;
        echo $column_name.'<br>'; 
        // var_dump($column_name);
    }
}

function show_table($db) {
    $mysql_query = 'show tables from '.$db;
    $query = $this->db->query($mysql_query);
    foreach ($query->result_array() as $row) {
        echo $row['Tables_in_'.$db].'<br>'; 
    }
}

function show_db() {
    echo $this->db->database;
}

function addCommentOwner() {
    $user_id = $this->input->post('user_id');
    $order_id = $this->input->post('order_id');
    $chat_body = $this->input->post('comment');

    $data = array(
        'order_id' => $order_id,
        'cat_chat' => 'Owner',
        'user_id' => $user_id,
        'chat_body' => $chat_body,
        'created_at' => time()
    );

    if ($this->db->insert('chats', $data)) {
        return TRUE;
    }

}

function getCommentOwner() {
    $this->load->module('manage_daftar');
    $this->load->module('timedate');
    $order_id = $this->input->post('order_id');
    // $user = $this->input->post('cat');

    // get all comment by req id
    $this->db->where('order_id', $order_id);
    $this->db->where('cat_chat', 'Owner');
    $this->db->order_by('id', 'asc');
    $query = $this->db->get('chats');

    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            if ($row->user_id != 0) {
                $username = $this->manage_daftar->_get_customer_name($row->user_id);
                $alias = $this->get_initial_name($username);
                $message = 'm-messenger__message--in';
            } else {
                $message = 'm-messenger__message--out';
                $username = 'Admin';
            }

            $date = $this->timedate->get_nice_date($row->created_at, 'lengkap');
            
            echo "<div class='m-messenger__message ".$message."'>";
                if ($row->user_id != 0) {
                    echo "<div class='m-messenger__message-no-pic m--bg-fill-danger'>
                        <span>
                            ".$alias."
                        </span>
                    </div>";
                }
                    
              echo "<div class='m-messenger__message-body'>
                        <div class='m-messenger__message-arrow'></div>
                        <div class='m-messenger__message-content'>
                            <div class='m-messenger__message-username'>
                                ".$username." <span class='tanggal-komen'>".$date."</span>
                            </div>
                            <div class='m-messenger__message-text'>
                                ".$row->chat_body."
                            </div>
                        </div>
                    </div>
                </div>";

        }
    }
}

    function task($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $mysql_query = "SELECT tasks.*, task_order.*, tasks.id AS id_tasks, tasks.status AS stat_task, task_order.id AS id_task_order, task_order.status AS stat_task_order FROM task_order LEFT JOIN tasks ON task_order.id = task_order.id WHERE task_order.order_id = $order_id ORDER BY task_order.id DESC";
        $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "task";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function chats($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $data['update_id'] = $order_id;
        $data['info'] = $this->cek_tayang($order_id);
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "chat";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function materi($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('manage_daftar');
        $this->load->module('manage_materi');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        // get materi from shopper id & order id
        $col1 = 'user_id';
        $value1 = $shopper_id;
        $col2 = 'order_id';
        $value2 = $order_id;

        $hasil = $this->manage_materi->get_with_double_condition($col1, $value1, $col2, $value2);

        if ($hasil->num_rows() > 0) {
            $mysql_query = "SELECT * FROM materi WHERE user_id = $shopper_id AND order_id = $order_id ORDER BY id DESC";
            $data['query'] = $this->manage_materi->_custom_query($mysql_query); // $this->get('id');
        } 

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        $data['shopper_id'] = $shopper_id;
        $data['user_id'] = $shopper_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "materi";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function penilaian($order_id) {
        $this->load->module('site_security');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
            $durasi = $row->duration;
        }

        $data['info'] = $this->cek_tayang($order_id);
        $data['durasi'] = $durasi;
        $data['update_id'] = $order_id;
        $data['shopper_id'] = $shopper_id;
        $data['user_id'] = $shopper_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "penilaian";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function download_report($report_id) {
        $this->load->module('site_security');
        $this->load->module('manage_laporan');
        $this->site_security->_make_sure_is_admin();

        $data_laporan = $this->manage_laporan->fetch_data_from_db($report_id);
        $nama = $data_laporan['image'];

        $name = $path.$nama;
        $data = file_get_contents('./marketplace/laporan/'.$nama);
        $this->load->helper('file');
        $file_name = $nama;

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download($file_name, $data);
    }

    function report($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('manage_daftar');
        $this->load->module('manage_laporan');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $shop_id = $row->shop_id;
            $data['shopper_id'] = $row->shopper_id;
        }

        // get materi from shopper id & order id
        $col1 = 'user_id';
        $value1 = $shop_id;
        $col2 = 'order_id';
        $value2 = $order_id;

        $hasil = $this->manage_laporan->get_with_double_condition($col1, $value1, $col2, $value2);

        if ($hasil->num_rows() > 0) {
            $mysql_query = "SELECT * FROM laporan WHERE user_id = $shop_id AND order_id = $order_id ORDER BY id DESC";
            $data['query'] = $this->manage_laporan->_custom_query($mysql_query); // $this->get('id');
        } 

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        // $data['user_id'] = $shopper_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "report";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function complains($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('manage_daftar');
        $this->load->module('manage_complain');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $shopper_id = $row->shopper_id;
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $shopper_id;
            $data['owner'] = $row->shop_id;
        }

        // get komplain from shopper id
        $col1 = 'user_id';
        $value1 = $shopper_id;
        $col2 = 'order_id';
        $value2 = $order_id;

        $hasil = $this->manage_complain->get_with_double_condition($col1, $value1, $col2, $value2);

        if ($hasil->num_rows() > 0) {
            $mysql_query = "SELECT * FROM komplain WHERE user_id = $shopper_id AND order_id = $order_id ORDER BY id DESC";
            $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');
        } 

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "komplain";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function invoice($order_id) {
        $this->load->module('site_security');
        $this->load->module('invoices');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $shopper_id = $row->shopper_id;
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $col = 'id_transaction';
        $value = $order_id;
        $data['query'] = $this->invoices->get_where_custom($col, $value);

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "invoices";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function ulasan($order_id) {
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('manage_daftar');
        $this->load->module('review');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $shopper_id = $row->shopper_id;
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $shopper_id;
            $data['owner'] = $row->shop_id;
        }

        // get review from shopper id
        $col1 = 'user_id';
        $value1 = $shopper_id;
        $col2 = 'order_id';
        $value2 = $order_id;

        $hasil = $this->review->get_with_double_condition($col1, $value1, $col2, $value2);

        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $rowi) {
                $data['ulasan'] = 1;
                $data['headline'] = $rowi->headline;
                $data['body'] = $rowi->body;
                $data['rating'] = $this->review->create_rate_star($rowi->rating);
                $data['date'] = $this->timedate->get_nice_date($rowi->date, 'cool');;
            }
        } else {
            $data['ulasan'] = 0;
        }

        // $mysql_query = "SELECT * FROM reviews ORDER BY rev_id DESC";
        // $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

        $data['info'] = $this->cek_tayang($order_id);
        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "ulasan";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function mark_as_complete() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');
        $this->load->module('manage_materi');

        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Submit') {
            # code...
        
            $update_id = $this->input->post('order_id', true);

            $shopper = Client::view_by_id($update_id);

            $this->load->module('manage_product');
            $data['order_status'] = 'Done';
            $this->_update($update_id, $data);

            // update status produk
            // get id produk
            $data_order = $this->db->where('id', $update_id)->get('store_orders')->row();
            $prod_id = $data_order->item_id;
            $data_prod['cat_stat'] = 1;
            $this->manage_product->_update($prod_id, $data_prod);

            // set to clear all materi
            $this->manage_materi->clear_all_materi($update_id);

            $flash_msg = "Order status Done.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/view/'.$update_id); 
        }
    }

    function tracking() {
        $action = ucfirst($this->uri->segment(3));
        $status = ($action == 'On') ? 1 : 0;
        $order = $this->uri->segment(4);
        $info = Project::by_id($order);
        $timer_msg = '';
        $response = 'success';

        $query = $this->get_where($order);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        if ($action == 'Off') {
            $project_logged_time =  Project::total_hours($project);
            $timer = $this->db->where(
                array(
                    'user'=>$shopper_id,
                    'status'=>'1',
                    'order'=>$order
                )
            )->get('order_timer')->row();
            
            $time_logged = (time() - $timer->start_time) + $project_logged_time;

            $data = array(
                'order'=>$order,
                'status'=>$status,
                'user'=>$shopper_id,
                'end_time'=>time()
            );

            $this->db->where(
                array(
                    'user'=>$shopper_id,
                    'status'=>'1',
                    'order'=>$order,
                    'time_in_sec'=> 0,
                    'end_time'=>NULL
                )
            )->update('order_timer',$data);

            $data = array(
                'time_logged'=>Applib::format_deci($time_logged),
                'timer_start'=>''
            );

            Project::update($order,$data);

            $timer_msg = 'timer_stopped_success';
        } else {
            // $any_task_started = $this->db->where(
            //     array(
            //         'pro_id'=>$project,
            //         'status'=>'1',
            //         'user'=>User::get_id()
            //     )
            // )->get('tasks_timer')->num_rows();

            // if($any_task_started == 0){

            //     $data = array(
            //         'project'=>$project,
            //         'status'=>$status,
            //         'user'=>User::get_id(),
            //         'start_time'=>time()
            //     );

            //     $this->db->insert('project_timer',$data); // Save to Daatabase
            //     $timer_msg = 'timer_started_success';

            // }else{
            //     $response = 'error';
            //     $timer_msg = 'timer_already_started';
            // }
        }
        
    }

    function manage() {
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $mysql_query = "SELECT * FROM store_orders ORDER BY id DESC";
        $data['query'] = $this->_custom_query($mysql_query); // $this->get('id');

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "manage";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

function getData() {
    $this->load->module('timedate');
    $this->load->module('manage_product');
    $this->load->module('manage_daftar');
    $this->load->module('site_settings');

    $mysql_query = "SELECT * FROM store_orders ORDER BY id DESC";
    $query = $this->_custom_query($mysql_query); //$this->get('id');
    $no = 1;
    foreach($query->result() as $row){
        $user_id = $row->shopper_id;
        $klien = Client::view_by_id($user_id);
        $persil = Client::view_by_id($row->shop_id);
        $item = App::view_by_id($row->item_id);
        $lokasi = $row->item_title;
        $price = ($row->price != '') ? $this->site_settings->currency_format2($row->price) : 0;
        $durasi = $row->duration;
        $start = $this->timedate->get_nice_date($row->start, 'ok');
        $end = $this->timedate->get_nice_date($row->end, 'ok');
        $date = $this->timedate->get_nice_date($row->date_added, 'ok');
        $opened = $row->opened;
        $slot = $row->slot;

        $approved = $row->approved;
        if ($approved == 1) {
            $approve_label = "m-badge--success";
            $approve_desc = "Approve";
        } else {
            $approve_label = "m-badge--warning";
            $approve_desc = "Not Yet";
        }

        $order_status = $row->order_status;
        if ($order_status == 'Done') {
            $status_label = "m-badge--success";
            $status_desc = "Done";
        } elseif ($order_status == 'Active') {
            $status_label = "m-badge--warning";
            $status_desc = "Aktif";
        } else {
            $status_label = "m-badge--danger";
            $status_desc = "Pending";
        }

        $data_order[] = array(
            "No" => $no++,
            "#" => "
                <span style='overflow: visible; width: 110px;'>                     
                    <div class='dropdown '>                         
                        <a href='#' class='btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill' data-toggle='dropdown'>                                
                            <i class='la la-ellipsis-h'></i>                            
                        </a>                            
                        <div class='dropdown-menu dropdown-menu-right'>                             
                            <a class='dropdown-item' href='".base_url()."store_orders/view/".$row->id."'><i class='la la-file-text'></i> Preview Order</a>                                
                            <a class='dropdown-item' href='#' onclick='showAjaxModal2(\"".base_url()."modal/popup/edit_order/".$row->id."/store_orders\")'><i class='la la-edit'></i> Edit Order</a>                                
                            <a class='dropdown-item' href='".base_url()."store_orders/timeline/".$row->id."'><i class='la la-files-o'></i> Payment History</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal2(\"".base_url()."modal/popup/score/".$row->id."/store_orders\")'><i class='la la-pencil'></i> Penilaian</a>                            
                            <a class='dropdown-item' href='".base_url()."store_orders/approval/".$row->id."'><i class='la la-envelope'></i> Kirim Approval</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/set_approve/".$row->id."/store_orders\")'><i class='la la-check-circle-o'></i> Set approve</a> 
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/send_tax/".$row->id."/store_orders\")'><i class='la la-file-pdf-o'></i> Kirim Faktur Pajak</a>  
                            <a class='dropdown-item' href='".base_url()."review/send_mail_review/".$row->id."'><i class='la la-envelope'></i> Kirim Ulasan</a>                              
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/delete/".$row->id."/store_orders\")'><i class='la la-trash'></i> Delete</a>
                            <a class='dropdown-item' href='#' onclick='showAjaxModal(\"".base_url()."modal/popup/archive/".$row->id."/store_orders\")'><i class='la la-briefcase'></i> Archive</a>

                        </div>                      
                    </div>                      
                                    
                </span>
            ",
            "ID Order" => $row->no_order,
            "Lokasi" => "<a class='".$this->open($opened)."' href='".base_url()."store_orders/view/".$row->id."'>".$lokasi."</a>",
            "Harga" => $price,
            "Durasi" => $durasi." ".$this->duration($durasi),
            "NO Transaksi" => $row->no_transaksi,
            "Slot" => $slot." ".$this->slot($slot),
            "Tayang" => $start." <br>-<br> ".$end,
            "Klien" => $klien->username.' <br> '.$klien->company,
            "Approve" => "<span style='width: 110px;'><span class='m-badge ".$approve_label." m-badge--wide'>".$approve_desc."</span></span>",
            "Status" => "<span style='width: 110px;'><span class='m-badge ".$status_label." m-badge--wide'>".$status_desc."</span></span>",
            "Tanggal" => $date,
            
        );
    }
    echo json_encode($data_order);
}       

function open($opened) {
    return ($opened != 1)? 'seal' : '';
}

function duration($durasi) {
    return ($durasi != '') ? 'bulan' : '-';
}

function slot($slot) {
    return ($slot != '') ? 'slot' : '-';
}

    function view($order_id = null) {
        $this->load->module('site_security');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('store_categories');
        $this->load->module('invoices');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);
            $data['prod_code'] = $prod->prod_code;
            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $this->_set_to_opened($order_id);

        // cek invoice

        $data['headline'] = 'Order Detail';

        $data['update_id'] = $order_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function approval($order_id = null) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('manage_daftar');
        $this->load->module('site_settings');
        $this->load->module('timedate');
        $this->load->module('store_categories');
        $this->site_security->_make_sure_is_admin();

        $query = $this->get_where($order_id);
        foreach ($query->result() as $row) {
            $prod = App::view_by_id($row->item_id);
            $data['kategori_produk'] = $this->store_categories->get_name_from_category_id($prod->cat_prod);

            $data['lokasi'] = $row->item_title;
            $data['no_order'] = $row->no_order;
            $data['price'] = $this->site_settings->currency_rupiah($row->price);
            $data['durasi'] = $row->duration;
            $data['slot'] = ($row->slot != '') ? $row->slot : '';
            $data['start'] = $this->timedate->get_nice_date($row->start, 'indo');
            $data['end'] = $this->timedate->get_nice_date($row->end, 'indo');
            $data['shopper_id'] = $row->shopper_id;
            $data['owner'] = $row->shop_id;
        }

        $data['update_id'] = $order_id;
        $data['headline'] = "Kirim Approval";
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "approval";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function test() {
        $submit = $this->input->post('submit');

        if ($submit == "Cancel") {
            redirect('store_orders');
        }

        if ($submit == "Submit") {
            if ($_FILES['approval']['name'] != '') {
                $file_data = $this->upload_file();

                $path_file = $file_data['full_path'];

                if (file_exists($path_file)) {
                    echo "file exist";

                    echo $path_file;
                }
            }    
        }
    }

    function upload_file() {
        $config['upload_path'] = './marketplace/approval/'; //$this->path_approval; //$this->path;
        $config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if($this->upload->do_upload('approval')) {
            return $this->upload->data();   
        } else {
            return $this->upload->display_errors();
        }
    }

    

    function get_all_own_cart($shopper_id) {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_item');
        $this->site_security->_make_sure_is_admin();

        // get all location fron specific user
        $now = time();
        $mysql_query = "SELECT * FROM store_orders WHERE shopper_id = $shopper_id AND store_orders.end > $now";
        $query = $this->_custom_query($mysql_query);
        $count = $query->num_rows();

        if ($count > 0) {

            $all_result = array();
            $location = array();
            $final_result = array();

             // get all id from store_item
            $this->db->where('status', 1);
            $this->db->where('deleted <>', '1');
            $all_id = $this->db->get('store_item')->result_array();

            foreach ($all_id as $row) {
                $all_result[] = $row['id'];
            }

            // get array data from store basket
            $location = array();
            foreach ($query->result_array() as $key) {
               $location[] = $key['item_id'];
            }

            $final_result = array_intersect($all_result, $location);

            if (count($final_result) !== 0) {
                $this->db->order_by('id', 'desc');
                $this->db->where('deleted <>', '1');
                $this->db->where_in('id', $final_result);
                $data = $this->db->get('store_item');

                return $data->result();
            }
        } 
    }

    function liat_mail($customer_id) {
        $data = [];
        $data['user_id'] = $customer_id;
        $this->load->view('mail_temp', $data);
    }

    function _get_lokasi_name($order_id) {
        $query = $this->get_where_custom('id', $order_id);
        foreach ($query->result() as $row) {
            $lokasi = $row->item_title;
        }

        if (!isset($lokasi)) {
            $lokasi = 0;
        }

        return $lokasi;
    }

    function archive() {
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Submit') {
        
            $update_id = $this->input->post('order_id', true);
            $data['archived'] = 1;
            $this->_update($update_id, $data);

            $flash_msg = "Data successfully archived.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function delete() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Delete') {
        
            $update_id = $this->input->post('order_id', true);
            $data['deleted'] = 1;
            $this->_update($update_id, $data);

            $flash_msg = "Data successfully delete.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function _get_status_title() {
        $order_status = $this->uri->segment(3);
        $order_status = str_replace('status', '', $order_status);
        if (!is_numeric($order_status)) {
            $order_status = 0;
        }

        $this->load->module('store_order_status');

        if ($order_status == 0) {
            $status_title = 'Order Submitted';
        } else {
            $status_title = $this->store_order_status->_get_status_title($order_status);
        }

        return $status_title;
    }

    function submit_order_status() {
        $update_id = $this->uri->segment(3);
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        $submit = $this->input->post('submit', TRUE);
        $order_status = $this->input->post('order_status', TRUE);

        if ($submit == "Cancel") {
            $query = $this->get_where($update_id);
            foreach ($query->result() as $row) {
                $order_status = $row->order_status;
            }

            $target_url = base_url().'store_orders/browse/status'.$order_status;
            redirect($target_url);
        } elseif ($submit == 'Submit') {
            $data['order_status'] = $order_status;
            $this->_update($update_id, $data);

            //autimatically generate a message for the customer
            $this->_auto_generate_msg($update_id);

            $flash_msg = "The order status was successfully updated.";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);

            redirect('store_orders/view/'.$update_id);
        }
    }

    function _auto_generate_msg($update_id) {
        $this->load->module('enquiries');
        $this->load->module('store_order_status');
        $this->load->module('site_security');

        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
            $order_status = $row->order_status;
            $order_ref = $row->order_ref;
        }

        if ($order_status == 0) {
            $status_title = 'Order Submitted';
        } else {
            $status_title = $this->store_order_status->_get_status_title($order_status);
        }

        $msg = 'Order '.$order_ref.' has just been updated. ';
        $msg.= 'The new status for your order is '.$status_title.'.';

        $data['subject'] = 'Your order have been updated';
        $data['sent_to'] = $shopper_id;
        $data['message'] = $msg;
        $data['date_created'] = time();
        $data['sent_by'] = 0;
        $data['opened'] = 0;
        $data['code'] = $this->site_security->generate_random_string(6);

        $this->enquiries->_insert($data);
    }

    function _set_to_opened($update_id) {
        $data['opened'] = 1;
        $this->_update($update_id, $data);
    }

    function set_to_approve() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('store_categories');
        $this->load->module('store_provinces');
        $this->load->module('store_cities');

        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        if ($submit == 'Submit') {
            # code...
        
            $update_id = $this->input->post('order_id', true);

            $shopper = Client::view_by_id($update_id);

            $this->load->module('manage_product');
            $data['approved'] = 1;
            $this->_update($update_id, $data);

            // update status produk dari available ke sold out
            // get id produk
            $data_order = $this->db->where('id', $update_id)->get('store_orders')->row();
            $prod_id = $data_order->item_id;
            $data_prod['cat_stat'] = 2;
            $this->manage_product->_update($prod_id, $data_prod);

            // get all data produk
            $produk = $this->db->where('id', $prod_id)->get('store_item')->row();
            $url = base_url()."product/billboard/".$produk->item_url;
            $image_location = base_url().'marketplace/limapuluh/70x70/'.$produk->limapuluh;
            $tipe_kategori = $this->store_categories->get_name_from_category_id($produk->cat_prod);
            $nama_provinsi = $this->store_provinces->get_name_from_province_id($produk->cat_prov);
            $nama_kota = $this->store_cities->get_name_from_city_id($produk->cat_city);

            $detail_produk = array(
                'title' => $produk->item_title,
                'description' => $produk->item_title,
                'start' => $data_order->start,
                'end' => $data_order->end,
                'code' => $produk->prod_code,
                'url' => $url,
                'image' => $image_location,
                'client' => $shopper->username,
                'price' => $produk->item_price,
                'province' => $nama_provinsi,
                'city' => $nama_kota,
                'className' => 'm-fc-event--danger m-fc-event--solid-warning',
                'created' => date('Y-m-d H:i:s')
            );

            $table = 'events';
            App::save_data($table, $detail_produk);

            $flash_msg = "Data successfully approve.";
            $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('store_orders/manage/'); 
        }
    }

    function edit() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();
        $submit = $this->input->post('submit', TRUE);
        
        if ($submit == 'Submit') {
        
            $update_id = $this->input->post('order_id', true);
            $data['price'] = str_replace('.', '', $this->input->post('price', true));
            $this->_update($update_id, $data);
        }

        $flash_msg = "Data successfully edit.";
        $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('store_orders/manage/'); 
    }

    function view2() {
        $this->load->library('session');
        $this->load->module('site_security');
        $this->load->module('cart');
        $this->load->module('timedate');
        $this->load->module('store_accounts');
        $this->load->module('store_order_status');
        $this->site_security->_make_sure_is_admin();

        $update_id = $this->uri->segment(3);
        // update row to opened
        $this->_set_to_opened($update_id);

        $query = $this->get_where($update_id);
        foreach ($query->result() as $row) {
            $data['order_ref'] = $row->order_ref;
            $date_created = $row->date_created;
            $data['paypal_id'] = $row->paypal_id;
            $session_id = $row->session_id;
            $data['opened'] = $row->order_ref;
            $order_status = $row->order_status;
            $data['shopper_id'] = $row->shopper_id;
            $data['mc_gross'] = $row->mc_gross;
        }

        if ($order_status == 0) {
            $data['status_title'] = 'Order Submitted';
        } else {
            $data['status_title'] = $this->store_order_status->_get_status_title($order_status);    
        }

        $table = 'store_shoppertrack';
        $data['query_cart_contents'] = $this->cart->_fetch_cart_contents($session_id, $data['shopper_id'], $table);

        $data['order_status'] = $order_status;
        $data['date_created'] = $this->timedate->get_nice_date($date_created, 'full');
        $data['options'] = $this->store_order_status->_get_dropdown_options();
        $data['headline'] = 'Orders'.$data['order_ref'];
        $data['store_accounts_data'] = $this->store_accounts->fetch_data_from_db($data['shopper_id']);
        $data['customer_address'] = $this->store_accounts->_get_shopper_address($data['shopper_id'], '<br>');
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "view";
        $this->load->module('templates');
        $this->templates->admin($data);
    }

    function browse() {
        $this->load->module('custom_pagination');
        $this->load->module('site_security');
        $this->site_security->_make_sure_is_admin();

        // count orders for 
        $use_limit = FALSE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $query = $this->_custom_query($mysql_query);
        $total_items = $query->num_rows();

        // fetch orders for this page
        $use_limit = TRUE;
        $mysql_query = $this->_generate_mysql_query($use_limit);
        $data['query'] = $this->_custom_query($mysql_query);
        $data['num_rows'] = $data['query']->num_rows();

        // 
        $pagination_data['template'] = 'admin';
        $pagination_data['target_base_url'] = $this->get_target_pagination_base_url();
        $pagination_data['total_row'] = $total_items;
        $pagination_data['offset_segment'] = 4;
        $pagination_data['limit'] = $this->get_limit();
        $data['pagination'] = $this->custom_pagination->_generate_pagination($pagination_data); 

        $pagination_data['offset'] = $this->get_offset();
        $data['showing_statement'] = $this->custom_pagination->get_showing_statement($pagination_data); 
        $data['status_title'] = $this->_get_status_title();
        $data['query'] = $this->_custom_query($mysql_query);

        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "browse";
        $this->load->module('templates');
        $this->templates->admin($data);   
    }

    function get_target_pagination_base_url() {
        $first_bit = $this->uri->segment(1);
        $second_bit = $this->uri->segment(2);
        $third_bit = $this->uri->segment(3);
        $target_base_url = base_url().$first_bit."/".$second_bit."/".$third_bit;
        return $target_base_url;
    }

    function _generate_mysql_query($use_limit) {

        $order_status = $this->uri->segment(3);
        $order_status = str_replace('status', '', $order_status);
        if (!is_numeric($order_status)) {
            $order_status = 0;
        }

        if ($order_status > 0) {
            $mysql_query = "
                SELECT store_orders.id,
                    store_orders.order_ref,
                    store_orders.date_created,
                    store_orders.opened,
                    store_orders.mc_gross,
                    store_accounts.firstname,
                    store_accounts.lastname,
                    store_accounts.company,
                    store_order_status.status_title
                FROM store_orders LEFT JOIN store_accounts ON store_orders.shopper_id = store_accounts.id
                LEFT JOIN store_order_status ON store_orders.order_status = store_order_status.id
                WHERE store_orders.order_status=$order_status ORDER BY store_orders.date_created desc 
            ";
        } else {
            $mysql_query = "
                SELECT store_orders.id,
                    store_orders.order_ref,
                    store_orders.date_created,
                    store_orders.opened,
                    store_orders.mc_gross,
                    store_accounts.firstname,
                    store_accounts.lastname,
                    store_accounts.company,
                FROM store_orders LEFT JOIN store_accounts ON store_orders.shopper_id = store_accounts.id
                WHERE store_orders.order_status=$order_status
                ORDER BY store_orders.date_created desc 
            ";
        }

        if ($use_limit == TRUE) {
            $limit = $this->get_limit();
            $offset = $this->get_offset();
            $mysql_query.= " limit ".$offset.", ".$limit;
        }                        

        return $mysql_query;                        
    }

    function get_limit() {
        $limit = 20;
        return $limit;
    }

    function get_offset() {
        $offset = $this->uri->segment(4);
        if (!is_numeric($offset)) {
            $offset = 0;
        }
        return $offset;
    }

    function _get_mc_gross($paypal_id) {
        $this->load->module('paypal');
        $query = $this->paypal->get_where($paypal_id);

        foreach ($query->result() as $row) {
            $posted_information = $ow->posted_information;
        }

        if (!isset($posted_information)) {
            $mc_gross = 0;
        } else {
             $posted_information = unserialize($posted_information);
            $mc_gross = $posted_information['mc_gross'];
        }

        return $mc_gross;
       
    }

    function _get_shopper_id($customer_session_id) {
        $this->load->module('store_basket');
        $query = $this->store_basket->get_where_custom('session_id', $customer_session_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            $shopper_id = 0;
        }

        return $shopper_id;
    }

    function _get_customer_id($order_id) {
        $query = $this->get_where_custom('id', $order_id);
        foreach ($query->result() as $row) {
            $shopper_id = $row->shopper_id;
        }

        if (!isset($shopper_id)) {
            $shopper_id = 0;
        }

        return $shopper_id;
    }

    function _auto_generate_order($paypal_id, $customer_session_id) {
        //this gets called from paypal IPN
        $this->load->module('site_security');
        $order_ref = $this->site_security->generate_random_string(6);
        $order_ref = strtoupper($order_ref);

        $data['order_ref'] = $order_ref;
        $data['date_created'] = time();
        $data['paypal_id'] = $paypal_id;
        $data['session_id'] = $customer_session_id;
        $data['opened'] = 0;
        $data['order_status'] = 0;
        $data['shopper_id'] = $this->_get_shopper_id($customer_session_id);
        $data['mc_gross'] = $this->_get_mc_gross($paypal_id);
        $this->_insert($data);

        //transfer from store basket to store_shoppertrack
        $this->load->module('store_shoppertrack');
        $this->store_shoppertrack->_transfer_from_basket($customer_session_id);
    }

    function get($order_by)
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get($order_by);
        return $query;
    }

    function get_with_limit($limit, $offset, $order_by) 
    {
        if ((!is_numeric($limit)) || (!is_numeric($offset))) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_with_limit($limit, $offset, $order_by);
        return $query;
    }

    function get_where($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_where($id);
        return $query;
    }

    function get_where_custom($col, $value) 
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->get_where_custom($col, $value);
        return $query;
    }

    function _insert($data)
    {
        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_insert($data);
    }

    function _update($id, $data)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_update($id, $data);
    }

    function _delete($id)
    {
        if (!is_numeric($id)) {
            die('Non-numeric variable!');
        }

        $this->load->model('mdl_store_orders');
        $this->mdl_store_orders->_delete($id);
    }

    function count_where($column, $value) 
    {
        $this->load->model('mdl_store_orders');
        $count = $this->mdl_store_orders->count_where($column, $value);
        return $count;
    }

    function get_max() 
    {
        $this->load->model('mdl_store_orders');
        $max_id = $this->mdl_store_orders->get_max();
        return $max_id;
    }

    function _custom_query($mysql_query) 
    {
        $this->load->model('mdl_store_orders');
        $query = $this->mdl_store_orders->_custom_query($mysql_query);
        return $query;
    }

}