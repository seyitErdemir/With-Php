
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('UserLoginSession')) {
            redirect(base_url('dashboard'));
        }  

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
                $this->session->set_flashdata('success', 'Kayıt işlemi Başarılı 3 Saniye Sonra Giriş Ekranına Yönlendirileceksiniz');
                redirect(base_url('register'));
            }
        } else {
            $this->load->view('register');
        }
    }

    function login()
    {
        if ($this->session->userdata('UserLoginSession')) {
            redirect(base_url('dashboard'));
        } 
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

                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('error', 'Email or password is wrong');
                    redirect(base_url('login'));
                }
            } else {
                $this->session->set_flashdata('error', 'Lütfen boş bırakmayınız.');
                redirect(base_url('login'));
            }
        }
    }

    function logout()
	{
		session_destroy();
		redirect(base_url('login'));
	}
}
