<?php
class Pub extends CI_Controller {

    public function index(){
        $this->load->custorm_view('inc/header');
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('index');
        $this->load->custorm_view('inc/footer');
    }

    public function intro (){
        $this->load->custorm_view('inc/header');
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('intro');
        $this->load->custorm_view('inc/footer');
    }
}