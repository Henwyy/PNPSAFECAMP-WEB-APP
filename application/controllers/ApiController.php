<?php

class ApiController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  // index.php/ThirdPartyController/index
  function index()
  {
  }

  function getUserData()
  {
    $email_hash = $this->input->get('qrCodeString');
    $result = $this->Global_model->get_data_with_where_query("accounts", "*", "accounts.email_hash", $email_hash);
    print_r(json_encode($result));
  }

  public function validateOfficerLogin()
  {
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    $login = $this->Global_model->get_data_with_query('officers', '*', 'username ="' . $username . '" AND password="' . $password . '"');

    if (count($login) > 0) {
      // $user_info = $this->Global_model->get_data_with_query('users', '*', 'user_id ="' . $login[0]->user_id . '"');
      // $this->session->set_userdata((array) ($login[0]));
      echo json_encode(array('success' => true,  'building' => $login[0]->assigned_building));
    } else {
      echo json_encode(array('success' => false, 'building' => 0));
    }
  }

  public function addIncidentReport()
  {
    // print("<pre>".print_r($this->input->post(),true)."</pre>");

    $table = 'report';
    $data = array(
      'report_type_id' => 2, // incident
      'reported_by_id' => 1, // ??? any
      'reported_by_type_id' => 1, // admin/pnp officer
      'subject' => $this->input->post('subject'),
      'description' => $this->input->post('description')
    );
    $response = $this->Global_model->insert_data($table, $data);
    $errors = '';
    $success = true;

    if ($response === "failed") {
      $errors = "Insert incident report Failed";
      $success = false;
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

    echo json_encode(array('success' => $success, 'errors' => $errors));
  }


  public function addCivilianReport()
  {
    // print("<pre>".print_r($this->input->post(),true)."</pre>");

    $table = 'report';
    $data = array(
      'report_type_id' => 1, // civilian
      'reported_by_id' => 1, // ??? any
      'reported_by_type_id' => 1, // admin/pnp officer
      'civilian_id' => (int)$this->input->post('civilian_id'),
      'subject' => $this->input->post('subject'),
      'description' => $this->input->post('description')
    );
    $response = $this->Global_model->insert_data($table, $data);
    $errors = '';
    $success = true;

    if ($response === "failed") {
      $errors = "Insert civilian report Failed";
      $success = false;
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

    echo json_encode(array('success' => $success, 'errors' => $errors));
  }

  function insertTime()
  {
    $account_id = $this->input->post('account_id');
    $current_datetime = date('Y-m-d h:i:s');
    $table = 'time_logs';
    $errors = '';
    $success = true;
    $building_id = (int)$this->input->post('building');

    $has_time = $this->Custom_model->get_time_logs($account_id);

    // echo 'last query: ' . $this->db->last_query() . "<br>";
    // print("<pre>".print_r($has_time,true)."</pre>");

    if ($has_time) {

      if ($has_time->building_id != $building_id) {
        $errors = "User has not exited from a previous building yet! ";
      } else {
        // Add exit time
        $data = array('exit_time' => $current_datetime);
        $field = 'time_id';
        $where = $has_time->time_id;
        $response = $this->Global_model->update_data($table, $data, $field, $where);

        if ($response === "failed") {
          $errors = "Update logs Failed";
        }
      }
    } else {
      $data = array(
        'account_id' => $account_id,
        'building_id' => $building_id,
        'entry_time' => $current_datetime,
      );
      $logs_insert = $this->Global_model->insert_data($table, $data);

      if ($logs_insert === "failed") {
        $errors = "Insert logs Failed";
      }
    }

    if ($errors) {
      $success = false;
    }

    echo json_encode(array('success' => $success, 'time' => $current_datetime, 'errors' => $errors));
  }

  function insertTimeForMainGate()
  {
    $account_id = $this->input->post('account_id');
    $current_datetime = date('Y-m-d h:i:s');
    $table = 'time_logs';
    $errors = '';
    $success = true;

    $has_time = $this->Custom_model->get_time_logs_for_main_gate($account_id);
    if ($has_time) {

      // Add exit time
      $data = array('exit_time' => $current_datetime);
      $field = 'time_id';
      $where = $has_time->time_id;
      $response = $this->Global_model->update_data($table, $data, $field, $where);

      if ($response === "failed") {
        $errors = "Update logs Failed";
      }
    } else {
      $data = array(
        'account_id' => $account_id,
        'building_id' => 1,
        'entry_time' => $current_datetime,
      );
      $logs_insert = $this->Global_model->insert_data($table, $data);

      if ($logs_insert === "failed") {
        $errors = "Insert logs Failed";
      }
    }

    if ($errors) {
      $success = false;
    }

    echo json_encode(array('success' => $success, 'time' => $current_datetime, 'errors' => $errors));
  }
}
