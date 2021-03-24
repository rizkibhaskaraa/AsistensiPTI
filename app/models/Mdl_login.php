<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Digitronika.com
 * Description: Login model class
 */
class Mdl_login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('nik'));
        $password = $this->security->xss_clean($this->input->post('pass'));
        
        // Prep the query
        
		
		$where = "user_id='".$username."' AND pass='".($password)."'";
		$this->db->where($where);
        
        // Run the query
        $query = $this->db->get('admin');
		
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'telp' => $row->telp,                   
                    'username' => $row->user_id,															
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }		
      
        return false;
    }
	
	
	
}
?>