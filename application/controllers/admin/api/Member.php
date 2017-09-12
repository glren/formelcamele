<?php
/**
 * Created by PhpStorm.
 * User: chltmdfyd
 * Date: 2017. 9. 11.
 * Time: PM 3:09
 */
class Member extends CI_Controller {

    public function login()
    {

        $this->load->model('admin/Membermodel');
        $user = [];
        $user["user_id"]    = $this->input->post("user_id",true);
        $user["password"]   = $this->input->post("password",true);
        $user["result"]     = false;
        $user["msg"]        = '로그인 정보를 정확히 입력해주세요.';
        $user['is_admin']   = 'N';

        if ( $this->Membermodel->is_admin($user) ) {
            unset($user['password']);
            $user['is_admin'] = 'Y';
            $user["result"] = true;
            $user["msg"]    = '로그인 성공';
            $this->session->set_userdata($user);
        }

        echo json_encode($user);
    }
}