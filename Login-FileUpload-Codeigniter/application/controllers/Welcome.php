<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('register');
	}
	function registerNow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			if ($this->form_validation->run()) {
				$name = $this->input->post('name');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$data = array(
					'name' => $name,
					'email' => $email,
					'password' => sha1($password)
				);

				$this->load->model('user_model');
				$this->user_model->insertUser($data);
				$this->session->set_flashdata('success', 'Successfully user created');
				redirect(base_url('welcome/index'));
			}
		} else {
			$this->load->view('register');
		}
	}

	function login()
	{
		$this->load->view('login');
	}
	function loginNow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');


			if ($this->form_validation->run()) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = sha1($password);


				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password, $email);
				if ($status != false) {
					$name = $status->name;
					$email = $status->email;

					$session_data = array(
						'name' => $name,
						'email' => $email

					);
					$this->session->set_userdata('UserLoginSession', $session_data);
					 
					redirect(base_url('welcome/dashboard'));
				} else {
					$this->session->set_flashdata('error', 'Email or password is wrong');
					redirect(base_url('welcome/login'));
				}
			} else {
				$this->session->set_flashdata('error', 'Lütfen boş bırakmayınız.');
				redirect(base_url('welcome/login'));
			}
		}
	}


	
	function dashboard()
	{
		$this->load->view('dashboard');
	}

	function logout()
	{

		session_destroy();
		redirect(base_url('welcome/login'));
	}
	function fileUpload()
	{
		
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;   
		$config['encrypt_name']     = true;
		 
		$this->load->library('upload', $config);



		if ( ! $this->upload->do_upload('userfile'))
		{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('dashboard', $error);
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());
			 
				$this->load->view('dashboard', $data);
		}


		 

		 
	}
}
