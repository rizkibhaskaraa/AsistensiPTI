<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_ extends CI_Controller {

	function __construct() {
        parent::__construct();  
		$this->load->helper(array('form', 'url'));		
    }
	
	public function index()
	{	
		if(empty($_SESSION['validated'])){
			$this->login('');
		}
		else{		
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('dashboard');
		$this->load->view('footer');
		}	
		$last_id = 0;
	}

	public function control(){
		 $this->cek_sesi();  
		$this->load->model('Model_all');
		//$data['dbx'] = $this->Model_all->data_nasabah();
		$this->load->view('header');
		$this->load->view('sidebar');
		$data['status'] = 'Creator';
		$this->load->view('control',$data);
		$this->load->view('footer');
	}
	public function monitoring(){
		 $this->cek_sesi();  
		$this->load->model('Model_all');
		//$data['dbx'] = $this->Model_all->data_nasabah();
		$this->load->view('header');
		$this->load->view('sidebar');
		$data['status'] = 'Monitoring';
		$this->load->view('monitoring',$data);
		$this->load->view('footer_monitoring');
	}
	public function grafik(){
		 $this->cek_sesi();  
		$this->load->model('Model_all');
		//$data['dbx'] = $this->Model_all->data_nasabah();
		$this->load->view('header');
		$this->load->view('sidebar');
		$data['status'] = 'Creator';
		$this->load->view('grafik',$data);
		$this->load->view('footer');
	}
	public function submit_wp(){
		 $this->load->model('Model_all');
		 $result = $this->Model_all->add_wp();
		 if($result){
			 $data['status'] = 'Has been Saved';
		 }
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('control',$data);
		$this->load->view('footer');
	}
	
	
	public function update($lat,$long,$speed,$steering,$miring){
		$this->cek_sesi();  
		$this->load->model('Model_all');		
		$data['all']= $lat.' '.$long.' '.$speed.' '.$steering.' '.$miring;
		$data['dbx'] = $this->Model_all->add_data($lat,$long,$speed,$steering,$miring);
		$this->load->view('blank',$data);
	}
	public function get_data($number){
		$this->cek_sesi();  
		$this->load->model('Model_all');		
		$no = 1;
		if ($number > 0) $no = $number;
		$a=array();		
		$data['result'] = $this->Model_all->load_dB($no);		
		
		foreach ($data['result']->result() as $res){
			
				$combine = $res->id.",".$res->latitude.",".$res->longitude.",".$res->steering.",".$res->sudut_kemiringan.",".$res->speed.",".$res->waktu;
				array_push($a,$combine);
				
		}		
		echo json_encode($a);
	}
	
	
	
	public function login($msg){
		$data['msg'] = $msg;
		$this->load->view('login',$data);			
	}
	 public function logout() {
		 $this->cek_sesi();  
		 $this->session->sess_destroy();
         $this->index('','login');
		 redirect('');
	 }
	  public function cek_sesi (){	
		 if (empty($_SESSION['validated'])) 
		 redirect(''); 
	}
	public function process(){
		$this->load->model('mdl_login');        
        $result = $this->mdl_login->validate();
		 if(! $result){
            
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{
            redirect('');
        }        
	 }
	
}
