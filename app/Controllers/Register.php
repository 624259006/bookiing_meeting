<?php
namespace App\Controllers;

class Register extends Main
{
  public function register()
  {
      return view('register/register');
  }

  public function save_register()
  {
    $session = session();
    helper(['form']);
    $rules = [
      'firstname' => [
        'rules' => 'required|min_length[2]|max_length[25]',
        'errors' => [
          'required' => 'โปรดระบุชื่อ!',
          'min_length' => 'โปรดระบุชื่อที่มีความยาวอย่างน้อย 2 ตัวอักษร!',
          'max_length' => 'โปรดระบุชื่อที่มีความยาวไม่เกิน 25 ตัวอักษร!',
        ],
      ],
      'lastname' => [
        'rules' => 'required|min_length[2]|max_length[25]',
        'errors' => [
          'required' => 'โปรดระบุนามสกุล!',
          'min_length' => 'โปรดระบุนามสกุลที่มีความยาวอย่างน้อย 2 ตัวอักษร!',
          'max_length' => 'โปรดระบุนามสกุลที่มีความยาวไม่เกิน 25 ตัวอักษร!',
        ],
      ],
      'id_card' => [
        'rules' => 'required|min_length[13]|max_length[13]|is_unique[USERS.ID_CARD]',
        'errors' => [
          'required' => 'โปรดระบุรหัสบัตรประชาชน!',
          'min_length' => 'โปรดระบุรหัสบัตรประชาชนที่มีความยาวอย่างน้อย 13 ตัวอักษร!',
          'max_length' => 'โปรดระบุรหัสบัตรประชาชนที่มีความยาวไม่เกิน 13 ตัวอักษร!',
          'is_unique' => 'หมายเลขบัตรประชาชนนี้ถูกใช้แล้ว!'
        ],
      ],
      'b_day' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'โปรดระบุวันเกิด!'
        ],
      ],
      'b_month' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'โปรดระบุเดือนเกิด!'
        ],
      ],
      'b_year' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'โปรดระบุปีเกิด!'
        ],
      ],
      'student_id' => [
        'rules' => 'required|min_length[9]|max_length[9]|is_unique[USERS.STUDENT_ID]',
        'errors' => [
          'required' => 'โปรดระบุรหัสนักศึกษา!',
          'min_length' => 'โปรดระบุรหัสนักศึกษาที่มีความยาวอย่างน้อย 9 ตัวอักษร!',
          'max_length' => 'โปรดระบุรหัสนักศึกษาที่มีความยาวไม่เกิน 9 ตัวอักษร!',
          'is_unique' => 'หมายเลขนักศึกษานี้ถูกใช้แล้ว!'
        ],
      ],
      'email' => [
        'rules' => 'required|min_length[5]|max_length[50]|valid_email|is_unique[USERS.EMAIL]',
        'errors' => [
          'required' => 'โปรดระบุอีเมล!',
          'valid_email' => 'รูปแบบของอีเมลไม่ถูกต้อง!',
          'is_unique' => 'อีเมลนี้ถูกใช้แล้ว!',
        ],
      ],
      'phone' => [
        'rules' => 'required|min_length[10]|max_length[10]|is_unique[USERS.PHONE]',
        'errors' => [
          'required' => 'โปรดระบุหมายเลขโทรศัพท์!',
          'min_length' => 'เบอร์โทรติดต่อต้องมีจำนวน 10 ตัวอักษร!',
          'max_length' => 'เบอร์โทรติดต่อต้องมีจำนวน 10 ตัวอักษร!',
          'is_unique' => 'หมายเลขโทรศัพท์นี้ถูกใช้แล้ว!',
        ],
      ],
      'password' => [
        'rules' => 'required|min_length[5]|max_length[30]',
        'errors' => [
          'required' => 'โปรดระบุรหัสผ่าน!',
          'min_length' => 'รหัสผ่านต้องมีอย่างน้อย 5 ตัวอักษร!',
          'max_length' => 'รหัสผ่านต้องไม่เกิน 30 ตัวอักษร!',
        ],
      ],
      'confirm_password' => [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'โปรดยืนยันรหัสผ่าน!',
          'matches' => 'รหัสผ่านไม่ตรงกัน!',
        ],
      ],
    ];

    $firstname = $this->request->getVar('firstname');
    $lastname = $this->request->getVar('lastname');
    $id_card = $this->request->getVar('id_card');
    $b_day = $this->request->getVar('b_day');
    $b_month = $this->request->getVar('b_month');
    $b_year = $this->request->getVar('b_year');
    $birthday = str_pad($b_year, 4, "0") . "-" . str_pad($b_month, 2, "0") . "-" . str_pad($b_day, 2, "0");
    $student_id = $this->request->getVar('student_id');
    $email = $this->request->getVar('email');
    $phone = $this->request->getVar('phone');
    $password = $this->request->getVar('password');

    if ($this->validate($rules)) {
      $user_model = $this->UserModel();
      $data_users = $user_model->where('EMAIL', $email)->first();
      if (isset($data_users)) {
        $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
        $session->setFlashdata('swel_text', 'อีเมลนี้ถูกใช้แล้ว!');
        $session->setFlashdata('swel_icon', 'error');
        $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
        return redirect()->to('/register');
      } else {
        $data[0] = [
          'FIRSTNAME' => $firstname,
          'LASTNAME' => $lastname,
          'ID_CARD' => $id_card,
          'BIRTHDAY' => $birthday,
          'STUDENT_ID' => $student_id,
          'EMAIL' => $email,
          'PHONE' => $phone,
          'PASSWORD' => $password,
          'IP_ADDRESS' => $this->request->getIPAddress()
        ];
        $data_save_user = $user_model->create_user($data);
        if ($data_save_user) {
          $session->setFlashdata('swel_title', 'สำเร็จ!');
          $session->setFlashdata('swel_text', 'สมัครสมาชิกสำเร็จแล้ว คุณสามารถลงชื่อเข้าใช้งานระบบได้ในขณะนี้');
          $session->setFlashdata('swel_icon', 'success');
          $session->setFlashdata('swel_button', 'ดำเนินการต่อ');
          return redirect()->to('/login');
        } else {
          $session->setFlashdata('swel_title', 'เกิดข้อผิดพลาด!');
          $session->setFlashdata('swel_text', 'ไม่สามารถลงทะเบียนเข้าใช้งานระบบได้ โปรดติดต่อผู้ดูแลระบบ');
          $session->setFlashdata('swel_icon', 'error');
          $session->setFlashdata('swel_button', 'ลองอีกครั้ง');
          return redirect()->to('/register');
        }
      }
    } else {
      $validation = $this->validator->listErrors();
      $session->setFlashdata('validation', $validation);
      if (!empty($firstname)) {
        $session->setFlashdata('firstname', $firstname);
      }
      if (!empty($lastname)) {
        $session->setFlashdata('lastname',  $lastname);
      }
      if (!empty($id_card)) {
        $session->setFlashdata('id_card', $id_card);
      }
      if (!empty($b_day)) {
        $session->setFlashdata('b_day', $b_day);
      }
      if (!empty($b_month)) {
        $session->setFlashdata('b_month', $b_month);
      }
      if (!empty($b_year)) {
        $session->setFlashdata('b_year', $b_year);
      }
      if (!empty($student_id)) {
        $session->setFlashdata('student_id', $student_id);
      }
      if (!empty($email)) {
        $session->setFlashdata('email', $email);
      }
      if (!empty($phone)) {
        $session->setFlashdata('phone', $phone);
      }
      return redirect()->to('/register');
    }
  }
}
