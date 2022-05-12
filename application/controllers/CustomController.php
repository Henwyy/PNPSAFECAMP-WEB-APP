<?php
require_once(APPPATH . 'third_party/QRCodeGenerator.php');

class CustomController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    // $this->load->library('phpqrcode/qrlib');
    $this->load->helper('url');
  }

  public function index()
  {
    $this->load->view('welcome_message');
  }


  public function reportByCivilian()
  {
    // print("<pre>".print_r($this->input->post(),true)."</pre>");

    $table = 'report';
    $data = array(
      'report_type_id' => 1,
      'reported_by_id' => $this->session->userdata('user_id'),
      'reported_by_type_id' => $this->session->userdata('position_id'),
      'civilian_id' => $this->session->userdata('user_id'),
      'subject' => $this->input->post('subject'),
      'description' => $this->input->post('description')
    );
    $response = $this->Global_model->insert_data($table, $data);

    if ($response === "failed") {
      $data = array(
        'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
      );

      print("<pre>" . print_r($data, true) . "</pre>");
      print("<pre>" . print_r($response, true) . "</pre>");

      //redirect("make-report");
    }

    $res = $this->Global_model->get_data_with_query(
      'users',
      'user_id',
      ['position_id' => 1]
    );

    foreach ($res as $value) {
      $this->Global_model->insert_data('report_counter', [
        'user_id' => $value->user_id,
        'report_id' => $response,
      ]);
    }



    redirect("HomeController/reportSuccess");
  }

  public function insertPurpose($purpose) {
      $table = 'purpose';
      $data = array(
        'user_id' => $this->session->userdata('user_id'),
        'purpose' => $purpose
      );
      $response = $this->Global_model->insert_data($table, $data);

      if ($response === "failed") {
        $data = array(
          'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
        );

        print("<pre>" . print_r($data, true) . "</pre>");
        print("<pre>" . print_r($response, true) . "</pre>");

        //redirect("make-report");
      }
  }

  public function submitPurpose()
  {
    $purposes = '';

    $purpose = !empty($this->input->post('app_clearance')) ? 'Application for Clearance or License (One-Stop-Shop)' : '';

    if( !empty($purpose) ) {
      $this->insertPurpose($purpose);
    }

    $purpose = !empty($this->input->post('app_ptcfor')) ? 'Application for PTCFOR' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('drug_test')) ? 'Macro-etching/Drug Test Examination (Crime Lab)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('app_clearance_csg')) ? 'Application for Clearance or License (CSG/SOSIA/FEO Building)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('app_motor')) ? 'Application for Motor Vehicle Clearance (HPG)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('prbs')) ? 'Processing of Retirement Claims and Benefits (PRBS)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('medical')) ? 'Availing Medical Services or Visiting Patients in PNPGH and/or Dental Treatment at DOSC' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('facilities')) ? 'Availing of PNP Facilities (Sport Center, Multi-purpose Center, Chapel, Transformation Oval, etc)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('complaint')) ? 'Filing of Complaint (PNP Operating units such as CIDG, ACG, WCPC, IAS, PCADG, etc)' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('off_bus')) ? 'Official Business Meeting with PNP Personnel' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('visit')) ? 'Visiting PNP Personnel on personal purpose' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('seminar')) ? 'Attending training or seminar' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }

    $purpose = !empty($this->input->post('selling')) ? 'Selling Food and other Stuff' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }


  $purpose = !empty($this->input->post('others')) ? 'Selling Food and other Stuff' : '';

  if( !empty($purpose) ) {
    $this->insertPurpose($purpose);
  }


    redirect("HomeController/home");
  }

  public function register()
  {
    print("<pre>" . print_r($this->input->post(), true) . "</pre>");
    print("<pre>" . print_r($_FILES, true) . "</pre>");

    extract($_FILES['image_path']);
    if ($tmp_name != '') {
      $fname = strtotime(date('y-m-d H:i')) . '_' . $name;
      $move = move_uploaded_file($tmp_name, 'assets/uploads/' . $fname);
    }

    echo 'tmp name: ' . $tmp_name . '<br>';


    // TODO check if existing + form validation + form validation for password/confirm + email uniqueness

    $table = 'users';
    $email = $this->input->post('email');
    $data = array(
      'username' => $this->input->post('username'),
      'password' => sha1($this->input->post('password')),
      'position_id' => 2,
      'mobile_number' => $this->input->post('mobile_number'),
      'email' => $email
    );
    $response = $this->Global_model->insert_data($table, $data);

    if ($response === "failed") {
      $data = array(
        'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
      );

      print("<pre>" . print_r($data, true) . "</pre>");
      print("<pre>" . print_r($response, true) . "</pre>");

      //redirect("make-report");
    }



    // TODO add image picture
    $table = 'accounts';
    $data = array(
      'user_id' => $response,
      'first_name' =>  $this->input->post('fname'),
      'middle_name' =>  $this->input->post('mname'),
      'last_name' => $this->input->post('lname'),
      'qualifier' =>  $this->input->post('qualifier'),
      'gender' =>  $this->input->post('gender'),
      'birth_date' => $this->input->post('birth_date'),
      'complete_address' =>  $this->input->post('complete_address'),
      'city_code' =>  $this->padCodes($this->input->post('city')),
      'region_code' => $this->padCodes($this->input->post('region')),
      'province_code' => $this->padCodes($this->input->post('province')),
      'vehicle_type' =>  $this->input->post('vehicle_type'),
      'vehicle_plate_number' => $this->input->post('vehicle_plate_number'),
      'email_hash' => sha1($email),
      'identification_card' =>  $this->input->post('identification_card'),
      'identification_number' =>  $this->input->post('identification_number'),
      'image_path' => isset($move) && $move ? $fname : null
    );
    $response = $this->Global_model->insert_data($table, $data);

    if ($response === "failed") {
      $data = array(
        'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
      );

      print("<pre>" . print_r($data, true) . "</pre>");
      print("<pre>" . print_r($response, true) . "</pre>");

      //redirect("make-report");
    }

    $qrcodeGenerator = new QRCodeGenerator();
    $generated_filename = $qrcodeGenerator->generate(sha1($email));
    if (!$generated_filename) {
      $data = array(
        'server_errors' => "QR code generation Failed. Please contact your system administrator."
      );

      print("<pre>" . print_r($data, true) . "</pre>");
      print("<pre>" . print_r($response, true) . "</pre>");
    }

    $table = 'qr_codes';
    $data = array(
      'account_id' => $response,
      'qr_code_path' =>  $generated_filename,
    );
    $response = $this->Global_model->insert_data($table, $data);

    if ($response === "failed") {
      $data = array(
        'server_errors' => "Data insertion to database Failed. Please contact your system administrator."
      );

      print("<pre>" . print_r($data, true) . "</pre>");
      print("<pre>" . print_r($response, true) . "</pre>");

      //redirect("make-report");
    }



    // echo 'generated filename: ' . $generated_filename . '<br>';

    // echo"<center><img width='100' height='100' src=".base_url().'assets/qrcodeci/images/'.$generated_filename."></center>";

    redirect("HomeController/login");
  }

  private function padCodes($code)
  {
    while (strlen($code) < 9) {
      $code .= '0';
    }
    return $code;
  }

  public function getAllUsers()
  {
    $result = $this->Custom_model->get_all_users();
    print_r(json_encode($result));
  }


  public function getViewingTimeLogs()
  {
    $result = $this->Custom_model->get_viewing_time_logs();
    print_r(json_encode($result));
  }

  public function  getViewingBuildingTimeLogs()
  {
    $building_id = $this->input->get('building_id');
    $result = $this->Custom_model->get_viewing_building_time_logs($building_id);
    print_r(json_encode($result));
  }

  public function getAllAccounts()
  {
    $result = $this->Custom_model->get_all_accounts();
    print_r(json_encode($result));
  }

  public function getViewReports()
  {
    $result = $this->Custom_model->get_all_reports();
    // echo 'last query: ' . $this->db->last_query();
    print_r(json_encode($result));
  }

  public function getVisitorCounts()
  {
    $result = $this->Custom_model->get_all_visitors_for_today();
    print_r(json_encode($result));
  }

  public function getVisitorCountsForBuilding()
  {
    $building_id = $this->input->get('building_id');
    $result = $this->Custom_model->get_visitor_count_for_building($building_id);
    print_r(json_encode($result));
  }

  public function deleteUser()
  {
    $table = "accounts";
    $field = "user_id";
    $where = $this->input->post("user_id");
    $result = $this->Global_model->delete_data($table, $field, $where);

    $table = "users";
    $field = "user_id";
    $where = $this->input->post("user_id");
    $result = $this->Global_model->delete_data($table, $field, $where);

    print_r(json_encode($result));
  }


  public function validatePassword()
  {
    $password = $_POST['password'];
    $isExist = $this->Global_model->get_data_with_query('users', 'id', 'password ="' . sha1($password) . '" AND username = "' . $this->session->userdata('username') . '"');
    if (count($isExist) > 0) {
      $status = 'success';
    } else {
      $status = 'error';
    }
    echo json_encode(array('status' => $status));
  }

  public function getNewPassword()
  {
    $length = 6;
    $data['password'] = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

    print_r(json_encode($data));
  }

  public function addAccount()
  {
    $table = 'users';
    $data = array(
      'username' => $this->input->post('username'),
      'password' => sha1($this->input->post('password')),
      'position_id' => $this->input->post('position'),
      'college_id' => $this->input->post('college')
    );
    $response = $this->Global_model->insert_data($table, $data);
    print_r(json_encode($response));
  }


  public function updatePassword()
  {
    $user_id = $this->session->userdata('user_id');
    $current_password = $this->input->post('current_password');
    $new_password = $this->input->post('new_password');
    $confirm_new_password = $this->input->post('confirm_new_password');
    $user = $this->Global_model->get_data_with_query('users', 'password', 'user_id =' . $user_id);
    if ($new_password == $confirm_new_password) {
      if (sha1($current_password) == $user[0]->password) {
        $table = 'users';
        $data = array('password' => sha1($confirm_new_password));
        $field = 'user_id';
        $where = $user_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);
        $result['message'] = "Password Successfully Changed";
        $result['status'] = "success";
      } else {
        $result['message'] = "Invalid Password";
        $result['status'] = "error";
      }
    } else {
      $result['message'] = "New password and confirm password does not match";
      $result['status'] = "error";
    }

    print_r(json_encode($result));
  }
  public function reports_trigger_done($id)
  {
    $this->Global_model->update_data('report', array('is_done' => 1), 'report_id', $id);

    redirect($_SERVER['HTTP_REFERER']);
  }

  public function reports_counter()
  {
    $res = $this->Custom_model->get_user_report_counter();

    $counter = [
      'count' => count($res)
    ];

    print_r(json_encode($counter));
  }

  public function getTotals() {
    $date = $this->input->get('date') ? $this->input->get('date') : date('Y-m-d H:i:s');
    $entry_walk_in = $this->Global_model->get_count("time_logs", "COUNT(*) AS total", 
      "accounts.vehicle_type = 'N/A' AND DATE(time_logs.entry_time) = DATE('" . $date . "') AND building_id = 1", 
      "accounts", "time_logs.account_id = accounts.account_id");

    $entry_vehicle = $this->Global_model->get_count("time_logs", "COUNT(*) AS total", 
      "accounts.vehicle_type <> 'N/A' AND DATE(time_logs.entry_time) = DATE('" . $date . "') AND building_id = 1", 
      "accounts", "time_logs.account_id = accounts.account_id");

    $exit_walk_in = $this->Global_model->get_count("time_logs", "COUNT(*) AS total", 
      "accounts.vehicle_type = 'N/A' AND DATE(time_logs.exit_time) = DATE('" . $date . "') AND building_id = 1", 
      "accounts", "time_logs.account_id = accounts.account_id");


    $exit_vehicle = $this->Global_model->get_count("time_logs", "COUNT(*) AS total", 
      "accounts.vehicle_type <> 'N/A' AND DATE(time_logs.exit_time) = DATE('" . $date . "') AND building_id = 1", 
      "accounts", "time_logs.account_id = accounts.account_id");

    $active_reports = $this->Global_model->get_data_with_query("report", "COUNT(*) AS total", "DATE(report.date_reported) = DATE('" . $date . "') AND is_done = 0" );

    $resolved_reports = $this->Global_model->get_data_with_query("report", "COUNT(*) AS total", "DATE(report.date_reported) = DATE('" . $date . "') AND is_done = 1" );

    $registered_users = $this->Global_model->get_all_data("accounts", "COUNT(*) AS total" );


    $officers = $this->Global_model->get_all_data("officers", "COUNT(*) AS total" );

    // echo $this->db->last_query();

    print_r(json_encode(array( 'entry_walk_in' => $entry_walk_in[0]->total, 'entry_vehicle' => $entry_vehicle[0]->total,
                              'exit_walk_in' => $exit_walk_in[0]->total, 'exit_vehicle' => $exit_vehicle[0]->total,
                              'active_reports' => $active_reports[0]->total, 'resolved_reports' => $resolved_reports[0]->total,
                              'registered_users' => $registered_users[0]->total, 'officers' => $officers[0]->total )));
  }

  public function rankPurposes() {
    $date = $this->input->get('date') ? $this->input->get('date') : date('Y-m-d');
    $result = $this->Custom_model->rank_purposes($date);
    // echo $this->db->last_query();
    print_r(json_encode($result));
  }

  public function getMostVisitedBuildings() {
      $date = $this->input->get('date') ? $this->input->get('date') : date('Y-m-d');
      $result = $this->Custom_model->get_most_visited_buildings($date);
      // echo $this->db->last_query();
      print_r(json_encode($result));
  }
}
