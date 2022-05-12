<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeController extends CI_Controller
{

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
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

    $this->checkSession();
  }

  function checkSession()
  {

    // if($this->uri->segment(1)!='login'){
    // 	if ($this->session->userdata('user_id')=='') {
    // 		header('Location: '.base_url("login"));
    // 	}
    // } else {
    // 	if($this->session->userdata('user_id')!=''){
    // 		header('Location: '.base_url("home"));
    // 	}
    // }
  }

  public function index()
  {
    $this->load->view('pages/index');
  }

  public function login()
  {
    $this->load->view('pages/login');
  }

  public function signUp()
  {
    $this->load->view('pages/sign_up_page');
  }

  public function home()
  {
    $data['view'] =  "home";
    $account_id = $this->session->userdata('account_id');

    $data['result'] = $this->Custom_model->get_qr_code($account_id);
    $data['head'] = array(
      "title"         =>  "Home | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);

    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function purpose()
  {
    $this->load->view('pages/purpose');
  }

  public function report()
  {

    $data['view'] =  "report";
    $data['head'] = array(
      "title"         =>  "Report | PNP QR Code System",
    );

    $this->load->view('layouts/template', $data);

    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function viewReports()
  {
    $data['view'] =  "view-report";
    $data['head'] = array(
      "title"         =>  "View Reports | PNP QR Code System",
    );

    // ---- DITO MAG UPDATE 
    $this->Global_model->update_data('report_counter', [
      'is_viewed' => '1'
    ], 'user_id', $this->session->userdata('user_id'));

    $this->load->view('layouts/template', $data);
    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function viewProfile($user_id)
  {

    $data['result'] = $this->Custom_model->get_user_account($user_id);
    $data['view'] =  'view_profile';
    $data['head'] = array(
      "title"         =>  "View Profile | PNP QR Code System",
    );

    if (empty($data['result'])) {
      $data['errors'] = "Data record not existing in database.";
    }

    $this->load->view('layouts/template', $data);
  }

  public function viewBuildings($building_id)
  {

    $data['result'] = $this->Global_model->get_data_with_query("buildings", "building_id, building_name", "building_id = " . $building_id);
    $data['view'] =  'view_buildings';
    $data['head'] = array(
      "title"         =>  "View Buildings | PNP QR Code System",
    );

    if (empty($data['result'])) {
      $data['errors'] = "Data record not existing in database.";
    }

    $this->load->view('layouts/template', $data);
  }

  public function reportSuccess()
  {
    $data['view'] =  "success_report";
    $data['head'] = array(
      "title"         =>  "Report Submitted | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);

    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function visitorCounts()
  {
    $data['view'] =  "visitor_counts";
    $data['head'] = array(
      "title"         =>  "Visitor Counts | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);

    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function adminHome()
  {
    $data['view'] =  "admin-home";
    $data['head'] = array(
      "title"         =>  "Admin Home | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);

    // print("<pre>".print_r($data['result'],true)."</pre>");
  }

  public function manageAccounts()
  {
    $data['view'] =  "account-management";
    $data['head'] = array(
      "title"         =>  "Account Management | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);
  }


  public function viewTimeLogs()
  {
    $data['view'] =  "time-logs";
    $data['head'] = array(
      "title"         =>  "Time Logs | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);
  }

  public function registration()
  {
    $data['view'] =  "registration";
    $data['head'] = array(
      "title"         =>  "Registration | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);
  }

  public function changePassword()
  {
    $data['view'] =  'change-password';
    $data['head'] = array(
      "title"         =>  "Change Password | PNP QR Code System",
    );
    $this->load->view('layouts/template', $data);
  }



  public function logout()
  {
    $this->session->sess_destroy();
    header('Location: ' . base_url());
  }
}
