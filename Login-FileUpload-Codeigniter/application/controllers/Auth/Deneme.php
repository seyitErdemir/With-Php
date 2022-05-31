<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deneme extends CI_Controller
{
    public function index(){
        $this->load->view('deneme.php');
    }

}

?>