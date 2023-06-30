<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Login extends Main
{
  public function login()
  {
    return view('login/login');
  }

  public function get_login()
  {
    $session = session();
    helper(['form']);
    $rules = [
      'student_id' => [
        'rules' => 'required|min_length[9]|max_length[9]',
        'errors' => [
          'required' => 'โปรดระบุรหัสนักศึกษา!',
          'min_length' => 'โปรดระบุรหัสนักศึกษาที่มีความยาวอย่างน้อย 9 ตัวอักษร!',
          'max_length' => 'โปรดระบุรหัสนักศึกษาที่มีความยาวไม่เกิน 9 ตัวอักษร!'
        ],
      ],
      'password' => [
        'rules' => 'required|min_length[5]|max_length[30]',
        'errors' => [
          'required' => 'โปรดระบุรหัสผ่าน!',
          'min_length' => 'รหัสผ่านต้องมีอย่างน้อย 5 ตัวอักษร!',
          'max_length' => 'รหัสผ่านต้องไม่เกิน 30 ตัวอักษร!'
        ],
      ]
    ];

    $student_id = $this->request->getVar('student_id');
    $password = $this->request->getVar('password');

    if ($this->validate($rules)) {
      $user_model = $this->UserModel();
      $check_user_login = $user_model->check_user_login($student_id);
      if (!empty($check_user_login->USER_ID)) {
        $user_id = $check_user_login->USER_ID;
        $password_verity = password_verify($student_id . ":" . $password, $check_user_login->PASSWORD);
        if ($password_verity) {
          $user_model->update_user_login($user_id);
          $user_data = $user_model->get_user_data($user_id);

          $arr_cookie = array('path' => '/',);
          if (!empty($this->request->getVar('remember_me'))) {
            setcookie("student_id", $student_id, $arr_cookie);
            setcookie("password", $password, $arr_cookie);
          } else {
            setcookie("student_id", "", $arr_cookie);
            setcookie("password", "", $arr_cookie);
          }

          $session_data = [
            'session_user_id' => $user_data->USER_ID,
            'session_user_position' => $user_data->USER_POSITION
          ];
          $session->set($session_data);
          $session->setFlashdata('swel_title', 'สำเร็จ!');
          $session->setFlashdata('swel_text', 'ท่านสามารถเข้าใช้งานระบบได้แล้วในขณะนี้');
          $session->setFlashdata('swel_icon', 'success');
          $session->setFlashdata('swel_button', 'ดำเนินการต่อ');
          return redirect()->to('/');
        } else {
          $session->setFlashdata('swel_title', 'รหัสผ่านไม่ถูกต้อง!');
          $session->setFlashdata('swel_text', 'ไม่สามารถเข้าใช้งานระบบได้ กรุณาแก้ไขรหัสผ่านให้ถูกต้อง!');
          $session->setFlashdata('swel_icon', 'error');
          $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
          return redirect()->to('/login');
        }
      } else {
        $session->setFlashdata('swel_title', 'ไม่พบข้อมูลผู้ใช้!');
        $session->setFlashdata('swel_text', 'ไม่สามารถเข้าใช้งานระบบได้ กรุณาตรวจสอบข้อมูลรหัสนักศึกษา!');
        $session->setFlashdata('swel_icon', 'error');
        $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
        return redirect()->to('/login');
      }
    } else {
      $validation = $this->validator->listErrors();
      $session->setFlashdata('validation', $validation);
      if (!empty($student_id)) {
        $session->setFlashdata('student_id', $student_id);
      }
      return redirect()->to('/login');
    }
  }

  public function forgot_password()
  {
    return view('login/forgot_password');
  }

  public function genarate_admin()
  {
    $session = session();
    $user_model = new UsersModel();
    $response = $user_model->genarate_admin();
    $session->setFlashdata('swel_title', $response['STUDENT_ID']);
    $session->setFlashdata('swel_icon', 'success');
    $session->setFlashdata('swel_button', 'รับทราบ');
    return view('home/writepage');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to('/login');
  }
}
