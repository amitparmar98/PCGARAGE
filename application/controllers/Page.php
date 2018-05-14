<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct() {	
		parent::__construct();	 
		$this->load->library(array('session'));	
		$this->load->helper(array('url'));	
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->model("adminmodel");
	}
		
	
	public function showpage($id){
            
		$query = $this->db->query('SELECT * FROM pages WHERE id ="'.$id.'"')->row();
		$data['title'] = $query->page_title;
		$data['page'] = $query;
		$this->load->view('showpage',$data);
	}
	public function showlocationpage($id){            
		$query = $this->db->query('SELECT * FROM vendor WHERE id ="'.$id.'"')->row();
		$data['title'] = $query->fullname;
		$data['page'] = $query;
		$this->load->view('showLocationpage',$data);
	}
	
	public function showpagebulkrepair($id){
            
		$query = $this->db->query('SELECT * FROM pages WHERE id ="'.$id.'"')->row();
		$data['title'] = $query->page_title;
		$data['thanksmessg'] ='';
		if(isset($_POST['submit'])){
			
			$this->load->library('email');
			
			$htmlContent = '<h3>Hi Admin</h3>';
			$htmlContent .= '</br>';
			$htmlContent .= '<p>'.$_POST['cname'].' is requested you for repair in bulk.</p>';
			$htmlContent .= '<p>Following are submitted information:-</p>';
			$htmlContent .= '<table>';
			$htmlContent .= '<tr><td>Name</td><td>'.$_POST['cname'].'</td></tr>';
			$htmlContent .= '<tr><td>Phone</td><td>'.$_POST['phone'].'</td></tr>';
			$htmlContent .= '<tr><td>Email</td><td>'.$_POST['email'].'</td></tr>';
			$htmlContent .= '<tr><td>Address</td><td>'.$_POST['address'].'</td></tr>';
			$htmlContent .= '<tr><td>Device Name</td><td>'.$_POST['device'].'</td></tr>';
			$htmlContent .= '<tr><td>Number of devices</td><td>'.$_POST['numberofdevices'].'</td></tr>';
			$htmlContent .= '<tr><td>Detail</td><td>'.$_POST['message'].'</td></tr>';
			$htmlContent .= '</table>';
			
			$this->email->from('repair@pcgarage.uk.com', 'Pcgarage');
			$this->email->to('info@pcgarage.uk.com');
		 
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->subject('Repair In Bulk Request');
			$this->email->message($htmlContent);
			
			$this->email->send();
			$data['thanksmessg'] = 'Thank You. Your Request has been Submited Successfully.';
		}
		
		
		$data['page'] = $query;
		$this->load->view('pages/bulkrepair',$data);
	}
	
	
	
}
?>