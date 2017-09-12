<?php
class Shop extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('shopmodel');
    }

    public function save()
    {

        $this->load->library("form_validation");

        $result             = [];
        $result['msg']      = '';
        $result['result']   = false;
        $result['data']     = [];
        $param = array();
        $param['name'] = $this->input->post('name');
        $param['si'] = $this->input->post('si');
        $param['gu'] = $this->input->post('gu');
        $param['address'] = $this->input->post('address');
        $param['ds_address'] = $this->input->post('ds_address');
        $param['tell'] = $this->input->post('tell');
        $param['busineess_hour'] = $this->input->post('busineess_hour');

        $this->form_validation->set_rules('name','','required',[
            'required' => '매장 이름을 입력해주세요.'
        ]);
        $this->form_validation->set_rules('si','','required',[
            'required' => '매장이 위치한 도시를 입력해주세요'
        ]);
        $this->form_validation->set_rules('address','','required',[
            'required' => '매장 주소를 입력해주세요'
        ]);
        $this->form_validation->set_rules('ds_address','','required',[
            'required' => '사용자에게 표시될 매장 주소를 입력해주세요.'
        ]);
        $this->form_validation->set_rules('tel','','required',[
            'required' => '매장 전화번호를 입력해주세요.'
        ]);

        $result['result'] = $this->form_validation->run();
        $result['data'] = $this->form_validation->error_array();
        if($result['result']) {
            $result['msg'] = '매장 정보 저장';
            $result['data'] = $param;
        } else {
            $result['msg'] = '폼체크 실패';

        }

        echo print_r($result);
    }

    public function all(){
        $this->load->model('shopmodel');
        $result          = [];
        $result['shops'] = $this->shopmodel->get_all();
        echo json_encode($result);
    }
    public function get_si(){
        $result          = [];
        $result['shops'] = $this->shopmodel->get_si();
        echo json_encode($result);
    }
    public function get_do(){
        $si = $this->input->get('si',true);
        $result          = [];
        $result['shops'] = $this->shopmodel->get_do($si);
        echo json_encode($result);
    }
    public function get_shop(){
        $si = $this->input->get('si',true);
        $do = $this->input->get('do',true);
        $result          = [];
        $result['shops'] = $this->shopmodel->get_shop($si,$do);
        echo json_encode($result);
    }

}



