<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leave extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Leave_model'); // Load the Leave_model
        // $this->load->model('Admin_model'); // Load the Leave_model

    }

    public function submit_leave()
    {
        $username = $this->session->userdata('username');
        $user_data = $this->db->get_where('users', ['username' => $username])->row_array();

        $employee_id = $user_data['employee_id']; // Fetch employee_id from session

        if ($this->input->post()) {
            $name = $this->input->post('employee_name');
            $startdate = $this->input->post('start_date');
            $enddate = $this->input->post('end_date');
            $reason = $this->input->post('reason');
            $status = $this->input->post('status');

            // Prepare data array
            $data = array(
                'employee_id' => $employee_id, // Use the fetched employee_id
                'employee_name' => $name,
                'start_date' => $startdate,
                'end_date' => $enddate,
                'reason' => $reason,
                'status' => $status,
            );

            // Call the insert_leave method of Leave_model to insert data into the database
            $this->Leave_model->insert_leave($data);


            // Optionally, you can redirect to another page after successful insertion
            redirect('profile');
        }

    }
    public function leave_history()
    {
        // Fetch the leave history data from the database
        $username = $this->session->userdata('username');
        $user_data = $this->db->get_where('users', ['username' => $username])->row_array();

        $employee_id = $user_data['employee_id'];
        $data['leave_history'] = $this->Leave_model->get_leave_history_by_employee_id($employee_id);


        // Load the history view
        $this->load->view('profile/history', $data);

    }
    public function approve_leave($id) {
        $this->Leave_model->update_leave_status($id, 1); // 1 for Approved
        redirect('leave/leavependingrequests'); // Redirect back to the history page
    }



    public function reject_leave($id) {
        $this->Leave_model->update_leave_status($id, 2); // 2 for Rejected
        redirect('leave/leavependingrequests'); // Redirect back to the history page
    }

    public function admin_history()
    {
        // Fetch all leave history data from the database
        // Fetch the leave history data from the datab
        $data['leave_history'] = $this->Leave_model->get_all_leave_history();
        $d['title'] = 'Dashboard';
        $d['account'] = $this->Admin_model->getAdmin($this->session->userdata['username']);
        $d['display'] = $this->Admin_model->getDataForDashboard();
        $data['employee'] = $this->Admin_model->get_employee_data(); // Replace 'Admin_model' with your actual model name and method

        // Merge $d and $data arrays
        $merged_data = array_merge($d, $data);

        $this->load->view('templates/dashboard_header', $merged_data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/adminhistory', $data);
        $this->load->view('templates/dashboard_footer');
    }

    public function leavependingrequests()
    {
        // Fetch pending leave requests
        $data['leave_data'] = $this->Leave_model->get_pending_leave_requests();
    
        // Load admin details
        $d['title'] = 'Dashboard';
        $d['account'] = $this->Admin_model->getAdmin($this->session->userdata('username'));
        $d['display'] = $this->Admin_model->getDataForDashboard();
        $data['employee'] = $this->Admin_model->get_employee_data();
    
        // Merge data arrays
        $merged_data = array_merge($d, $data);
    
        // Load views
        $this->load->view('templates/header', $merged_data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/approve', $data);
        $this->load->view('templates/footer');
    }
    


    public function sbmit_leave()
    {
        // Display success message or redirect to a success page
        echo "Leave application submitted successfully!";
    }
}
