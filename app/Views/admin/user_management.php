<?= $this->extend('layouts/admin/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style>
  table,
  th,
  td {
    border: 1px solid black;
  }

  .bg-primarylight {
    background-color: #AFC8EE;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">การจัดการผู้ใช้</h5>
      <div class="row">
        <div class="cow-lg-12 py-3 bg-primary"></div>
        <div class="cow-lg-12 py-3 bg-primarylight">
          <table class="table table-striped table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>รหัสผู้ใช้งาน</th>
                <th>ชื่อ-นามสกุล</th>
                <th>อีเมล์</th>
                <th>เบอร์โทรศัพท์</th>
                <th>รหัสประจำตัว</th>
                <th>บันทึก</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($alluser as $val) { ?>
                <tr>
                  <td><?= $val->USER_ID; ?></td>
                  <td><?= $val->FIRSTNAME." ".$val->LASTNAME; ?></td>
                  <td><?= $val->EMAIL; ?></td>
                  <td><?= $val->PHONE; ?></td>
                  <td><?= $val->STUDENT_ID; ?></td>
                  <td><a href="<?= base_url('admin/edit_user/' . $val->USER_ID); ?>" class="btn btn-success">แก้ไข</a></td>
                </tr>
              <?php } ?>
              </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row mt-5"></div>
    <div class="row mt-4">
      <div class="col-lg-12 text-center">
        <input type="submit" class="btn btn-success" value="ตกลง">
        <a href="<?= base_url("home") ?>" class="btn btn-danger">ยกเลิก</a>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>

  <?= $this->endSection() ?>