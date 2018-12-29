<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_invoices extends CI_Model
{

function __construct() {
parent::__construct();
}

    // public function view_by_id($invoice)
    // {
    //     return self::$db->where('inv_id', $invoice)->get('invoices')->row();
    // }

function get_table() {
    $table = "invoices";
    return $table;
}

function get($order_by){
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
}

function get_where($id){
    $table = $this->get_table();
    $this->db->where('inv_id', $id);
    $query=$this->db->get($table);
    return $query;
}

function get_where_custom($col, $value) {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $query=$this->db->get($table);
    return $query;
}

function _insert($data){
    $table = $this->get_table();
    $this->db->insert($table, $data);
}

function _update($id, $data){
    $table = $this->get_table();
    $this->db->where('inv_id', $id);
    $this->db->update($table, $data);
}

function _delete($id){
    $table = $this->get_table();
    $this->db->where('inv_id', $id);
    $this->db->delete($table);
}

function count_where($column, $value) {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function count_all() {
    $table = $this->get_table();
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
}

function get_max() {
    $table = $this->get_table();
    $this->db->select_max('inv_id');
    $query = $this->db->get($table);
    $row=$query->row();
    $id=$row->inv_id;
    return $id;
}

function _custom_query($mysql_query) {
    $query = $this->db->query($mysql_query);
    return $query;
}

    // public function get_invoices($limit = null, $status = null, $cancelled = false)
    // {
    //     if ($status != null) {
    //         $this->db->where('status', $status);
    //     }
    //     if($cancelled) :
    //         return $this->db->where(array('inv_id >' => 0, 'status !=' => 'Cancelled'))->get('invoices')->result();
    //     else:
    //     return $this->db->order_by('inv_id', 'desc')->where(array('inv_id >' => 0, 'inv_deleted' => 'No'))->get('invoices', $limit)->result();
    //     endif;
    // }

    // public function evaluate_invoice($id)
    // {
    //     $has_balance = $this->get_invoice_due_amount($id);
    //     $has_items = $this->db->where('invoice_id', $id)->get('items')->num_rows();
    //     $is_cancelled = ($this->view_by_id($id)->status == 'Cancelled') ? true : false;
    //     if(!$is_cancelled) :
    //         if ($has_items == 0 || $has_balance > 0) {
    //             $this->db->set('status', 'Unpaid')->where('inv_id', $id)->update('invoices');
    //         } else {
    //             $this->db->set('status', 'Paid')->where('inv_id', $id)->update('invoices');
    //         }
    //     endif;

    //     return;
    // }

    // public function get_invoice_due_amount($invoice)
    // {
    //     $tax = $this->get_invoice_tax($invoice, null, true);
    //     $discount = $this->get_invoice_discount($invoice);
    //     $invoice_cost = $this->get_invoice_subtotal($invoice);
    //     $payment_made = $this->get_invoice_paid($invoice);
    //     $fee = $this->get_invoice_fee($invoice);
    //     $due_amount = (($invoice_cost - $discount) + $tax + $fee) - $payment_made;
    //     if ($due_amount <= 0) {
    //         $due_amount = 0;
    //     }

    //     return round($due_amount, 2);
    // }

    // // Calculate Invoice Tax
    // public function get_invoice_tax($invoice, $type = 'tax1', $sum_tax = false)
    // {
    //     if ($sum_tax) {
    //         return self::total_tax($invoice);
    //     }
    //     $tax = ($type == 'tax2') ? self::view_by_id($invoice)->tax2 : self::view_by_id($invoice)->tax;
    //     if ($type == 'tax2') {
    //         return ($tax / 100) * self::get_invoice_subtotal($invoice);
    //     }

    //     return ($tax / 100) * self::get_invoice_subtotal($invoice);
    // }

}