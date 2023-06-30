<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Register to login this website<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<?php
helper(['function']);
$arr_month = __month();
?>

<div class="container my-9">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <h5 class="text-center mb-5">สมัครสมาชิก</h5>
      <?php $validation = session()->getFlashdata('validation');
      if (isset($validation)) { ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('validation') ?></div>
      <?php } ?>
      <form action="<?= base_url("register/save_register"); ?>" method="POST">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-firstname">ชื่อ :</label>
            </div>
            <div class="col-lg-7">
              <div class="row">
                <div class="col-lg-5">
                  <input type="text" id="input-firstname" name="firstname" class="form-control" placeholder="First name" value="<?php if (session()->getFlashdata('firstname')) {
                                                                                                                                  echo session()->getFlashdata('firstname');
                                                                                                                                } ?>">
                </div>
                <div class="col-lg-2 text-end mt-2 px-0">
                  <label for="input-lastname">นามสกุล :</label>
                </div>
                <div class="col-lg-5">
                  <input type="text" id="input-lastname" name="lastname" class="form-control" placeholder="Last name" value="<?php if (session()->getFlashdata('lastname')) {
                                                                                                                                echo session()->getFlashdata('lastname');
                                                                                                                              } ?>">
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-id-card">รหัสบัตรประชาชน : </label>
            </div>
            <div class="col-lg-7">
              <input type="text" id="input-id-card" name="id_card" class="form-control" placeholder="ID Card" value="<?php if (session()->getFlashdata('id_card')) {
                                                                                                                        echo session()->getFlashdata('id_card');
                                                                                                                      } ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-student-id">วันเกิด : </label>
            </div>
            <div class="col-lg-7">
              <div class="row">
                <div class="col-4">
                  <select id="b_day" name="b_day" class="form-control">
                    <option value="" class="text-center">- วัน -</option>
                    <?php for ($day = 1; $day <= 31; $day++) { ?>
                      <option value="<?= $day; ?>" class="text-center" <?php if (session()->getFlashdata('b_day') && session()->getFlashdata('b_day') == $day) {
                                                                          echo "selected";
                                                                        } ?>><?= $day; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4">
                  <select id="b_month" name="b_month" class="form-control">
                    <option value="" class="text-center">- เดือน -</option>
                    <?php for ($month = 1; $month <= 12; $month++) { ?>
                      <option value="<?= $month; ?>" class="text-center" <?php if (session()->getFlashdata('b_month') && session()->getFlashdata('b_month') == $month) {
                                                                            echo "selected";
                                                                          } ?>><?= $arr_month[$month]; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4">
                  <select id="b_year" name="b_year" class="form-control">
                    <option value="" class="text-center">- ปี -</option>
                    <?php for ($year = (date("Y") - 60 + 543); $year <= (date("Y") - 16 + 543); $year++) { ?>
                      <option value="<?= $year; ?>" class="text-center" <?php if (session()->getFlashdata('b_year') && session()->getFlashdata('b_year') == $year) {
                                                                          echo "selected";
                                                                        } ?>><?= $year; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-student-id">รหัสประจำตัว : </label>
            </div>
            <div class="col-lg-7">
              <input type="text" id="input-student-id" name="student_id" class="form-control" placeholder="personal identification number" value="<?php if (session()->getFlashdata('student_id')) {
                                                                                                                                echo session()->getFlashdata('student_id');
                                                                                                                              } ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-email">อีเมล : </label>
            </div>
            <div class="col-lg-7">
              <input type="email" id="input-email" name="email" class="form-control" placeholder="Email" value="<?php if (session()->getFlashdata('email')) {
                                                                                                                  echo session()->getFlashdata('email');
                                                                                                                } ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-phone">เบอร์โทร : </label>
            </div>
            <div class="col-lg-7">
              <input type="text" id="input-phone" name="phone" class="form-control" placeholder="Phone number" value="<?php if (session()->getFlashdata('phone')) {
                                                                                                                        echo session()->getFlashdata('phone');
                                                                                                                      } ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-password">รหัสผ่าน : </label>
            </div>
            <div class="col-lg-7">
              <input type="password" id="input-password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-confirm-password">ยืนยันรหัสผ่าน : </label>
            </div>
            <div class="col-lg-7">
              <input type="password" id="input-confirm-password" name="confirm_password" class="form-control" placeholder="Confirm password">
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" value="สมัครสมาชิก">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>
<?= $this->endSection() ?>