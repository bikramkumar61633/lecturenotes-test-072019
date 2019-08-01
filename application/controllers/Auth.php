<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel', 'users');
    }
    public function index()
    {
        $this->load->view('Login');
    }
    /**
     * Register page
     */
    public function signup()
    {
        $this->load->view('Signup');
    }
    function ajaxRegister()
    {
        $this->load->helper('security');
        $fullname = $this->security->xss_clean(@$this->input->post("fullname"));
        $emailid = $this->security->xss_clean(@$this->input->post("emailid"));
        $phone = $this->security->xss_clean(@$this->input->post("phone"));
        $password = $this->security->xss_clean(@$this->input->post("password"));
        // check nothing should empty
        if ($fullname != '' && $emailid != '' && $phone != '' && $password != '') {
            // check emailid or phone no
            $sdata = $this->users->check_exists(array('emailid' => $emailid, 'phone' => $phone));
            if (empty($sdata)) {
                // create the user
                $this->load->library("Bcrypt");
                $arrData = array(
                    'id' => '',
                    'fullname' => $fullname,
                    'emailid' => $emailid,
                    'phone' => $phone,
                    'password' => $this->bcrypt->hash_password($password)
                );
                $this->users->save($arrData, 0);
                die(json_encode(array('status' => true, 'message' => 'Success', 'redirect' => site_url("auth"))));
            } else {
                die(json_encode(array('status' => false, 'message' => 'User already exist')));
            }
        }
    }
    /**
     * Process the login post request data
     */

    public function processauthentication()
    {
        $this->load->helper('security');
        $username = $this->security->xss_clean($this->input->post("username"));
        $password = $this->security->xss_clean($this->input->post("password"));
        $validationdata = $this->users->authenticate($username, $password);
        if ($validationdata['status'] == 0) {
            echo json_encode(array('status' => false, 'message' => 'Fail'));
        } else {
            $logininfo = array(
                "iddd" => $validationdata['rdata'][0]->id,
                "fullname" => $validationdata['rdata'][0]->fullname,
                "emailid" => $validationdata['rdata'][0]->emailid,
                "phone" => $validationdata['rdata'][0]->phone,
            );
            $this->session->set_userdata("logindata", $logininfo);
            echo json_encode(array('status' => true, 'message' => 'success', 'redirect' => site_url('dashboard')));
        }
    }
    public function logout()
    {
        $this->session->unset_userdata("logindata");
        $this->session->sess_destroy();
        redirect("auth", "refresh");
    }
}
