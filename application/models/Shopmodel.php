<?php
class Shopmodel extends CI_Model {

    public $SHOP = 'F_SHOP';

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        return $this->db
            ->from($this->SHOP)
            ->where('id',$id)->get()->row_array();
    }

    public function get_si()
    {
        return $this->db->select('id,si,lat,leng')
            ->from($this->SHOP)
            ->group_by('si')
            ->order_by('if(si = "서울",1,0)','desc',false)->get()->result();
    }

    public function get_do($si)
    {
        return $this->db->select('id,si,do')
            ->from($this->SHOP)
            ->where('si',$si)
            ->order_by('if(si = "서울",1,0)','desc',false)->get()->result();
    }

    public function get_all(){
        $query = $this->db->get($this->SHOP)->result();
        return $query;
    }

    public function get_shop($si ,$do)
    {
        $query = $this->db
            ->from($this->SHOP)
            ->where(['si'=>$si,'do'=>$do])
            ->order_by('if(si = "서울",1,0)','desc',false)->get()->result();
        return $query;
    }

    public function save ($shop)
    {
        if( isset( $shop['id']) AND  $shop['id'] !== '' ) {
            $this->db->where('id',$shop['id'])->update($this->SHOP,$shop);
            return $shop['id'];
        } else {
            $this->db->insert($this->SHOP,$shop);
            return $this->db->insert_id();
        }

    }

    public function get_list($name='',$offset=0,$limit = 2){
        $shop = [];
        $shop['total']  = 0;
        $shop['result'] = [];
        $this->db->start_cache();
        if( $name != '' ) {
            $name = urldecode($name);
            $this->db->like('name',$name,'both');
        }
        $this->db->stop_cache();
        $shop['total'] = $this->db->count_all_results($this->SHOP);
        $this->db->order_by('id','desc');
        $this->db->offset($offset);
        $this->db->limit($limit);
        $shop['result'] = $this->db->get($this->SHOP)->result_array();
        $this->db->flush_cache();
        return $shop;
    }
}