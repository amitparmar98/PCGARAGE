<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Assistant{

function __construct()
{

$this->ci =& get_instance();
$this->ci->load->library('email');

}

function send_email($email, $subject, $message)
{

	$this->ci->email->from('info@pcgarage.uk.com', 'Pcgarage');
	$this->ci->email->to($email);

	$this->ci->email->subject($subject);
	$this->ci->email->message($message);

	$this->ci->email->send();

}

}