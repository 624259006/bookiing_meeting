<?php

namespace App\Controllers;

class User extends Main
{
  public function profile()
  {
    __login();

    $userModel = $this->UserModel();
    $user_data = $userModel->get_user_data(__user_id());

    $data_sending = [
      'user' => $user_data
    ];

    return view('user/profile', $data_sending);
  }

  public function edit()
  {
    __login();

    $userModel = $this->UserModel();
    $user_data = $userModel->get_user_data(__user_id());

    if (!empty($user_data)) {
      $data_sending = [
        'data' => $user_data
      ];
      return view('user/edit', $data_sending);
    } else {
      __swal_error('ไม่พบข้อมูลผู้ใช้ โปรดลองใหม่อีกครั้ง', base_url('profile'));
    }
  }

  public function save_edit()
  {
    __login();

    $firstname = $this->request->getVar('firstname');
    $lastname = $this->request->getVar('lastname');
    $email = $this->request->getVar('email');

    if (empty($firstname)) {
      __swal_error('กรุณาระบุชื่อจริง ก่อนทำการบันทึกข้อมูล', base_url('user/edit'));
    } else if (empty($lastname)) {
      __swal_error('กรุณาระบุนามสกุล ก่อนทำการบันทึกข้อมูล', base_url('user/edit'));
    } else if (empty($email)) {
      __swal_error('กรุณาระบุที่อยู่อีเมล ก่อนทำการบันทึกข้อมูล', base_url('user/edit'));
    } else {
      $update_data = [
        'FIRSTNAME' => $firstname,
        'LASTNAME' => $lastname,
        'EMAIL' => $email
      ];
      $userModel = $this->UserModel();
      $update_result = $userModel->update_user_detail(__user_id(), $update_data);
      if ($update_result['success'] == true) {
        __swal_success($update_result['message'], "ข้อมูลได้รับการบันทึกเรียบร้อยแล้ว", "ตกลง", base_url('profile'));
      } else {
        __swal_error($update_result['message'], base_url('user/edit'));
      }
    }
  }

  public function report()
  {
    __login();

    return view('user/report');
  }

  public function history()
  {
    return view('user/history');
  }
}
