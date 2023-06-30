<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class NotificationModel extends Model
{
  protected $table = 'NOTIFICATION';
  protected $primaryKey = 'N_ID';
  protected $allowedFields = ['MESSAGE', 'READ', 'TO_USER', 'CREATE_AT', 'CREATE_BY', 'UPDATE_AT', 'UPDATE_BY', 'IS_ACTIVE'];

  public function getAllNoti_byUserId($user_id = "")
  {
    if (!empty($user_id)) {
      try {
        $result = $this->db
          ->table('NOTIFICATION')
          ->select('*')
          ->where('TO_USER', $user_id)
          ->where('IS_ACTIVE >=', 1)
          ->get()
          ->getResultObject();

        if ($result) {
          return [
            'success' => true,
            'message' => 'เรียบร้อยแล้ว',
            'result' => $result
          ];
        } else {
          return [
            'success' => false,
            'message' => 'ไม่มีข้อมูลการแจ้งเตือนใดๆ'
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
        'message' => 'รหัสผู้ใช้งานว่างเปล่า'
      ];
    }
  }

  public function new_notification($to_user, $message)
  {
    try {
      if (empty($to_user)) {
        return [
          'success' => false,
          'message' => 'รหัสผู้ใช้งานว่างเปล่า'
        ];
      } else if (empty($message)) {
        return [
          'success' => false,
          'message' => 'ข้อความว่างเปล่า'
        ];
      } else {
        $insert_data = [
          'TO_USER' => $to_user,
          'MESSAGE' => $message,
          'READ' => 'N',
          'CREATE_AT' => date('Y-m-d H:i:s'),
          'CREATE_BY' => __user_id(),
          'IS_ACTIVE' => 1
        ];
        $this->db
          ->table('NOTIFICATION')
          ->insert($insert_data);

        if (!empty($this->insertID())) {
          return [
            'success' => true,
            'message' => 'เรียบร้อยแล้ว'
          ];
        } else {
          return [
            'success' => false,
            'message' => 'เกิดข้อผิดพลาด โปรดติดต่อผู้ดูแล'
          ];
        }
      }
    } catch (Exception $ex) {
      return [
        'success' => false,
        'message' => $ex->getMessage()
      ];
    }
  }
}
