<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>

<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">ข้อมูลห้องประชุม</h5>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="mt-2 float-end">(เล็ก กลาง ใหญ่)</label>
            <select id="select-type" class="form-control float-end mx-2" style="width: 100px;">
              <option value="" class="text-center">ทั้งหมด</option>
              <option value="เล็ก" class="text-center">เล็ก</option>
              <option value="กลาง" class="text-center">กลาง</option>
              <option value="ใหญ่" class="text-center">ใหญ่</option>
            </select>
            <label class="mt-2 float-end">ขนาดของห้อง</label>
          </div>
        </div>
      </div>
      <div id="table-content"></div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>

<script>
  function load_table_content() {
    var select_type = $('#select-type').val();
    var page = new URLSearchParams(window.location.href).get('page');

    $('#table-content').html("<div class='text-center'><img src='<?= base_url('images/icons/Loading_icon.gif'); ?>' width='25px' height='25px'><br><br>กำลังโหลด</div>");
    $.ajax({
      url: '<?= base_url(); ?>rooms/table_content',
      method: 'GET',
      data: {
        select_type: select_type,
        page: page
      },
      success: function(response) {
        $('#table-content').html(response);
      },
      error: function(xhr, status, error) {
        $('#table-content').html("<div class='text-center text-danger'>มีบางอย่างผิดพลาด! (" + error + ")</div>");
      }
    });
  }

  load_table_content();

  $('#select-type').change(function() {
    load_table_content();
  });
</script>

<?= $this->endSection() ?>