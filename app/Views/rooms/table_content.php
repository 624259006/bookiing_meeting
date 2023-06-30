<table class="table table-main-primary table-striped table-hover mt-3">
  <thead>
    <tr class="text-center">
      <th>รายชื่อห้องประชุม</th>
      <th>สถานะห้องประชุม</th>
      <th>รายละเอียดห้อง</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if (count($rooms) >= 1) {
      foreach ($rooms as $val) {
    ?>
        <tr>
          <td>
            <div class="row">
              <div class="col-lg-5 text-center">
                <?php foreach (json_decode($val['IMAGES'], true) as $img) {
                ?>
                  <img src="<?= base_url($img); ?>" class="img-room">
                <?php
                  break;
                }
                ?>
              </div>
              <div class="col-lg-5">
                <label class="btn-roomname user-select-none <?php if ($val['R_TYPE'] == "เล็ก") {
                                                              echo "btn-roomname-success";
                                                            } else if ($val['R_TYPE'] == "กลาง") {
                                                              echo "btn-roomname-warning";
                                                            } else if ($val['R_TYPE'] == "ใหญ่") {
                                                              echo "btn-roomname-pink";
                                                            } ?>"><?= (!empty($val['R_NAME'])) ? "ห้องประชุม " . $val['R_NAME'] : "<font color='red'>ไม่มีชื่อ</font>"; ?></label>
                <label class="text-end d-block">
                  <?php if (!empty($val['R_TYPE'])) { ?>
                    ห้องประชุมขนาด<?= $val['R_TYPE']; ?>
                  <?php } ?>
                </label>
              </div>
            </div>
          </td>
          <td class="text-center">
            <!-- B = Booked, Y = Can use, E = Edit -->
            <?php if ($val['R_STATUS'] == "Y") { ?>
              <label class="btn-status btn-status-success user-select-none">ใช้งานได้</label>
            <?php } else if ($val['R_STATUS'] == "E") { ?>
              <label class="btn-status btn-status-danger user-select-none">ปิดปรับปรุง</label>
            <?php } ?>
          </td>
          <td class="text-center"><a href="<?= base_url("rooms/detail/" . $val['R_CODE']); ?>" class="clear-hyperlink"><i class="fa-solid fa-landmark fa-2xl mb-4"></i><br>คลิกที่นี่<br>เพื่อดูรายละเอียดเพิ่มเติม</a></td>
        </tr>
      <?php
      }
    } else {
      ?>
      <tr>
        <td colspan="3">
          <div class="row">
            <div class="col-lg-12 text-center text-light">
              ไม่มีข้อมูล
            </div>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<div class="float-end">
  <?= $pager->links(); ?>
</div>
<script type="text/javascript" src="<?= base_url("script/jquery-3.6.4.js"); ?>"></script>
<script>
  $(document).ready(function() {
    $('nav ul.pagination').find('a').each(function() {
      var href = $(this).attr('href');
      href = href.replace('table_content', 'table');
      $(this).attr('href', href);
    });
  });
</script>