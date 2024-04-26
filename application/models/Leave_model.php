<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leave_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database(); // Load the database library
    }

    public function insert_leave($data)
{
    // Ensure 'status' is set to a default value if not provided
    if (!isset($data['status'])) {
        $data['status'] = 'Pending'; // Set a default status, e.g., 'Pending'
    }

    // Insert data into the 'leave' table
    $this->db->insert('leave', $data);

    // Check if the insertion was successful
    
}
    public function get_all_leave()
    {
        // Fetch all leave data from the 'leave' table
        $query = $this->db->get('leave');

        // Check if data is fetched
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }
    public function get_leave_history_by_employee_id($employee_id)
{
    // Fetch leave history from the 'leave' table based on employee_id
    $this->db->where('employee_id', $employee_id);
    $query = $this->db->get('leave');

    // Check if data is fetched
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return false;
    }
}
public function update_leave_status($id, $status) {
    $data = array(
        'status' => $status
    );
    $this->db->where('id', $id);
    $this->db->update('leave', $data);
}
public function get_pending_leave_requests()
    {
        // Query to fetch pending leave requests
        $this->db->where('status', 'Pending');
        $query = $this->db->get('leave');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array();
        }
    }
public function get_all_leave_history()
{
    return $this->db->get('leave')->result_array();
}





}
