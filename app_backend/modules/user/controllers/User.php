<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function index()
	{
       
	}

	public function login()
	{
       $this->load->view('login');
	}
}