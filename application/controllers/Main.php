<?php
class Main extends CI_Controller {

    public function index()
    {
        $this->load->custorm_view('inc/header');
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('index');
        $this->load->custorm_view('inc/footer');
    }

    public function brand_story ()
    {
        $this->load->custorm_view('inc/header');
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('intro');
        $this->load->custorm_view('inc/footer');
    }

    public function shop_info ()
    {
        $this->load->custorm_view('inc/header');
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('shop');
        $this->load->custorm_view('inc/footer');
    }

    public function campaign ()
    {
        $head = [
            'page_class' => 'campaign'
        ];
        $this->load->custorm_view('inc/header',$head);
        $this->load->custorm_view('inc/gnb');
        $this->load->custorm_view('campaign');
        $this->load->custorm_view('inc/footer');
    }
}