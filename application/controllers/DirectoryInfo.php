<?php
defined('BASEPATH') or exit('No direct script access allowed');
require("App.php");
class DirectoryInfo extends APP_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *       http://example.com/index.php/welcome
   *   - or -
   *       http://example.com/index.php/welcome/index
   *   - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DirectoryInfo_model');
  }
  public function index()
  {
    $this->load->view('user/user');
  }


  public function getDirectoryAddModal()
  {
    if ($this->input->is_ajax_request()) {

      $id = $this->input->post('id');
      $directory_data = [];
      if (!empty($id)) {
        $directory_data = $this->DirectoryInfo_model->getDirectoryDataById($id);
      }
      $data['directory_data'] = $directory_data;
      $this->load->view('user/user_add_modal', $data);
    }
  }


  public function directoryAdd()
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $required = ['first_name', 'last_name'];
    $proceed = 1;
    // print_r($_POST);
    foreach ($required as $key => $val) {
      if (empty($_POST[$val])) {
        $data =  ['field' => $val, 'msg' => 'Field Is Required'];
        $response['status'] = 201;
        $response['msg'] = "No Fields";
        $response['err'][] = $data;
        $proceed = 0;
      }
    }
    if ($proceed) {

      $id = $this->input->post('id');
      $fname = $this->input->post('first_name');
      $middle_name = $this->input->post('middle_name');
      $last_name = $this->input->post('last_name');
      $email = $this->input->post('email');
      $mobile_no = $this->input->post('mobile_no');
      $landline_no = $this->input->post('landline_no');
      $notes = $this->input->post('notes');
      $session_id = ($this->session->userdata('logged_session')['id']);
      if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $response['status'] = 201;
          $response['err'][] = ['field' => 'email', 'msg' => 'Please Enter Valid Email'];
          echo json_encode($response);
          exit;
        }
      }
      if (!empty($mobile_no)) {
        if (!preg_match('/^[0-9]{10}+$/', $mobile_no)) {
          $response['status'] = 201;
          $response['err'][] = ['field' => 'mobile_no', 'msg' => 'Please Enter Valid Mobile No'];
          echo json_encode($response);
          exit;
        }
      }
      if (!empty($landline_no)) {
        if ($this->validate_phone_number($landline_no) === false) {
          $response['status'] = 201;
          $response['err'][] = ['field' => 'landline_no', 'msg' => 'Please Enter Valid Landline No'];
          echo json_encode($response);
          exit;
        }
      }
      $type = "New";
      if (isset($id) && !empty($id)) {
        $type = "Update";
      }
      // print_r($type);
      $image_path = "";
      if (!empty($_FILES['user_image']['name'])) {

        $config['upload_path']          = './uploads/user_images/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 1500;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_image')) {
          $response = ['status' => 203, 'field' => 'user_image', 'msg' => $this->upload->display_errors()];
          echo json_encode($response);
          exit;
        } else {
          $path = $this->upload->data('file_name');
          $image_path = $path;
        }
      }
      // exit;
      if ($type == "New") {

        $this->db->insert('directory_info', array('first_name' => $fname, 'user_id' => $session_id, 'middle_name' => $middle_name, 'last_name' => $last_name, 'email' => $email, 'mobile_no' => $mobile_no, 'landline_no' => $landline_no, 'user_image_path' => $image_path, 'notes' => $notes, 'created_by' => $session_id));
      } else {
        // for image manipulation
        $existing_user = $this->DirectoryInfo_model->getDirectoryDataById($id);
        $image_path_existing = ($existing_user['user_image_path']);
        if (empty($image_path)) {
          $image_path_to_update = $image_path_existing;
        } else {
          $image_path_to_update = $image_path;
          if (!empty($image_path_existing)) {
            $path = FCPATH . 'uploads/user_images/';
            $file_name = $path . $image_path_existing;
            unlink($file_name);
          }
        }

        $this->db->where('id', $id);
        $this->db->update('directory_info', array('first_name' => $fname, 'middle_name' => $middle_name, 'last_name' => $last_name, 'email' => $email, 'mobile_no' => $mobile_no, 'landline_no' => $landline_no, 'user_image_path' => $image_path_to_update, 'notes' => $notes, 'updated_by' => $session_id));
      }
      // print_r($this->db->last_query());

      $disp_msg = "Data Added Sucessfully";
      if ($type != "New") {
        $disp_msg = "Data Updated Sucessfully";
      }
      if ($this->db->affected_rows() > 0) {
        $response = array('status' => 200, 'msg' => $disp_msg);
      } else {
        $response = array('status' => 200, 'msg' => $disp_msg);
      }
    }

    echo json_encode($response);
  }

  public function validate_phone_number($landline = '')
  {
    if (!preg_match("/^[0-9]{11}/", $landline)) {
      return false;
    } else {
      return true;
    }
  }
  public function deleteCandidateData($value = '')
  {
    $response = array('status' => 500, 'msg' => 'Some Internal Error');
    $id = $this->input->post('id');
    if (!empty($id)) {
      $session_id = ($this->session->userdata('logged_session')['id']);
      $this->db->where('id', $id);
      $this->db->update(
        'directory_info',
        array('is_deleted' => 1, 'updated_by' => $session_id),
      );
      $response = array('status' => 200, 'msg' => 'Data Deleted Sucessfully');
    }
    echo json_encode($response);
  }

  public function getViewDirectory()
  {
    if ($this->input->is_ajax_request()) {

      $id = $this->input->post('id');
      $directory_data = [];
      if (!empty($id)) {

        // $increasecount = $this->DirectoryInfo_model->increaseviewCount($id);
        $directory_data = $this->DirectoryInfo_model->getDirectoryDataById($id);
      }

      $data['directory_data'] = $directory_data;
      $this->load->view('user/user_view_modal', $data);
    }
  }



  public function getAllDirectoryInfoDatatable()
  {
    $request = $_REQUEST;
    // echo "<pre>";
    //     print_r($request);
    $start = $request['start'] ? (int) $request['start'] : (int) 0;
    $length = $request['length'] ? (int) $request['length'] : (int) 0;
    $searchFilter = array(
      'first_name' => array('type' => 'text', 'value' => isset($request['first_name']) ? $request['first_name'] : ''),
      'mobile_no' => array('type' => 'text', 'value' => isset($request['mobile_no']) ? $request['mobile_no'] : ''),
    );
    // print_r($searchFilter);
    // print_r($_REQUEST);
    $order = [];
    $orderBy = $request['order'] ? $request['order'] : array();
    if (!empty($orderBy)) {
      $columns = array('', 'first_name', 'middle_name', 'last_name', 'email', 'mobile_no', 'landline_no', '', '', 'created_at', '');


      $orderBy = $orderBy[0];
      $columnIndex = $orderBy['column'];

      if (array_key_exists($columnIndex, $columns)) {
        if (!empty($columns[$columnIndex])) {
          $column = $columns[$columnIndex];
          $order['order_by'] = $column;
          $order['order_type'] = $orderBy['dir'];
        } else {
          $order['order_by'] = 'created_at';
          $order['order_type'] = 'Asc';
        }
      } else {
        $order['order_by'] = 'created_at';
        $order['order_type'] = 'Asc';
      }
    }
    $user_id = ($this->session->userdata('logged_session')['id']);
    $rows = $this->DirectoryInfo_model->getAllDirecetoryInfoData($user_id, $searchFilter, array($start, $length), $order);
    // print_r($rows);
    $noOfRecords = count($rows);
    $data = array();
    if (count($rows)) {
      $count = 1;
      foreach ($rows as $row) {
        $created_at = date("d/m/Y", strtotime($row['created_at']));;

        $data[] = array(
          $count++,
          $row['first_name'],
          $row['middle_name'],
          $row['last_name'],
          $row['email'],
          $row['mobile_no'],
          $row['landline_no'],
          $row['user_image_path'],
          $row['notes'],
          $created_at,
          $row['id'],

        );
      }
    }
    $directory_info = array(
      'draw' => (int) $request['draw'] ? (int) $request['draw'] : (int) 0,
      'recordsTotal' => ($noOfRecords),
      'recordsFiltered' => ($noOfRecords),
      'data' => $data,
    );

    $directory_info = json_encode($directory_info);
    echo ($directory_info);
    // return  ($directory_info);
    // listing view page open kar 
  }

  public function getSearchViewDash()
  {
    $user_id = ($this->session->userdata('logged_session')['id']);
    $result = $this->DirectoryInfo_model->getSearchFormData($user_id);
    $first_name = array_column($result, 'first_name');
    $mobile_no = array_column($result, 'mobile_no');
    $this->load->view('user/search_form_dash', array('first_name' => $first_name, 'mobile_no' => $mobile_no));
  }
}
