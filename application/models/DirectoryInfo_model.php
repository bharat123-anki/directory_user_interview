<?php
class DirectoryInfo_model extends CI_Model
{


    public function getAllDirecetoryInfoData($user_id = '', $condition = array(), $limit = array(), $order = array())
    {
        $limit = (array_reverse($limit));

        $this->db->select('di.*,DATE(created_at) AS c_day');
        $this->db->from('directory_info di');
        $this->db->where('di.is_deleted', 0);
        if (!empty($condition['first_name']['value'])) {
            $first_name = $condition['first_name']['value'];
            $this->db->where('di.first_name', $first_name);
        }
        // print_r($condition);
        if (!empty($condition['mobile_no']['value'])) {
            $mobile_no = $condition['mobile_no']['value'];
            $this->db->where('di.mobile_no', $mobile_no);
        }
        $this->db->where('di.user_id', $user_id);
        if (!empty($limit)) {
            $this->db->limit($limit[0], $limit[1]);
        }
        if (!empty($order) && isset($order['order_by']) && isset($order['order_type'])) {
            $this->db->order_by($order['order_by'], $order['order_type']);
        }
        // print_r($this->db->last_query());
        // exit;

        $query = $this->db->get()->result_array();
        return ($query);
    }
    public function getDirectoryDataById($id)
    {

        $sql = "SELECT di.* FROM directory_info di  where di.id='" . $id . "' ";
        $query = $this->db->query($sql);
        return ($query->row_array());
    }
    public function increaseviewCount($id)
    {
        $date = date("Y-m-d", strtotime("now"));
        $this->db->select('dcl.*');
        $this->db->from('directory_count_logs dcl');
        $this->db->where('dcl.directory_id', $id);
        $this->db->where('dcl.date', $date);
        $query = $this->db->get()->result_array();
        if (empty($query)) {
            $ans = $this->db->insert('directory_count_logs', array('directory_id' => $id, 'date' => $date, 'count' => 1));
        } else {
            $query = "UPDATE directory_count_logs SET count = count + 1 WHERE directory_id = '" . $id . "' AND date = '" . $date . "' ";
            $ans = $this->db->query($query);
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        }
    }


    public function getSearchFormData($id = '')
    {
        $this->db->select('di.*');
        $this->db->from('directory_info di');
        $this->db->where('di.is_deleted', 0);
        $this->db->where('di.user_id', $id);
        $this->db->order_by('di.id', 'DESC');
        $ans = $this->db->get()->result_array();
        return $ans;
    }
}
