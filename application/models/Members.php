<?php
class Members extends CI_Model {
    private $MEMBER = 'F_MEMBER';
    public function __construct()
    {
        parent::__construct();
    }

    public function has_id($user_id){
        return $this->db->where('user_id',$user_id)->from($this->MEMBER)->counts_all_result();
    }

    public function save($user)
    {
        $return = false;
        if ( $this->has_id($user['user_id']) > 0 ) {
            $return = $this->_update_user($user);
        } else {
            $return = $this->_insert_user($user);
        }
        return $return;
    }
    private function _insert_user($user)
    {
        if( !empty($user) ) {
            if ( $this->db->insert($this->MEMBER,$user) ) {
                return $this->db->insert_id();
            }
        }
        return false;
    }
    private function _update_user($user,$user_id)
    {
        if ( $this->db->where('user_id',$user_id)->update($this->MEMBER,$user) ) {
            return $user_id;
        }
        return false;
    }

}