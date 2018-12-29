<?php
class Store_like extends MX_Controller 
{

function __construct() {
    parent::__construct();
    $this->load->model('App');
}

    public function index()
    {
        $this->load->view('hello');
    }

    function like_add() {
        $user_id = $this->input->post('user_id');
        $prod_id = $this->input->post('prod');

        $data = array(
            'user_id' => $user_id,
            'prod_id' => $prod_id
        );

        $col1 = 'user_id';
        $value1 = $user_id;
        $col2 = 'prod_id';
        $value2 = $prod_id;
        $query = $this->get_with_double_condition($col1, $value1, $col2, $value2);
        $num_rows = $query->num_rows();

        if ($num_rows < 1) {
            $this->_insert($data);

            // Log activity
            $data = array(
                'module' => 'like produk',
                'user' => $this->session->userdata('user_id'),
                'activity' => 'like_produk',
                'icon' => 'fa-usd',
               
            );
            App::Log($data);

            $results['msg'] = 'sukses';
            echo json_encode($results);
            
        } else {
            $results['msg'] = 'gagal';
            echo json_encode($results);
        }
    }

    function check_like($user_id, $prod_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('prod_id', $prod_id);
        $query = $this->db->get('likes');

        $count = $query->num_rows();
        if ($count > 0) {
            $res = TRUE;
        } else {
            $res = FALSE;
        }

        return $res;
    }

function get($order_by)
{
    $this->load->model('mdl_like');
    $query = $this->mdl_like->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_like');
    $query = $this->mdl_like->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_like');
    $query = $this->mdl_like->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('mdl_like');
    $query = $this->mdl_like->get_where_custom($col, $value);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2) 
{
    $this->load->model('mdl_like');
    $query = $this->mdl_like->get_with_double_condition($col1, $value1, $col2, $value2) ;
    return $query;
}

function _insert($data)
{
    $this->load->model('mdl_like');
    $this->mdl_like->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_like');
    $this->mdl_like->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('mdl_like');
    $this->mdl_like->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('mdl_like');
    $count = $this->mdl_like->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('mdl_like');
    $max_id = $this->mdl_like->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('mdl_like');
    $query = $this->mdl_like->_custom_query($mysql_query);
    return $query;
}

}