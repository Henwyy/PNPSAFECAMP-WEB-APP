<?php
date_default_timezone_set('Asia/Taipei');

class Custom_model extends CI_Model
{

  public function get_all_users()
  {
    $this->db->select("*");
    $this->db->from("users");
    $this->db->where("users.position_id = ", 2);
    $q = $this->db->get();
    return $q->result();
  }

  public function get_user_report_counter()
  {
    $this->db->select("*");
    $this->db->from("report_counter");
    $this->db->where([
      'user_id' => $this->session->userdata('user_id'),
      'is_viewed' => 0,
    ]);

    $q = $this->db->get();
    return $q->result();
  }

  public function get_all_accounts()
  {
    $this->db->select("accounts.account_id, accounts.first_name, accounts.middle_name, accounts.last_name, accounts.qualifier, accounts.birth_date, CONCAT(accounts.complete_address, ', ', (SELECT psgc.name from psgc where psgc.code = accounts.city_code), ', ', (SELECT psgc.name from psgc where psgc.code = accounts.region_code), ', ', (SELECT psgc.name from psgc where psgc.code = accounts.province_code)) AS complete_address, accounts.vehicle_type, accounts.vehicle_plate_number, accounts.identification_card, accounts.identification_number");
    $this->db->from("users");
    $this->db->join("accounts", "accounts.user_id = users.user_id");
    $this->db->where("users.position_id = ", 2);
    $q = $this->db->get();
    return $q->result();
  }

  public function get_user_account($user_id)
  {
    $this->db->select("accounts.account_id, accounts.first_name, accounts.middle_name, accounts.last_name, accounts.qualifier, accounts.birth_date, accounts.complete_address, (SELECT psgc.name from psgc where psgc.code = accounts.city_code) AS city, (SELECT psgc.name from psgc where psgc.code = accounts.region_code) AS region, (SELECT psgc.name from psgc where psgc.code = accounts.province_code) AS province, accounts.gender, accounts.vehicle_type, accounts.vehicle_plate_number, accounts.identification_card, accounts.image_path, users.username, users.mobile_number, users.email, accounts.identification_number");
    $this->db->from("users");
    $this->db->join("accounts", "accounts.user_id = users.user_id");
    $this->db->where("users.user_id = ", $user_id);
    $q = $this->db->get();

    if ($q->num_rows() > 0) {
      $row = $q->row();
      return $row;
    }

    return null;
  }



  public function get_all_reports()
  {
    $this->db->select("report.report_id, report.civilian_id, report.subject, report.description, report.date_reported, report_type.report_type, user_position.name, report.is_done ");
    $this->db->from("report");
    $this->db->join("report_type", "report.report_type_id = report_type.report_type_id");
    $this->db->join("user_position", "report.reported_by_type_id = user_position.position_id");
    $q = $this->db->get();
    return $q->result();
  }

  public function get_qr_code($account_id)
  {
    $this->db->select("*");
    $this->db->from("qr_codes");
    $this->db->where("qr_codes.account_id = ", $account_id);
    $q = $this->db->get();

    if ($q->num_rows() > 0) {
      $row = $q->row();
      return $row;
    }

    return null;
  }

  public function get_user_account_info($user_id)
  {
    $this->db->select("users.user_id, accounts.account_id, users.username, users.email, users.position_id ");
    $this->db->from("accounts");
    $this->db->join("users", "accounts.user_id = users.user_id");
    $this->db->where("users.user_id = ", $user_id);
    $q = $this->db->get();
    return $q->result();
  }

  public function get_time_logs($account_id)
  {
    $this->db->select("*");
    $this->db->from("time_logs");
    $this->db->where("account_id = ", $account_id);
    $this->db->where("exit_time IS NULL");
    $this->db->where("building_id <> 1");
    $this->db->where("DATE(entry_time) = DATE(now())");
    $this->db->order_by("entry_time", "desc");
    $q = $this->db->get();

    if ($q->num_rows() > 0) {
      $row = $q->row();
      return $row;
    }

    return null;
  }

  public function get_time_logs_for_main_gate($account_id)
  {
    $this->db->select("*");
    $this->db->from("time_logs");
    $this->db->where("account_id = ", $account_id);
    $this->db->where("exit_time IS NULL");
    $this->db->where("building_id = 1");
    $this->db->where("DATE(entry_time) = DATE(now())");
    $this->db->order_by("entry_time", "desc");
    $q = $this->db->get();

    if ($q->num_rows() > 0) {
      $row = $q->row();
      return $row;
    }

    return null;
  }


  public function get_viewing_time_logs()
  {
    $this->db->select("accounts.account_id, accounts.first_name, accounts.last_name, accounts.vehicle_type, accounts.vehicle_plate_number, time_logs.entry_time, time_logs.exit_time, buildings.building_name, purpose.purpose");
    $this->db->from("accounts");
    $this->db->join("time_logs", "accounts.account_id = time_logs.account_id");
    $this->db->join("buildings", "buildings.building_id = time_logs.building_id");
    $this->db->join("users", "users.user_id = accounts.user_id");
    $this->db->join("purpose", "purpose.user_id = users.user_id");
    $this->db->where("DATE(time_logs.entry_time) = DATE(purpose.date_created)");
    $q = $this->db->get();
    return $q->result();
  }

  public function get_purpose_at_current_date($user_id)
  {
    $this->db->select("*");
    $this->db->from("purpose");
    $this->db->where("user_id = ", $user_id);
    $this->db->where("DATE(date_created) = DATE(now())");
    $q = $this->db->get();
    return $q->result();
  }

  public function get_viewing_building_time_logs($building_id)
  {
    $this->db->select("accounts.account_id, accounts.first_name, accounts.last_name, accounts.vehicle_type, accounts.vehicle_plate_number, time_logs.entry_time, time_logs.exit_time, buildings.building_name");
    $this->db->from("accounts");
    $this->db->join("time_logs", "accounts.account_id = time_logs.account_id");
    $this->db->join("buildings", "buildings.building_id = time_logs.building_id");
    $this->db->where("buildings.building_id = ", $building_id);
    $q = $this->db->get();
    return $q->result();
  }

  // 		Select time_logs.building_id, count(*) as visitor_count from time_logs
  // WHERE date(time_logs.entry_time) = date(now())
  // group by time_logs.building_id;

  public function get_all_visitors_for_today()
  {
    $q = $this->db->query("Select buildings.building_id, buildings.building_name, officers.username, d.visitor_count from buildings
									LEFT join officers ON officers.assigned_building = buildings.building_id
									left join (Select time_logs.building_id, count(*) as visitor_count from time_logs WHERE date(time_logs.entry_time) = date(now()) group by time_logs.building_id) as d ON d.building_id = buildings.building_id");
    return $q->result();
  }

  public function get_visitor_count_for_building($building_id)
  {
    $q = $this->db->query("Select buildings.building_id, buildings.building_name, officers.username, d.visitor_count from buildings
									LEFT join officers ON officers.assigned_building = buildings.building_id
									left join (Select time_logs.building_id, count(*) as visitor_count from time_logs WHERE date(time_logs.entry_time) = date(now()) group by time_logs.building_id) as d ON d.building_id = buildings.building_id WHERE buildings.building_id = " . $building_id);
    return $q->result();
  }

  public function rank_purposes($date) {
    $this->db->select("purpose.purpose, COUNT(purpose.purpose) AS total");
    $this->db->from("purpose");
    $this->db->where("DATE(purpose.date_created) = ", $date);
    $this->db->group_by("purpose.purpose");
    $this->db->order_by("total", "desc");
    $q = $this->db->get();
    return $q->result();
  }

  public function get_most_visited_buildings($date) {
     $this->db->select("buildings.building_id, buildings.building_name, COUNT(buildings.building_id) AS total");
    $this->db->from("time_logs");
    $this->db->join("buildings", "buildings.building_id = time_logs.building_id");
    $this->db->where("DATE(time_logs.entry_time) = ", $date);
    $this->db->group_by("buildings.building_id");
    $this->db->group_by("buildings.building_name");
    $this->db->order_by("total", "desc");
    $this->db->order_by("building_name", "asc");
    $q = $this->db->get();
    return $q->result();
  }
}
