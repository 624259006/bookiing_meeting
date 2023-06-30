<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class BookingModel extends Model
{

  protected $table = 'BOOKING';
  protected $primaryKey = 'B_ID';
  protected $allowedFields = ['B_TIME', 'B_DATE', 'B_TIME', 'B_ROOM_ID', 'B_USER_ID', 'B_CHAIR', 'REMARKS', 'STATUS', 'APPROVE_AT', 'APPROVE_BY', 'CANCEL_BY', 'CANCEL_AT', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'IS_ACTIVE'];

  public function create_booking($data)
  {
    $callback = array();
    $arrInsertList = array();
    if (count($data) > 0) {
      $add_id = __user_id();

      foreach ($data as $val) {
        $insert_data = [
          'B_DATE' => $val["B_DATE"],
          'B_TIME' => $val["B_TIME"],
          'B_ROOM_ID' => $val["B_ROOM_ID"],
          'B_USER_ID' => $val["B_USER_ID"],
          'B_CHAIR' => $val["B_CHAIR"],
          'REMARKS' => $val["REMARKS"],
          'STATUS' => 'WAITING',
          'CREATE_AT' => date("Y-m-d H:i:s"),
          'CREATE_BY' => $add_id,
          'IS_ACTIVE' => 1

        ];

        $this->db
          ->table('BOOKING')
          ->insert($insert_data);

        $insert_id = $this->insertID();
        $arrInsertList[$insert_id] = $insert_id;
      }

      $callback = [
        'status' => true,
        'message' => 'ทำการจองสำเร็จ',
        'data' => $arrInsertList
      ];
    } else {
      $callback = [
        'status' => false,
        'message' => 'ไม่พบข้อมูลการจอง'
      ];
    }
    return $callback;
  }

  public function check_room($data)
  {
    $callback = array();
    $b_date = null;
    $b_time = null;
    $b_room_id = 0;
    if (count($data) > 0) {
      foreach ($data as $val) {
        $b_date = $val["B_DATE"];
        $b_time = $val["B_TIME"];
        $b_room_id = $val["B_ROOM_ID"];
      }

      if (empty($b_date)) {
        $callback = [
          'status' => false,
          'message' => 'โปรดระบุวันที่ที่จะใช้ห้องประชุม'
        ];
      } else if (empty($b_time)) {
        $callback = [
          'status' => false,
          'message' => 'โปรดระบุเวลาที่จะใช้ห้องประชุม'
        ];
      } else if (empty($b_room_id)) {
        $callback = [
          'status' => false,
          'message' => 'โปรดระบุห้องประชุม'
        ];
      } else {
        $list_room = $this->getall_booking_byDateRoom($b_date, $b_room_id);
        $callback = [
          'status' => true
        ];
        if ($b_time === 'FULLDATE' && count($list_room) > 0) {
          $callback = [
            'status' => false,
            'message' => 'ไม่สามารถทำการจองห้องประชุมช่วงเวลาที่เลือกได้'
          ];
        } else {
          foreach ($list_room as $val) {
            if ($val->B_TIME == $b_time || $val->B_TIME == 'FULLDATE') {
              $callback = [
                'status' => false,
                'message' => 'ไม่สามารถทำการจองห้องประชุมช่วงเวลาที่เลือกได้'
              ];
            }
          }
        }
      }
    } else {
      $callback = [
        'status' => false,
        'message' => ''
      ];
    }
    return $callback;
  }

  public function getall_booking_byDateRoom($b_date, $b_room_id)
  {
    if (!empty($b_date)) {
      $b_date = date("Y-m-d", strtotime($b_date));
    }

    $result = $this->db
      ->table('BOOKING')
      ->select('*')
      ->where('B_DATE', $b_date)
      ->where('B_ROOM_ID', $b_room_id)
      ->where('IS_ACTIVE', 1)
      ->get()
      ->getResultObject();
    return $result;
  }

  public function getActiveBookingsModel()
  {
    return $this->db
      ->table('BOOKING AS B')
      ->select('B.B_DATE, B.B_TIME, R.R_NAME')
      ->join('ROOMS AS R', 'B.B_ROOM_ID = R.R_ID', 'LEFT')
      ->where('B.IS_ACTIVE >=', '1')
      ->where('R.IS_ACTIVE >=', '1')
      ->where('B.STATUS', 'APPROVED')
      ->get()
      ->getResultArray();
  }

  public function getTime_byDateRoom_Model($date = "", $r_id = 0)
  {
    try {
      $result = $this->db
        ->table('BOOKING')
        ->select('B_TIME')
        ->where('B_DATE', $date)
        ->where('B_ROOM_ID', $r_id)
        ->where('IS_ACTIVE >=', '1')
        ->get()
        ->getResultArray();

      return [
        'success' => true,
        'result' => $result,
        'message' => 'สำเร็จ'
      ];
    } catch (Exception $ex) {
      return [
        'success' => false,
        'message' => $ex->getMessage()
      ];
    }
  }

  public function update_booking_status($b_id = 0, $status = "WAITING", $emp_remark = null) // Status is CANCELED, APPROVED, WAITING
  {
    if (!empty($b_id)) {
      $update_data = array();
      $user_id = __user_id();
      $date_now = date("Y-m-d H:i:s");
      if ($status == "APPROVED") {
        $update_data = [
          'STATUS' => $status,
          'APPROVE_BY' => $user_id,
          'APPROVE_AT' => $date_now,
          'UPDATE_BY' => $user_id,
          'UPDATE_AT' => $date_now,
          'EMP_REMARKS' => $emp_remark
        ];
      } else if ($status == "CANCELED") {
        $update_data = [
          'STATUS' => $status,
          'CANCEL_BY' => $user_id,
          'CANCEL_AT' => $date_now,
          'UPDATE_BY' => $user_id,
          'UPDATE_AT' => $date_now,
          'EMP_REMARKS' => $emp_remark
        ];
      } else {
        $update_data = [
          'STATUS' => $status,
          'UPDATE_BY' => $user_id,
          'UPDATE_AT' => $date_now
        ];
      }

      try {
        $result = $this->db
          ->table('BOOKING')
          ->where('B_ID', $b_id)
          ->where('IS_ACTIVE >=', 1)
          ->update($update_data);

        if ($result) {
          return [
            'success' => true,
            'message' => "สำเร็จ"
          ];
        } else {
          return [
            'success' => false,
            'message' => "ไม่สามารถแก้ไขข้อมูลได้ โปรดลองใหม่อีกครั้ง!"
          ];
        }
      } catch (Exception $ex) {
        return [
          'success' => false,
          'message' => $ex->getMessage()
        ];
      }
    } else {
      return [
        'success' => false,
        'message' => "ไม่พบข้อมูลการจองใดๆ"
      ];
    }
  }

  public function get_all_booking()
  {
    $result = $this->db
      ->table('BOOKING')
      ->where('IS_ACTIVE >=', 1)
      ->get()
      ->getResultObject();

    if ($result) {
      return $result;
    } else {
      return null;
    }
  }

  public function get_booking_byId($b_id)
  {
    try {
      $result = $this->db
        ->table('BOOKING')
        ->where('B_ID', $b_id)
        ->where('IS_ACTIVE >=', 1)
        ->get()
        ->getRowObject(0);

      if ($result) {
        return [
          'success' => true,
          'message' => "สำเร็จ",
          'result' => $result
        ];
      } else {
        return [
          'success' => false,
          'message' => "ไม่พบข้อมูลการจองที่ระบุ"
        ];
      }
    } catch (Exception $ex) {
      return [
        'success' => false,
        'message' => $ex->getMessage()
      ];
    }
  }
}
