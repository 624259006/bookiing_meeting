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
      <h5 class="text-center my-5">การจัดการการจอง</h5>
      <div class="row">
        <div class="cow-lg-12 py-3 bg-primary"></div>
        <div class="cow-lg-12 py-3 bg-primarylight">
          <table class="table table-striped table-bordered table-hover text-center">
            <thead>
              <tr>
                <th>ลำดับ</th>
                <th>ชื่อห้องประชุม</th>
                <th>ชื่อ-นามสกุลผู้จอง</th>
                <th>วันที่ใช้ห้อง</th>
                <th>เวลา</th>
                <th>สถานะ</th>
                <th>เมนู</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($allbooking as $val) { ?>
                <tr>
                  <td><?= $i++; ?></td>
                  <td><?= __room_name_byId($val->B_ROOM_ID); ?></td>
                  <td><?= __full_name_byId($val->B_USER_ID); ?></td>
                  <td><?= __format_date($val->B_DATE); ?></td>
                  <td><?= __booking_time_name($val->B_TIME); ?></td>
                  <td><?= $val->STATUS == "WAITING" ? "<font color='orange'>รอดำเนินการ</font>" : ($val->STATUS ==  "APPROVED" ? "<font color='green'>อนุมัติ</font>"  : ($val->STATUS == "CANCELED" ? "<font color='red'>ยกเลิก</font>" : "")); ?></td>
                  <td><a href="<?= base_url('admin/booking_detail/' . $val->B_ID); ?>" class="btn btn-success">เพิ่มเติม</a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>

<?= $this->endSection() ?>