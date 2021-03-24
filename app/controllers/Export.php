<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Digitronika.com
 * Description: Login model class
 */
class Export extends CI_Controller{
	
	 function __construct() {
        parent::__construct();  
		$this->load->helper(array('form', 'url'));		
    }
function show_wil(){
		 $this->cek_level();
		  $this->load->model('Model_kab');
		 $data['wil'] = $this->Model_kab->show_wil(); 
		 return $data['wil'];
	 }
	 
public function index(){
			 
		
	$border = array(
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN ] ]
);
		 $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xls');
		 
		 $config['upload_path']  = './xls/';
		 $spreadsheet = $reader->load($config['upload_path'].'Book1.xls');
		 $sheet_size = 4;
		$simpanan = array (
				0 =>   'Simpanan Wajib',
				'Simpanan Pokok',
				'Simpanan Hari Raya',
				'Simpanan Mana Suka',				
		);
		for($i=0;$i<$sheet_size;$i++){
		$worksheet = $spreadsheet->setActiveSheetIndex($i);
		$worksheet = $spreadsheet->getActiveSheet();
		$this->load->model('Model_all');
		$this->db->where('status', 'AKTIF');
		$nasabah = $this->Model_all->data_nasabah();
		 $no=0;	$k=4;
			foreach($nasabah->result() as $ns){
				 $where = "nik='".$ns->nik."' AND (jenis_transaksi='credit' OR jenis_transaksi='debt') AND subjenis='".$simpanan[$i]."' ";
				 $this->db->where($where);
				 $db = $this->Model_all->tabungan2($ns->nik)->row();	
				 $no++; $k++;			 
				 $this->db->where('jenis_transaksi','debt');
				 $this->db->where('subjenis',$simpanan[$i]);
				 $debt = $this->Model_all->tabungan2($ns->nik)->row();
				 $worksheet->setCellValueByColumnAndRow(1,$k, $no);		
				 $worksheet->setCellValueByColumnAndRow(2,$k, $ns->nik);		
				 $worksheet->setCellValueByColumnAndRow(3,$k, $ns->nama);	
				  $value = $debt->value;
				 if(empty($debt->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(4,$k, $value);
				 $this->db->where('jenis_transaksi','credit');		
				  $this->db->where('subjenis',$simpanan[$i]);
				 $kredit = $this->Model_all->tabungan2($ns->nik)->row();
				 $value = $kredit->value;
				 if(empty($kredit->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(5,$k, $value );		
				 $worksheet->setCellValueByColumnAndRow(6,$k, $kredit->value - $debt->value);	
				 $worksheet->getStyle("A5:F".$k)->applyFromArray($border);	
			}
		}
		
		
		 $sheet_size = 7;
		$simpanan = array (
				0 =>'Pinjaman Jangka Pendek',
					'Pinjaman Jangka Menengah',				
					'Pinjaman Jangka Panjang',				
		);
		for($i=4;$i<$sheet_size;$i++){
		$worksheet = $spreadsheet->setActiveSheetIndex($i);
		$worksheet = $spreadsheet->getActiveSheet();
		$this->load->model('Model_all');
		$this->db->where('status', 'AKTIF');
		$nasabah = $this->Model_all->data_nasabah();
		 $no=0;	$k=4;
			foreach($nasabah->result() as $ns){
				 $where = "nik='".$ns->nik."' AND (jenis_transaksi='kredit' OR jenis_transaksi='angsur') AND subjenis='".$simpanan[$i-4]."' ";
				 $this->db->where($where);
				 $db = $this->Model_all->tabungan2($ns->nik)->row();	
				 $no++; $k++;			 
				 $this->db->where('jenis_transaksi','angsur');
				 $this->db->where('subjenis',$simpanan[$i-4]);
				 $angsur = $this->Model_all->tabungan2($ns->nik)->row();
				 $worksheet->setCellValueByColumnAndRow(1,$k, $no);		
				 $worksheet->setCellValueByColumnAndRow(2,$k, $ns->nik);		
				 $worksheet->setCellValueByColumnAndRow(3,$k, $ns->nama);	
				$value = $debt->value;
				 if(empty($debt->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(5,$k, $value);
				 $this->db->where('jenis_transaksi','kredit');		
				  $this->db->where('subjenis',$simpanan[$i-4]);
				 $kredit = $this->Model_all->tabungan2($ns->nik)->row();	
				 $value = $kredit->value;
				 if(empty($kredit->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(4,$k, $value);		
				 $worksheet->setCellValueByColumnAndRow(6,$k, $kredit->value - $debt->value);
				 $worksheet->getStyle("A5:F".$k)->applyFromArray($border);				 
			}
		}
		$worksheet = $spreadsheet->setActiveSheetIndex(7);
		$worksheet = $spreadsheet->getActiveSheet();
		$this->load->model('Model_all');
		$this->db->where('status', 'AKTIF');
		$nasabah = $this->Model_all->data_nasabah();
		 $no=0;	$k=4;
			foreach($nasabah->result() as $ns){
				 $where = "nik='".$ns->nik."' AND  subjenis = 'diakonia'  AND (jenis_transaksi='credit' OR jenis_transaksi='debt')  ";
				 $this->db->where($where);
				 $db = $this->Model_all->tabungan2($ns->nik)->row();	
				 $no++; $k++;			 
				 $this->db->where('jenis_transaksi','debt');
				 $this->db->where('subjenis','diakonia');
				 $debt = $this->Model_all->tabungan2($ns->nik)->row();
				 $worksheet->setCellValueByColumnAndRow(1,$k, $no);		
				 $worksheet->setCellValueByColumnAndRow(2,$k, $ns->nik);		
				 $worksheet->setCellValueByColumnAndRow(3,$k, $ns->nama);	
				  $value = $debt->value;
				 if(empty($debt->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(4,$k, $value);
				 $this->db->where('jenis_transaksi','credit');		
				  $this->db->where('subjenis','diakonia');
				 $kredit = $this->Model_all->tabungan2($ns->nik)->row();
				 $value = $kredit->value;
				 if(empty($kredit->value)) $value =0;
				 $worksheet->setCellValueByColumnAndRow(5,$k, $value );		
				 $worksheet->setCellValueByColumnAndRow(6,$k, $kredit->value - $debt->value);	
				 $worksheet->getStyle("A5:F".$k)->applyFromArray($border);				 
			}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename= "Rekap.xls"');
		header('Cache-Control: max-age=0');
		 $writer = new PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
		 $writer->save('php://output');
		 exit;
		
	
	}
	
	public function cek_sesi (){	
		 if (!isset($_SESSION['validated'])) 
		 redirect(''); 
	}
	
}