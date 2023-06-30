<?php

function __login()
{
  $session = session();
  $user_id = $session->get('session_user_id');
  if (empty($user_id) || !isset($user_id)) {
    header("Location: " . base_url() . "login");
    die;
  }
}

function __permission($position = "1")
{
  $session = session();
  $arr_position = explode(",", $position);
  if (!in_array($session->get('session_user_position'), $arr_position)) {
    $positionModel = new \App\Models\PositionModel();
    $arr_position_db = $positionModel->getAll_Position();

    foreach ($arr_position as $p_id) {
      $arr_position_name[$p_id] = $arr_position_db[$p_id]['P_NAME'];
    }
    
    $session->setFlashdata('swel_title', 'ไม่สามารถเข้าถึงหน้านี้ได้');
    $session->setFlashdata('swel_text', 'คุณจำเป็นต้องได้รับสิทธิในการเข้าถึง สิทธิการเข้าถึงต้องเป็น ' . implode(", ", $arr_position_name) . ' เท่านั้น!');
    $session->setFlashdata('swel_icon', 'error');
    $session->setFlashdata('swel_button', 'รับทราบ');
    header("Location: " . base_url());
    die;
  }
}

function __full_name_byId($user_id = "") {
  $user_name = "";
  if (!empty($user_id)) {
    $userModel = new \App\Models\UsersModel();
    $user_data = $userModel->get_user_data($user_id);
    if (!empty($user_data->FIRSTNAME)) {
      $user_name = $user_data->FIRSTNAME . " " . $user_data->LASTNAME;
    }
  }
  return $user_name;
}

function __room_name_byId($room_id = "") {
  $room_name = "";
  if (!empty($room_id)) {
    $roomModel = new \App\Models\RoomsModel();
    $room_data = $roomModel->get_room_data($room_id);
    if (!empty($room_data->R_NAME)) {
      $room_name = $room_data->R_NAME;
    }
  }
  return $room_name;
}

function __month()
{
  return array(
    '1' => 'มกราคม',
    '2' => 'กุมภาพันธ์',
    '3' => 'มีนาคม',
    '4' => 'เมษายน',
    '5' => 'พฤษภาคม',
    '6' => 'มิถุนายน',
    '7' => 'กรกฎาคม',
    '8' => 'สิงหาคม',
    '9' => 'กันยายน',
    '10' => 'ตุลาคม',
    '11' => 'พฤศจิกายน',
    '12' => 'ธันวาคม'
  );
}

function __url_encode($text)
{
  return base64_encode($text);
}

function __url_decode($path_data)
{
  return base64_decode($path_data);
}

function __swal_error($text = "", $redirect_to = "")
{
  $session = session();
  $session->setFlashdata('swel_title', 'Oops...');
  $session->setFlashdata('swel_text', $text);
  $session->setFlashdata('swel_icon', 'error');
  $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
  if (!empty($redirect_to)) {
    header("Location: " . $redirect_to);
  } else {
    echo '<script>window.history.back();</script>';
  }
  die;
}

function __swal_success($title = "สำเร็จ", $text = "", $button_text = "ดำเนินการต่อ", $redirect_to = "")
{
  $session = session();
  $session->setFlashdata('swel_title', $title);
  $session->setFlashdata('swel_icon', 'success');
  $session->setFlashdata('swel_text', $text);
  $session->setFlashdata('swel_button', $button_text);
  if (!empty($redirect_to)) {
    header("Location: " . $redirect_to);
  } else {
    header("Location: " . base_url());
  }
  die;
}

function __user_id()
{
  $session = session();
  return $session->get('session_user_id');
}

function __position_id()
{
  $session = session();
  return $session->get('session_user_position');
}

function __random_code($type = "alnum", $length = "1")
{
  if ($type == "alnum") {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  } else if ($type == "numeric") {
    $characters = '0123456789';
  }
  $code = '';
  for ($i = 0; $i < $length; $i++) {
    $code .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $code;
}

function __format_date($date = "") {
  if (!empty($date)) {
    return date('j', strtotime($date)) . " " . __month()[date('n', strtotime($date))] . " " . (date('Y', strtotime($date)) + 543);
  } else {
    return "";
  }
}

function __format_datetime($datetime = "") {
  if (!empty($datetime)) {
    return date('j', strtotime($datetime)) . " " . __month()[date('n', strtotime($datetime))] . " " . (date('Y', strtotime($datetime)) + 543) . " " . date('H:i:s', strtotime($datetime));
  } else {
    return "";
  }
}

function __booking_status_name($status = "") {
  $status_name = "";
  if ($status == "WAITING") {
    $status_name = "รออนุมัติ";
  } else if ($status == "APPROVED") {
    $status_name = "อนุมัติ";
  } else if ($status == "CANCELED") {
    $status_name = "ยกเลิก";
  }
  return $status_name;
}

function __booking_time_name($time = "") {
  $time_name = "";
  if ($time == "MORNING") {
    $time_name = "9.00 - 12.00 น.";
  } else if ($time == "AFTERNOON") {
    $time_name = "13.00 - 16.00 น.";
  } else if ($time == "FULLDATE") {
    $time_name = "9.00 - 16.00 น.";
  }
  return $time_name;
}