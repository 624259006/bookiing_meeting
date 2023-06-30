<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Edit to a Profile<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <div class="row mt-5"></div>
      <h5 class="text-center my-5">แก้ไขข้อมูลส่วนตัว</h5>
      <center>
        <img class="me-2" src="<?php echo base_url('images/user1.png'); ?>" id="imgblah" width="100px" height="100px" class="profile-user-profile">
      </center>
      <div class="row mt-5"></div>
      <form action="<?= base_url("user/save_edit"); ?>" method="POST">
        <div class="form-group">
          <div class="row">
            <div class="col-lg-4 text-end mt-2">
              <label for="input-firstname">ชื่อ :</label>
            </div>
            <div class="col-lg-5">
              <input type="text" id="input-firstname" name="firstname" class="form-control" placeholder="First name" value="<?= $data->FIRSTNAME; ?>">
            </div>
            <div class="col-lg-3"></div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4 text-end mt-2">
              <label for="input-lastname">นามสกุล : </label>
            </div>
            <div class="col-lg-5">
              <input type="text" id="input-lastname" name="lastname" class="form-control" placeholder="Last name" value="<?= $data->LASTNAME; ?>">
            </div>
            <div class="col-lg-3"></div>
          </div>
          <div class="row mt-5">
            <div class="col-lg-4 text-end mt-2">
              <label for="input-email">อีเมล : </label>
            </div>
            <div class="col-lg-5">
              <input type="email" id="input-email" name="email" class="form-control" placeholder="Email" value="<?= $data->EMAIL; ?>">
            </div>
            <div class="col-lg-3"></div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12 text-center">
            <input type="submit" class="btn btn-success" value="อัพเดต">
            <a href="<?= base_url('profile') ?>" class="btn btn-secondary">ย้อนกลับ</a>
          </div>
        </div>
      </form>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>