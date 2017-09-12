<?php
/**
 * Created by PhpStorm.
 * User: chltmdfyd
 * Date: 2017. 9. 11.
 * Time: PM 2:47
 */
class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function save()
    {
        $this->load->library('form_validation');
        $shop = [];
        $shop[] =$this->input->post('name',true);

        $shop['si'] =$this->input->post('si',true);
        $shop['do'] =$this->input->post('do',true);
        $shop['ds_address'] =$this->input->post('ds_address',true);
        $shop['tel'] =$this->input->post('tel',true);
        $shop['busineess_hour'] =$this->input->post('busineess_hour',true);
        $shop['lat'] =$this->input->post('lat',true);
        $shop['leng'] =$this->input->post('leng',true);

        $this->form_validation->set_rules('si','','required',['required'=>'도시를 설정해주세요.']);
        $this->form_validation->run('si','','required',['required'=>'도시를 설정해주세요.']);

    }
}