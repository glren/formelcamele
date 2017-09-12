<?php
class Membermodel extends CI_Model {

    public $MEMBER = 'F_MEMBER';

    public function __construct()
    {
        parent::__construct();
    }

    public function is_admin($user)
    {
         $query = $this->db->where("user_id='{$user['user_id']}' AND password=password('{$user['password']}')")->get($this->MEMBER)->row();
         return $query;
    }
}