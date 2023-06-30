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
          <form action="<?= base_url('admin/update_booking_status'); ?>" method="POST">
            <div class="row">
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <label>ชื่อห้องประชุม:</label>
                  </div>
                  <div class="col-lg-6">
                    <?= __room_name_byId($booking_data->B_ROOM_ID); ?>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label>ผู้จองห้องประชุม:</label>
                  </div>
                  <div class="col-lg-6">
                    <a href="<?= base_url('admin/edit_user/' . $booking_data->B_USER_ID); ?>" style="text-decoration: none; color: blue;"><?= __full_name_byId($booking_data->B_USER_ID); ?></a>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label>วันที่จอง:</label>
                  </div>
                  <div class="col-lg-6">
                    <?= __format_date($booking_data->B_DATE); ?>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label>ช่วงเวลาที่จอง:</label>
                  </div>
                  <div class="col-lg-6">
                    <?= __booking_time_name($booking_data->B_TIME); ?>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <label>จำนวนที่นั่ง:</label>
                  </div>
                  <div class="col-lg-6">
                    <?= $booking_data->B_CHAIR; ?> ที่นั่ง
                  </div>
                  <?php if (!empty($booking_data->REMARKS)) { ?>
                    <div class="col-lg-6 mb-3">
                      <label>วัตถุประสงค์:</label>
                    </div>
                    <div class="col-lg-6">
                      <?= $booking_data->REMARKS; ?>
                    </div>
                  <?php
                  }
                  if ($booking_data->STATUS == "WAITING") {
                  ?>
                    <div class="col-lg-6 mb-3">
                      <label for="status">สถานะการจอง:</label>
                    </div>
                    <div class="col-lg-6">
                      <select name="status" id="status" class="form-control">
                        <option value="WAITING" <?= $booking_data->STATUS == "WAITING" ? "selected" : ""; ?> >รอการอนุมัติ</option>
                        <option value="APPROVED" <?= $booking_data->STATUS == "APPROVED" ? "selected" : ""; ?> >อนุมัติ</option>
                        <option value="CANCELED" <?= $booking_data->STATUS == "CANCELED" ? "selected" : ""; ?> >ยกเลิก</option>
                      </select>
                    </div>
                  <?php
                  }
                  if ($booking_data->STATUS != "WAITING") {
                  ?>
                    <div class="col-lg-6 mb-3">
                      <label for="remarks">ผลการตรวจสอบ:</label>
                    </div>
                    <div class="col-lg-6">
                    <?= $booking_data->STATUS == "WAITING" ? "<font color='orange'>รอดำเนินการ</font>" : ($booking_data->STATUS ==  "APPROVED" ? "<font color='green'>อนุมัติ</font>"  : ($booking_data->STATUS == "CANCELED" ? "<font color='red'>ยกเลิก</font>" : "")); ?>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="remarks">ชื่อผู้ตรวจสอบ:</label>
                    </div>
                    <div class="col-lg-6">
                      <?= (!empty($booking_data->APPROVE_BY) ? __full_name_byId($booking_data->APPROVE_BY) : (!empty($booking_data->CANCEL_BY) ? __full_name_byId($booking_data->CANCEL_BY) : "<font color='red'>ไม่มีข้อมูล</font>")); ?>
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="remarks">เวลาที่ตรวจสอบ:</label>
                    </div>
                    <div class="col-lg-6">
                      <?= (!empty($booking_data->APPROVE_AT) ? __format_datetime($booking_data->APPROVE_AT) : (!empty($booking_data->CANCEL_AT) ? __format_datetime($booking_data->CANCEL_AT) : "<font color='red'>ไม่มีข้อมูล</font>")); ?>
                    </div>
                  <?php } ?>
                  <div class="div-emp-remarks col-lg-6 mb-3">
                    <label for="emp_remarks">หมายเหตุ:</label>
                  </div>
                  <div class="div-emp-remarks col-lg-6">
                    <input type="text" id="emp_remarks" name="emp_remarks" class="form-control" placeholder="หมายเหตุ">
                  </div>
                </div>
              </div>
              <div class="col-lg-3"></div>
            </div>
            <div class="mt-4">
              <div class="col-lg-12 text-center">
                <?php if ($booking_data->STATUS == "WAITING") { ?>
                  <input type="hidden" name="b_id" value="<?= $booking_data->B_ID; ?>">
                  <input type="submit" class="btn btn-success" value="บันทึก">
                <?php } ?>
                <a href="<?= base_url("admin/manage_reservation") ?>" class="btn btn-secondary">ยกเลิก</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $('.div-emp-remarks').hide();

  $('#status').on('change', function() {
    if ($('#status').val() != "" && $('#status').val() != "WAITING") {
      $('.div-emp-remarks').show();
    } else {
      $('.div-emp-remarks').hide();
    }
  });
</script>

<?= $this->endSection() ?>