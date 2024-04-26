<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  // Constructor
  public function __construct()
  {
    parent::__construct();
    is_weekends();
    is_logged_in();
    is_checked_in();
    is_checked_out();
    $this->load->library('form_validation');
    $this->load->model('Public_model');
    $this->load->model('Admin_model');
    $this->load->model('Leave_model');

  }

  // Dashboard
 public function index()
{
  $data['leave_data'] = $this->Leave_model->get_all_leave();

  $username = $this->session->userdata('username');
  $user_data = $this->db->get_where('users', ['username' => $username])->row_array();

  $employee_id = $user_data['employee_id']; // Fetch employee_id from session
    $dquery = "SELECT department_id AS d_id, COUNT(employee_id) AS qty FROM employee_department GROUP BY d_id";
    $d['d_list'] = $this->db->query($dquery)->result_array();
    
    $squery = "SELECT e.shift_id AS s_id, COUNT(e.id) AS qty, s.start, s.end FROM employee e inner join `shift` s on e.shift_id = s.id GROUP BY s_id";
    $d['s_list'] = $this->db->query($squery)->result_array();

    // $leave_query = "SELECT id,name FROM employee";
    // $data['f_list'] = $this->db->query($leave_query)->result_array();

    // $leaves = "SELECT start_date,end_date,reason,status FROM leave";
    // $datas['h_list'] = $this->db->query($leaves)->result_array();
    
    // echo"<pre>";
    // print_r($datas);
    // exit;
    
    // Dashboard
    $d['title'] = 'Dashboard';
    $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
    $d['display'] = $this->Admin_model->getDataForDashboard();
    
   
    
    // Employee data
    $data['employee'] = $this->Admin_model->get_employee_data(); // Replace 'Admin_model' with your actual model name and method
    
    // Merge $d and $data arrays
    $merged_data = array_merge($d, $data);

    $this->load->view('templates/dashboard_header', $merged_data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('admin/index', $merged_data,$data); // Dashboard Page
    $this->load->view('templates/dashboard_footer');
}

}
