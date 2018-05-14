<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library(array('form_validation'));
		$this->load->model('Adminmodel');
		
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function chkLogin()
	{
		if($this->input->post())
		{			

			if($this->form_validation->run('login_validation') == FALSE)
			{
				$this->session->set_flashdata('message',array('message'=>validation_errors(),'class'=>'alert alert-danger'));
				$this->load->view('login');
			}

			else
			{
				$data 		=	array
									(
										'email'		=>	strtolower($this->input->post('uemail')),
										'password'	=>	md5($this->input->post('upassword'))
									);

				$checkLogin = 	$this->Adminmodel->chkLogin($data);

				if($checkLogin !=NULL)
				{
					$userData 	=	array
										(
											'site_user_id'	=>	$checkLogin->user_id,
											'userName'		=>	$checkLogin->first_name,
											'email'			=>	$checkLogin->email,
											'phone'			=>	$checkLogin->phone											
										);

					$this->session->set_userdata($userData);				
					redirect('/');
				}

				else
				{
					$this->session->set_flashdata('message',array('message'=>'Invalid Username or Password! Please try again','class'=>'alert alert-danger'));
					redirect('login');

				}

			}

				
		}
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function forgotPassword()
	{
		if($this->input->post())
		{
			$email =	$this->input->post('email');

			$email_encode = base64_encode($email);

			if($email)
			{
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

				if($this->form_validation->run() == FALSE)
				{
					$this->session->set_flashdata('message',array('message'=>validation_errors(),'class'=>'alert alert-danger'));
					redirect('login/forgotPassword');
				}

				$this->load->library('email');

				/* Customer email start */
				$htmlContent  = '<h3>Hello</h3>';				
				$htmlContent .= '</br>';				
				$htmlContent .= '<p>Please visit the below link to reset your password.</p>';				
				$htmlContent .= "<a href='https://pcgarage.uk.com/login/resetPassword/".$email_encode."'>https://pcgarage.uk.com/login/resetPassword/".$email_encode."</a>";
				$htmlContent .= '<h3>Thanks</h3>';
	                    
				$this->email->from('info@pcgarage.uk.com', 'Pcgarage');
				$this->email->to($email);
				// $this->email->cc('raj.saini15@gmail.com');
				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				$this->email->subject('Forgot Password');
				$this->email->message($htmlContent);			
				$this->email->send();
				/* Customer email end */

				$this->session->set_flashdata('message',array('message'=>'Please check your email for password','class'=>'alert alert-success'));
				redirect('login/forgotPassword');			
			}

			
		}

		$this->load->view('forgotpassword');
	}

	public function resetPassword($email='')
	{
		$data['email'] = array();
		if($email)
		{
			$email_decode 	=	base64_decode($email);

			$data['decode_email']	=	$email_decode;
		}

		$this->load->view('resetpassword',$data);
	}

	public function savePassword()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

			if($this->form_validation->run() == FALSE)
			{
				$this->session->set_flashdata('message',array('message'=>validation_errors(),'class'=>'alert alert-danger'));
				$data['decode_email'] 	=	$this->input->post('email');

				$this->load->view('resetpassword',$data);

			}

			else
			{

				$data = array
						(
							'password' => md5($this->input->post('password'))
						);

				$result = $this->Adminmodel->savePassword($this->input->post('email'),$data);

				if($result)
				{
					$this->session->set_flashdata('message',array('message'=>'Your Password changed successfully','class'=>'alert alert-success'));
					redirect('login/resetPassword');
				}

				else
				{
					$this->session->set_flashdata('message',array('message'=>'Email does not exists','class'=>'alert alert-danger'));
					redirect('login/resetPassword');
				}
			}			

		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */