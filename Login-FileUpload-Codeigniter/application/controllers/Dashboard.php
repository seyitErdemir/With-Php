<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function getDashboard()
    {
        if (!$this->session->userdata('UserLoginSession')) {
            redirect(base_url('login'));
        }   

        $this->load->view('dashboard');
    }

    function fileUpload()
    {
        if (!$this->session->userdata('UserLoginSession')) {
            redirect(base_url('login'));
        }   


        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['encrypt_name']     = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('dashboard', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $_SESSION['movedImage']=$data;
            $this->load->view('dashboard', $data);
        }
    }
}
