<?php

namespace App\Models;

use CodeIgniter\Model;

class PositionModel extends Model
{
  protected $table = 'POSITION';
  protected $primaryKey = 'P_ID';
  protected $allowedFields = ['P_NAME', 'P_CODE', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'IS_ACTIVE'];

  public function getAll_Position()
  {
    $result = $this->db
      ->table('POSITION')
      ->select('*')
      ->where('IS_ACTIVE >=', 1)
      ->get()
      ->getResultObject();

    $arr_position = array();
    foreach ($result as $val) {
      $arr_position[$val->P_ID] = [
        'P_NAME' => $val->P_NAME,
        'P_CODE' => $val->P_CODE
      ];
    }
    return $arr_position;
  }
}
