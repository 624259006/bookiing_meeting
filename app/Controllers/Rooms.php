<?php

namespace App\Controllers;

class Rooms extends Main
{
  public function table()
  {
    $data_sending = [
      'active' => 'table'
    ];
    return view('rooms/table', $data_sending);
  }

  public function table_content()
  {
    $select_type = $this->request->getVar('select_type');
    $page = $this->request->getVar('page');

    $max_rows = 4;
    if (empty($page)) {
      $page = 1;
    }
    $offset = ($page - 1) * $max_rows;
    $roomsModel = new \App\Models\RoomsModel();
    $con = "IS_ACTIVE >= 1";
    if (!empty($select_type)) {
      $con .= " AND R_TYPE = '$select_type'";
    }

    $roomsModel->select('*')->where($con)->paginate($max_rows);
    $pager = $roomsModel->pager;

    $rooms = $roomsModel->select('*')->where($con)->limit($max_rows, $offset)->get()->getResultArray();

    $data_sending = [
      'rooms' => $rooms,
      'pager' => $pager
    ];

    return view('rooms/table_content', $data_sending);
  }

  public function detail($code = "")
  {
    $rooms_model = $this->RoomsModel();
    $data = $rooms_model->getRoom_byCode($code);
    if (!empty($data)) {
      $data_sending = [
        'room' => $data
      ];
      return view('rooms/detail', $data_sending);
    } else {
      $session = session();
      $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
      $session->setFlashdata('swel_text', 'ไม่รู้ห้องประชุมดังกล่าว กรุณาลองใหม่อีกครั้ง!');
      $session->setFlashdata('swel_icon', 'error');
      $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
      return redirect()->to('/table');
    }
  }

  public function status_reservation()
  {
    return view('rooms/status_reservation');
  }

  public function getAllRoom()
  {
    $size = $this->request->getVar('size');

    $roomsModel = $this->RoomsModel();
    $getRooms = $roomsModel->getRoom_bySize($size);

    if (count($getRooms) > 0) {
      $data = [
        'success' => true,
        'getRooms' => $getRooms
      ];
    } else {
      $data = [
        'success' => false,
        'message' => 'No data!'
      ];
    }
    return $this->response->setJSON($data);
  }

  public function getChair_Id()
  {
    $r_id = $this->request->getVar('r_id');

    $roomsModel = $this->RoomsModel();
    $getChair = $roomsModel->get_room_data($r_id);

    if (!empty($getChair->R_CHAIR)) {
      $data = [
        'success' => true,
        'getChair' => $getChair->R_CHAIR
      ];
    } else {
      $data = [
        'success' => false,
        'message' => 'No data!'
      ];
    }
    return $this->response->setJSON($data);
  }
}
