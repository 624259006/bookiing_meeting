<?php

namespace App\Controllers;

class Booking extends Main
{
  public function index()
  {
    __login();
    $data_sending = [
      'active' => 'booking'
    ];
    return view('booking/index', $data_sending);
  }

  public function get_active_booking()
  {
    $bookingModel = $this->BookingModel();
    $data = $bookingModel->getActiveBookingsModel();
    return json_encode($data);
  }

  public function create_booking()
  {
    __login();

    $room_id = $this->request->getVar('nameroom');
    $chair = $this->request->getVar('chair');
    $remarks = $this->request->getVar('remarks');
    $date = $this->request->getVar('date');
    $time = $this->request->getVar('time');

    if (empty($room_id)) {
      __swal_error('โปรดเลือกห้องประชุมที่ต้องการจอง', base_url('booking'));
    } else if (empty($chair)) {
      __swal_error('โปรดเลือกจำนวนที่นั่งที่ต้องการจอง', base_url('booking'));
    } else if (empty($date)) {
      __swal_error('โปรดเลือกวันที่ต้องการจอง', base_url('booking'));
    } else if (empty($time)) {
      __swal_error('โปรดเลือกช่วงเวลาที่ต้องการจอง', base_url('booking'));
    } else {
      $bookingModel = $this->BookingModel();

      $list_booking[0] = [
        'B_DATE' => date("Y-m-d", strtotime($date)),
        'B_TIME' => $time,
        'B_ROOM_ID' => $room_id,
        'B_USER_ID' => __user_id(),
        'B_CHAIR' => $chair,
        'REMARKS' => $remarks
      ];

      $check_booking = $bookingModel->check_room($list_booking);
      if ($check_booking['status'] === true) {
        $data_booking = $bookingModel->create_booking($list_booking);
        if ($data_booking['status'] === true) {
          __swal_success("สำเร็จ", "คุณได้ทำการจองสำเร็จแล้ว โปรดรอการอนุมัติภายใน 12 ชั่วโมง", "ดูสถานะ", base_url('booking'));
        } else {
          __swal_error($data_booking['message'], base_url('booking'));
        }
      } else {
        __swal_error($check_booking['message'], base_url('booking'));
      }
    }
  }

  public function getTime_byDateRoom()
  {
    $date = $this->request->getVar('date');
    $r_id = $this->request->getVar('r_id');

    (!empty($date)) ? date('Y-m-d', strtotime($date)) : $date;

    $bookingModel = $this->BookingModel();
    $data = $bookingModel->getTime_byDateRoom_Model($date, $r_id);

    $callback = array();
    if ($data['success'] === true) {
      $callback = [
        'success' => true,
        'message' => $data['message'],
        'data' => $data['result']
      ];
    } else {
      $callback = [
        'success' => false,
        'message' => $data['message']
      ];
    }
    return json_encode($callback);
  }
}