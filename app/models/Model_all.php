<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Digitronika.com
 * Description: Login model class
 */
class Model_all extends CI_Model{
    function __construct(){
        parent::__construct();
    }
	
	public function add_wp(){
		
		$this->db->truncate('cur_wp');
		//$this->db->empty_table('cur_wp');
		$wpx = $this->input->post('wp');
		$wp_num = explode(",", $wpx );
		$i=1;
	
		foreach ($wp_num as $wp){
			$coor = explode("x", $wp);
			$lat = $coor[0];
			$long = $coor[1];
			$data = array(			
			//'id'=>$i,
			'latitude'=>$lat,			
			'longitude'=>$long			
		 );
		$this->db->insert('cur_wp',$data);
		$i++;
		}
		
		
		return true;
		
	}
	public function add_data($lat,$long,$speed,$steering,$miring){
		 $data = array(
			'latitude'=>$lat,
			'longitude'=>$long,
			'steering'=>$steering,
			'sudut_kemiringan'=>$miring,
			'speed'=>$speed
		 );
		$this->db->insert('monitoring',$data);
	}
	public function load_dB($no){
		$this->db->limit(1);		
		$this->db->order_by("id", "desc");		
		$query = $this->db->get('monitoring');		
		return $query;	
		
	}
	
	
}
?>