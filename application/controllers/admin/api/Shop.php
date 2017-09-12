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
        $shop['id']             =$this->input->post('id',true);
        $shop['name']           =$this->input->post('name',true);
        $shop['si']             =$this->input->post('si',true);
        $shop['do']             =$this->input->post('do',true);
        $shop['ds_address']     =$this->input->post('ds_address',true);
        $shop['tel']            =$this->input->post('tel',true);
        $shop['busineess_hour'] =$this->input->post('busineess_hour',true);
        $shop['lat']            =$this->input->post('lat',true);
        $shop['leng']           =$this->input->post('leng',true);
        $shop['result']         = false;
        $shop['error_list']     = [];


        $this->form_validation->set_rules('si','','required',['required'=>'도시를 설정해주세요.']);
        $this->form_validation->set_rules('do','','required',['required'=>'지역을 설정해주세요.']);
        $this->form_validation->set_rules('lat','','required',['required'=>'위도를 설정해주세요.']);
        $this->form_validation->set_rules('leng','','required',['required'=>'경도를 설정해주세요.']);


        $return['result'] = $this->form_validation->run();

        if ( !$return['result'] ) {
            $shop['error_list'] = $this->form_validation->error_array();
        } else {
            $this->load->model('shopmodel');
            unset($shop['result']);
            unset($shop['error_list']);
            $this->shopmodel->save($shop);
            $shop['result'] = true;
            $shop['error_list'] = [];
        }

        echo json_encode($shop);
    }

    public function delete(){
        $this->load->library('form_validation');
        $shop = [];
        $shop['id']             =$this->input->post('id',true);

        $this->form_validation->set_rules('id','','required',['required'=>'삭제 대상이 없습니다']);

        $return['result'] = $this->form_validation->run();
        if ( $return['result'] ) {
            $return['result'] = $this->db->where('id',$shop['id'])->delete('F_SHOP');
        }
        echo json_encode($return);
    }
}