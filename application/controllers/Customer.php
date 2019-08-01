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
        $this->load->model('ActivitiesModel', 'activities');
        $this->data['customer_data'] = $this->customer->get_table();
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
        $this->data['page'] = 'New Records';
        $this->template->load("Admin", "customers/New", $this->data);
    }
    /**
     * Edit page
     */
    function edit($id = 0)
    {
        if ($id > 0) {
            $this->data['page'] = 'Update Records';
            $this->data['customer_data'] = $this->customer->get_by_id($id);
            $this->template->load("Admin", "customers/New", $this->data);
        } else {
            redirect(site_url('customer'));
        }

    }
    /**
     * Show page
     */
    function show($id)
    {
        if ($id > 0) {
            $this->data['page'] = 'Show Customer';
            $this->data['customer_data'] = $this->customer->get_by_id($id);
            // Get customer activity details
            $this->data['customer_activity'] = $this->activities->get_by_where(array('customer_id' => $id));
            $this->template->load("Admin", "customers/Show", $this->data);
        } else {
            redirect(site_url('customer'));
        }
    }
    /**
     * Save customer data
     */
    function save()
    {
        $request_data = $this->input->post();
        if ($request_data['fullname'] != '' && $request_data['emailid'] != '' && $request_data['phone'] != '') {
            // check email id phone is exists
            $sdata = $this->customer->check_exists(array('emailid' => $request_data['emailid'], 'phone' => $request_data['phone']));
            if (empty($sdata)) {
                // create new customer
                $rdata = $this->customer->save($request_data, 0);
                if ($rdata) {
                    $this->response(array('status' => true, 'message' => 'Saved', 'redirect' => site_url('customer/show/' . $rdata)));
                }
            } else {
                $this->response(array('status' => false, 'message' => 'Customer Data submitted is already exist.'));
            }
        }
        $this->response(array('status' => false, 'message' => 'Invalid Data submitted'));
    }
    /**
     * Get List Ajax call
     */
    public function ajaxGetCustomerList()
    {
        $post_data = $this->input->post();
        $limit = $post_data['perpagerecords'];
        $start = ($post_data['page'] - 1) * $limit;
        $search = $post_data['search'];
        if ($search != '') {

        }
        $limit = array(
            $limit,
            $start
        );
        $where = array();
        $cust_data = $this->customer->getAll(array(), $limit);
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
                $arr['show'] = site_url('customer/show/' . $idata['id']);
                $arr['edit'] = site_url('customer/edit/' . $idata['id']);
                $arr['delete'] = site_url('customer/delete/' . $idata['id']);
                $rowdata[] = $arr;
            }
            $dataArr['data'] = $rowdata;
        } else {
            $dataArr['nextpage'] = null;
        }
        $this->response(array('status' => true, 'message' => '', 'data' => $dataArr));
    }
    public function ajaxGetCustomerListPaging()
    {
        $request_data = $this->input->post();
        $totalData = $this->customer->countData();
        $pages = 0;
        $nextpage = 0;
        if ($totalData > 0 && $totalData > $request_data['perpagerecord']) {
            if ($request_data['perpagerecord'] > 0) {
                $pages = (($totalData % $request_data['perpagerecord']) + $totalData) / $request_data['perpagerecord'];
            } else {
                $perpage = 10;
                $pages = (($totalData % $perpage) + $totalData) / $perpage;
            }
        } else {
            $pages = 1;
        }
        if ($pages > 1) {
            $nextpage = 2;
        }
        $this->response(array('status' => true, 'message' => '', 'pages' => $pages, 'nextpage' => $nextpage));
    }
    function ajaxGetActivities($id = 0)
    {
        $dataArr = array();
        if ($id > 0) {
            $dataArr = $this->activities->get_by_where(array('customer_id' => $id));
            if (!empty($dataArr)) {
                $this->response(array('status' => true, 'message' => '', 'data' => $dataArr));
            } else {
                $this->response(array('status' => false, 'message' => 'No records found', 'data' => $dataArr));
            }
        }
        $this->response(array('status' => false, 'message' => 'Invalid Customer ID', 'data' => $dataArr));
    }
    function saveActivity()
    {
        $request_data = $this->input->post();
        if ($request_data['customer_id'] != '' && $request_data['next_act_description'] != '') {
            $rdata = $this->activities->save($request_data, 0);
            if ($rdata) {
                $this->response(array('status' => true, 'message' => 'Saved'));
            }
        }
        $this->response(array('status' => false, 'message' => 'Invalid Data submitted'));
    }
}