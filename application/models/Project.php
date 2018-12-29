<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Model
{

    private static $db;

    function __construct(){
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    // Update Project
    static function update($order_id,$data){
        return self::$db->where('id',$order_id)->update('store_orders',$data);
    }

    static function timer_status($type = 'order', $id, $user){
    	if ($type == 'order') {
    		$started = self::$db->where(array(
                	'user'=>$user,
                	'order'=>$id,
                	'status'=>'1'))->get('order_timer')->num_rows();
                return ($started > 0) ? 'On' : 'Off';
    	} 
    	
        // switch ($type) {
        //     case 'order':
        //         $started = self::$db->where(array(
        //         	'user'=>User::get_id(),
        //         	'project'=>$id,
        //         	'status'=>'1'))->get('project_timer')->num_rows();
        //         return ($started > 0) ? 'On' : 'Off';
        //         break;

        //     default:
        //         $started = self::$db->where(array('user'=>User::get_id(),'task'=>$id,'status'=>'1'))
        //                             ->get('tasks_timer')->num_rows();
        //         return ($started > 0) ? 'On' : 'Off';
        //         break;
        // }

    }

    // Get project information
    static function by_id($id = NULL)
    {
        return self::$db->where('id',$id)->get('store_orders')->row();
    }

    // Calculate logged time
    static function logged_time($id)
    {
        $timer = self::$db->where('timer_id',$id)->get('order_timer')->row();
        if($timer->time_in_sec > 0){
            return $timer->time_in_sec;
        }else{
            return ($timer->end_time > 0) ? $timer->end_time - $timer->start_time : 0;
        }
    }

    // Get project hours
    static function total_hours($order){
        return round((self::get_hours($order,'') + self::get_hours($order))/3600,2);
    }

    // Calculate total order hours
    static function get_hours($order, $billable = NULL){
        $billable = ($billable == NULL) ? '1' : '0';
        $res = self::$db->where(
            array(
                'order'=>$order,
                'billable'=>$billable
            )
        )->get('order_timer')->result();
        
        $a = array();
        foreach ($res as $key => $t) {
            $a[] = self::logged_time($t->timer_id);
        }
        return (is_array($a)) ? array_sum($a) : 0;

    }

}