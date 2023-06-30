<?php

namespace App\Controllers;


class Admin extends Main
{
  public function dashboard()
  {
    __login();
    __permission(4);
    return view('admin/dashboard');
  }

  public function wrapper()
  {
    return view('admin/wrapper');
  }

  public function user_management()
  {
    __login();
    __permission(4);
    $userModel = $this->UserModel();
    $alluser = $userModel->get_all_user();
    $data_sending = [
      'alluser' => $alluser
    ];


    return view('admin/user_management', $data_sending);
  }

  public function meeting_room_management()
  {
    __login();
    __permission(4);

    $roomsModel = $this->RoomsModel();
    $allrooms = $roomsModel->getAll_rooms();
    $data_sending = [
      'allrooms' => $allrooms
    ];

    return view('admin/meeting_room_management', $data_sending);
  }

  public function room_detail()
  {
    __login();
    __permission(4);
    return view('admin/room_detail');
  }

  public function chek_report()
  {
    __login();
    __permission(4);
    return view('admin/chek_report');
  }

  public function user_status_management()
  {
    __login();
    __permission(4);
    return view('admin/user_status_management');
  }

  public function addroom()
  {
    __login();
    __permission(4);
    return view('admin/addroom');
  }

  public function editroom()
  {
    __login();
    __permission(4);
    return view('admin/editroom');
  }

  public function edit_user($user_id = "")
  {
    __login();
    __permission(4);

    $data_sending = array();
    $userModel = $this->UserModel();
    $user_data = $userModel->get_user_data($user_id);
    $positionModel = $this->PositionModel();
    $position_data = $positionModel->getAll_Position();

    if (!empty($user_data)) {
      $data_sending = [
        'user_data' => $user_data,
        'position_data' => $position_data
      ];
    } else {
      __swal_error("โปรดระบุรหัสของผู้ใช้ เพื่อทำการแก้ไขข้อมูล", base_url('admin/user_management'));
    }

    return view('admin/edit_user', $data_sending);
  }

  public function update_user()
  {
    $user_id = $this->request->getVar('user_id');
    $firstname = $this->request->getVar('firstname');
    $lastname = $this->request->getVar('lastname');
    $phone = $this->request->getVar('phone');
    $user_position = $this->request->getVar('user_position');
    $user_status = $this->request->getVar('user_status');

    if (!empty($user_id)) {
      $update_data = [
        'FIRSTNAME' => $firstname,
        'LASTNAME' => $lastname,
        'PHONE' => $phone,
        'USER_POSITION' => $user_position,
        'USER_ACTIVE' => $user_status
      ];

      $userModel = $this->UserModel();
      $update_result = $userModel->update_user_detail($user_id, $update_data);
      if ($update_result['success'] == true) {
        __swal_success($update_result['message'], "การแก้ไขถูกบันทึกเรียบร้อยแล้ว", "ตกลง", base_url('admin/user_management'));
      } else {
        __swal_error($update_result['message'], base_url('admin/edit_user/' . $user_id));
      }
    } else {
      __swal_error("ไม่พบข้อมูลรหัสของผู้ใช้", base_url('admin/user_management'));
    }
  }

  public function manage_reservation()
  {
    __login();
    __permission(4);
    $bookingModel = $this->BookingModel();
    $allbooking = $bookingModel->get_all_booking();
    $data_sending = [
      'allbooking' => $allbooking
    ];
    return view('admin/manage_reservation', $data_sending);
  }

  public function booking_detail($b_id = "")
  {
    __login();
    __permission(4);

    if (!empty($b_id)) {
      $bookingModel = $this->BookingModel();
      $booking_data = $bookingModel->get_booking_byId($b_id);
      if ($booking_data['success'] == true) {
        $data_sending = [
          'booking_data' => $booking_data['result']
        ];
        return view('admin/booking_detail', $data_sending);
      } else {
        __swal_error($booking_data['message'], base_url('admin/manage_reservation'));
      }
    } else {
      __swal_error("ไม่พบข้อมูลรหัสการจองใดๆ", base_url('admin/manage_reservation'));
    }
  }

  public function update_booking_status()
  {
    __login();
    __permission('2,3,4');

    $b_id = $this->request->getVar('b_id');
    $status = $this->request->getVar('status');
    $emp_remarks = $this->request->getVar('emp_remarks');

    if (empty($b_id)) {
      __swal_error("กรุณาระบุรหัสการจอง", base_url('admin/manage_reservation'));
    } else if (empty($status)) {
      __swal_error("กรุณาระบุสถานะการจอง", base_url('admin/booking_detial/' . $b_id));
    } else {
      $bookingModel = $this->BookingModel();
      $update_status = array();
      $update_status = $bookingModel->update_booking_status($b_id, $status, $emp_remarks);
      if ($update_status['success'] == true) {
        // optional to add notification
        if ($status == "APPROVED" || $status == "CANCELED") {
          $booking_data = $bookingModel->get_booking_byId($b_id);
          if ($booking_data['success'] == true) {
            $notificationModel = $this->NotificationModel();
            if ($status == "APPROVED") {
              $send_noti = $notificationModel->new_notification($booking_data['result']->B_USER_ID, "การจองของคุณได้รับการอนุมัติเรียบร้อยแล้ว" . (!empty($booking_data['result']->EMP_REMARKS) ? " หมายเหตุ " . $booking_data['result']->EMP_REMARKS : ""));
            } else {
              $send_noti = $notificationModel->new_notification($booking_data['result']->B_USER_ID, "การจองของคุณถูกยกเลิก" . (!empty($booking_data['result']->EMP_REMARKS) ? " เนื่องจาก " . $booking_data['result']->EMP_REMARKS : ""));
            }
            if ($send_noti['success'] == true) {
              return __swal_success("สำเร็จ", "อัพเดตสถานะการจอง และแจ้งเตือนไปยังผู้ใช้เรียบร้อยแล้ว", "รับทราบ", base_url('admin/manage_reservation'));
            } else {
              __swal_error($send_noti['message'], base_url('admin/booking_detail/' . $b_id));
            }
          } else {
            __swal_error($booking_data['message'], base_url('admin/booking_detail/' . $b_id));
          }
        } else {
          return __swal_success("สำเร็จ", "อัพเดตสถานะการจองเรียบร้อยแล้ว", "รับทราบ", base_url('admin/manage_reservation'));
        }
      } else {
        __swal_error($update_status['message'], base_url('admin/booking_detial/' . $b_id));
      }
    }
  }

  public function create_room()
  {
      __login();
      __permission(4);

      $R_ID = $this->request->getVar('r_name');
      $R_TYPE = $this->request->getVar('chair');
      $remarks = $this->request->getVar('remarks');
      $date = $this->request->getVar('date');
      $time = $this->request->getVar('time');

  }
}
