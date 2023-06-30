<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UsersModel extends Model
{

  protected $table = 'USERS';
  protected $primaryKey = 'USER_ID';
  protected $allowedFields = ['FIRSTNAME', 'LASTNAME', 'ID_CARD', 'STUDENT_ID', 'EMAIL', 'PASSWORD', 'PHONE', 'PROFILE_PATH', 'USER_POSITION', 'IP_ADDRESS', 'LAST_LOGIN', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'USER_ACTIVE'];

  public function create_user($array)
  {
    if (!empty($array)) {
      foreach ($array as $val) {
        $data = [
          'FIRSTNAME' => !empty($val['FIRSTNAME']) ? $val['FIRSTNAME'] : NULL,
          'LASTNAME' => !empty($val['LASTNAME']) ? $val['LASTNAME'] : NULL,
          'ID_CARD' => !empty($val['ID_CARD']) ? $val['ID_CARD'] : NULL,
          'BIRTHDAY' => !empty($val['BIRTHDAY']) ? $val['BIRTHDAY'] : NULL,
          'STUDENT_ID' => !empty($val['STUDENT_ID']) ? $val['STUDENT_ID'] : NULL,
          'EMAIL' => !empty($val['EMAIL']) ? $val['EMAIL'] : NULL,
          'PHONE' => !empty($val['PHONE']) ? $val['PHONE'] : NULL,
          'PASSWORD' => !empty($val['STUDENT_ID']) && !empty($val['PASSWORD']) ? password_hash($val['STUDENT_ID'] . ":" . $val['PASSWORD'], PASSWORD_DEFAULT) : NULL,
          'USER_POSITION' => !empty($val['USER_POSITION']) ? $val['USER_POSITION'] : "1",
          'IP_ADDRESS' => !empty($val['IP_ADDRESS']) ? $val['IP_ADDRESS'] : NULL,
          'CREATE_AT' => !empty($val['CREATE_AT']) ? $val['CREATE_AT'] : date("Y-m-d H:i:s"),
          'CREATE_BY' => !empty($val['CREATE_BY']) ? $val['CREATE_BY'] : "-1",
          'USER_ACTIVE' => !empty($val['USER_ACTIVE']) ? $val['USER_ACTIVE'] : "1"
        ];
        $this->insert($data);
        if (!empty($this->insertID())) {
          return true;
        } else {
          return false;
        }
      }
    } else {
      return false;
    }
  }

  public function check_student_id($student_id)
  {
    $result = $this->db
      ->table('USERS')
      ->select('STUDENT_ID')
      ->where('STUDENT_ID', $student_id)
      ->where('USER_ACTIVE >=', 1)
      ->get()
      ->getRow();

    if ($result) {
      return $result->STUDENT_ID;
    }

    return null;
  }

  public function check_user_login($student_id)
  {
    $result = $this->db
      ->table('USERS')
      ->select('USER_ID,PASSWORD')
      ->where('STUDENT_ID', $student_id)
      ->where('USER_ACTIVE >=', 1)
      ->get()
      ->getRow();

    if ($result) {
      return $result;
    }

    return null;
  }

  public function update_user_login($user_id)
  {
    $update_data = [
      'LAST_LOGIN' => date('Y-m-d H:i:s')
    ];

    $this->db
      ->table('USERS')
      ->where('USER_ID', $user_id)
      ->update($update_data);
  }

  public function genarate_admin()
  {
    $student_id = __random_code("numeric", 9);

    $insert_data = [
      'FIRSTNAME' => __random_code("alnum", 7),
      'LASTNAME' => __random_code("alnum", 10),
      'ID_CARD' => __random_code("numeric", 13),
      'BIRTHDAY' => date('Y-m-d'),
      'STUDENT_ID' => $student_id,
      'EMAIL' => __random_code("alnum", 8) . "@" . __random_code("alnum", 5) . "." . __random_code("alnum", 3),
      'PHONE' => '0' . __random_code("numeric", 9),
      'PASSWORD' => password_hash($student_id . ":" . $student_id, PASSWORD_DEFAULT),
      'USER_POSITION' => "4",
      'IP_ADDRESS' => "192.168.0.1",
      'CREATE_AT' => date("Y-m-d H:i:s"),
      'CREATE_BY' => "-1",
      'USER_ACTIVE' => "1"
    ];

    $result = $this->db
      ->table('USERS')
      ->insert($insert_data);

    if ($result) {
      return $insert_data;
    } else {
      return null;
    }
  }

  public function get_user_data($user_id)
  {
    $result = $this->db
      ->table('USERS')
      ->where('USER_ID', $user_id)
      ->where('USER_ACTIVE >=', 1)
      ->get()
      ->getRow(0);

    if ($result) {
      return $result;
    } else {
      return null;
    }
  }

  public function get_all_user()
  {
    $result = $this->db
      ->table('USERS')
      ->where('USER_ACTIVE >=', 1)
      ->get()
      ->getResultObject();

    if ($result) {
      return $result;
    } else {
      return null;
    }
  }

  public function update_user_detail($user_id, $update_data)
  {
    try {
      $this->db
      ->table('USERS')
      ->where('USER_ID', $user_id)
      ->update($update_data);
      return [
        'success' => true,
        'message' => "เรียบร้อยแล้ว"
      ];
    } catch (Exception $ex) {
      return [
        'success' => false,
        'message' => $ex->getMessage()
      ];
    }
  }
}
