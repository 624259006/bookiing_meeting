<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Login to connect the website<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container my-9">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <h5 class="text-center mb-5">เข้าสู่ระบบ</h5>
      <?php $validation = session()->getFlashdata('validation');
          if(isset($validation)) { ?>
          <div class="alert alert-danger"><?= session()->getFlashdata('validation') ?></div>
          <?php } ?>
      <form action="<?= base_url("login/get_login"); ?>" method="POST">
        <div class="form-group">
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-student-id">รหัสประจำตัว : </label>
            </div>
            <div class="col-lg-7">
              <input type="text" id="input-student-id" name="student_id" class="form-control" placeholder="Student ID" value="<?= (session()->getFlashdata('student_id')) ? session()->getFlashdata('student_id') : (isset($_COOKIE['student_id']) ? $_COOKIE['student_id'] : ""); ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3 text-end mt-2">
              <label for="input-password">รหัสผ่าน : </label>
            </div>
            <div class="col-lg-7">
              <input type="password" id="input-password" name="password" class="form-control" placeholder="Password" value="<?php if (isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>">
            </div>
            <div class="col-lg-2"></div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-3"></div>
            <div class="col-lg-7">
              <input type="checkbox" name="remember_me" id="remember-me" class="form-check-input" <?php if (isset($_COOKIE["student_id"])) {
                                                                                                    echo "checked";
                                                                                                  } ?> />
              <label for="remember-me" class="mb-4">จดจำฉัน</label><br />
              <a href="<?= base_url('user/forgot_password'); ?>" class="clear-hyperlink text-primary">ลืมรหัสผ่าน?</a>
            </div>
            <div class="col-lg-2"></div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" value="เข้าสู่ระบบ">
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-2"></div>
  </div>
</div>

<?= $this->endSection() ?>