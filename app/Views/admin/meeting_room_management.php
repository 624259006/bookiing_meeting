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
      <h5 class="text-center my-5">การจัดการห้องประชุม</h5>
      <div class="row">
        <div class="cow-lg-12 py-3 bg-primary"></div>
        <div class="cow-lg-12 py-3 bg-primarylight">
          <table class="table table-striped table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>ชื่อห้องประชุม</th>
                <th>ประเภทห้อง</th>
                <th>อุปกรณ์ภายในห้อง</th>
                <th>จำนวนที่นั่ง</th>
                <th>สถานะห้อง</th>
                <th>สถานที่</th>
                <th>ผู้รับผิดชอบ</th>
                <th>เมนู</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allrooms as $val) { ?>
                <tr>
                  <td><?= $val->R_NAME; ?></td>
                  <td><?= $val->R_TYPE; ?></td>
                  <td><?= $val->R_EQUIPMENT; ?></td>
                  <td><?= $val->R_CHAIR; ?></td>
                  <td>
                    <?php if ($val->R_STATUS == "Y") { ?>
                      <span class="text-success">ใช้งานได้</span>
                    <?php } else if ($val->R_STATUS == "E") { ?>
                      <span class="text-danger">ปิดปรับปรุง</span>
                    <?php } ?>
                  </td>
                  <td><?= $val->R_LOCATION; ?></td>
                  <td><?= __full_name_byId($val->R_ATTENDANT); ?></td>
                  <td><a href="<?= base_url('admin/addroom/' . $val->R_ID); ?>" class="btn btn-warning">แก้ไข</a></td>
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
        <a href="<?= base_url("Admin/addroom") ?>" class="btn btn-success">เพิ่มห้องประชุม</a>
        <a href="<?= base_url("admin/dashboard") ?>" class="btn btn-danger">ยกเลิก</a>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
  <?= $this->endSection() ?>