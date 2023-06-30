<?php 

namespace App\Models;

use CodeIgniter\Model;

class RoomsModel extends Model {

  protected $table = 'ROOMS';
  protected $primaryKey = 'R_ID';
  protected $allowedFields = ['R_NAME', 'R_CODE', 'R_CHAIR', 'R_TYPE', 'R_STATUS', 'R_LOCATION', 'R_ATTENDANT', 'R_EQUIPMENT', 'IMAGES', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'IS_ACTIVE'];

  public function getAll_rooms() {
    return $this->db->table('ROOMS')
        ->select('*')
        ->where('IS_ACTIVE >=', 1)
        ->get()
        ->getResultObject();
  }

  public function getRoom_byCode($code = "") {
    return $this->db->table('ROOMS')
      ->select('*')
      ->join('USERS', 'ROOMS.R_ATTENDANT = USERS.USER_ID')
      ->where('R_CODE', $code)
      ->where('IS_ACTIVE >=', 1)
      ->get()
      ->getRow(0);
  }

  public function getRoom_bySize($size) {
    return $this->db->table('ROOMS')
    ->select('R_ID, R_NAME')
    ->where('IS_ACTIVE >=', 1)
    ->where('R_TYPE', $size)
    ->get()
    ->getResultObject();
  }

  public function get_room_data($r_id) {
    return $this->db->table('ROOMS')
    ->where('IS_ACTIVE >=', 1)
    ->where('R_ID', $r_id)
    ->get()
    ->getRow(0);
  }

  
}