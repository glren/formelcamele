<?php
class Shops extends CI_Model {
    private $SHOP = 'F_SHOP';
    public function __construct()
    {
        parent::__construct();
    }

    public function has_shop($shop_id){
        return $this->db->where('id',$shop_id)->from($this->SHOP)->counts_all_result();
    }

    public function save($shop)
    {
        $return = false;
        if ( $this->has_shop($shop['id']) > 0 ) {
            $return = $this->_update_shop($shop);
        } else {
            $return = $this->_insert_shop($shop);
        }
        return $return;
    }
    private function _insert_shop($shop)
    {
        if( !empty($shop) ) {
            if ( $this->db->insert($this->SHOP,$shop) ) {
                return $this->db->insert_id();
            }
        }
        return false;
    }
    private function _update_shop($shop,$shop_id)
    {
        if ( $this->db->where('id',$shop_id)->update($this->MEMBER,$shop) ) {
            return $shop_id;
        }
        return false;
    }

    public function get($where,$order,$desc,$offset=0,$limit=15){

    }
}