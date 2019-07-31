<?php
class Customer extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->data['module'] = 'Customers';
        $this->data['submodule'] = 'Customers';
        $this->data['page'] = 'All Records';
        $this->load->model('CustomerModel', 'customer');
    }
    /**
     * Load all customers page
     */
    function index()
    {
        $this->template->load("Admin", "customers/All", $this->data);
    }
    /**
     * new page
     */
    function new()
    {

    }
    /**
     * Edit page
     */
    function edit($id = 0)
    {

    }
    /**
     * Get List Ajax call
     */
    function ajaxGetCustomers()
    {
        $post_data = $this->input->post();
        $limit = 10;
        $start = $post_data['page'] * $limit;
        $search = $post_data['search'];
        if ($search != '') {

        }
        $cust_data = $this->customer->getAll($start, $limit, $search);
        $dataArr = array(
            'data' => array(),
            'nextpage' => $post_data['page'] + 1
        );

        if (!empty($cust_data)) {
            $rowdata = array();
            foreach ($cust_data as $idata) {
                $arr = array();
                $arr['id'] = $idata['id'];
                $arr['fullname'] = $idata['fullname'];
                $arr['emailid'] = $idata['emailid'];
                $arr['phone'] = $idata['phone'];
                $arr['address'] = $idata['address'];
                $arr['status'] = $idata['status'];
                $rowdata[] = $arr;
            }
            $dataArr['data'] = $rowdata;
        } else {
            $dataArr['nextpage'] = null;
        }
    }
}