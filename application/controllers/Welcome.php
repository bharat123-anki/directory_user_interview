<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
  }
  public function index()
  {
    $this->load->view('login/login');
  }
  public function checkUserInfo()
  {

    if ($this->input->is_ajax_request()) {
      $response = array('status' => 500, 'msg' => 'Some Internal Error');
      $email =  $this->input->post('email');
      $password =  $this->input->post('password');
      $required = ['email', 'password'];
      // print_r($_POST);
      $proceed = 1;
      foreach ($required as $key => $val) {
        if (empty($_POST[$val])) {
          $data =  ['field' => $val, 'msg' => 'Field Is Required'];
          $response['status'] = 201;
          $response['msg'] = "No Fields";
          $response['err'][] = $data;
          $proceed = 0;
          // exit;
        }
      }
      if ($proceed) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $response = array('status' => 202, 'msg' => 'Invalid Email');
        } else {
          $this->load->model('User_model');
          $return_query = $this->User_model->checkEmailAndPassword($email, $password);
          if (empty($return_query)) {
            $response = array('status' => 203, 'msg' => 'Invalid User');
          } else {
            $this->session->set_userdata('logged_session', $return_query);
            $response = array('status' => 200, 'msg' => 'Success  You Will Redirect Shortly', 'data' => $return_query);
          }
        }
      }

      echo json_encode($response);
    }
  }

  public function logout($value = '')
  {
    $this->session->unset_userdata('logged_session');
    $this->load->view('login/login');
  }
}
