<?php
/**
 * Created by PhpStorm.
 * User: chltmdfyd
 * Date: 2017. 9. 11.
 * Time: PM 2:47
 */
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function dashboard () {

        $this->load->view('admin/inc/header');
        $this->load->view('admin/inc/gnb');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/inc/footer');
    }

    public function shop_list ($page=0) {
        $this->load->model("shopmodel");
        $body = [];
        $limit = 10;
        $shop_name = $this->input->get("name");
        $shops = $this->shopmodel->get_list($shop_name,$page,$limit);
        $body['shops'] = $shops['result'];
        $body['total'] = $shops['total'];
        $this->load->library('pagination');
        $config['base_url'] = '/admin/main/shop_list/';
        $config['total_rows'] = $body['total'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['reuse_query_string'] = true;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $config['anchor_class'] = 'follow_link';


        $this->pagination->initialize($config);

        $body['page'] =  $this->pagination->create_links();

        $this->load->view('admin/inc/header');
        $this->load->view('admin/inc/gnb');
        $this->load->view('admin/shop/list',$body);
        $this->load->view('admin/inc/footer');
    }

    public function shop_reg ($id = false) {
        $this->load->model("shopmodel");
        $footer_data = [];
        $footer_data['page'] = 'shop_reg';

        $body = [];
        if( $id ) {
            $body['shop'] = $this->shopmodel->get($id);
        }

        $this->load->view('admin/inc/header');
        $this->load->view('admin/inc/gnb');
        $this->load->view('admin/shop/reg',$body);
        $this->load->view('admin/inc/footer',$footer_data);
    }
}