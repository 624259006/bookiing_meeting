<?php $session = session(); ?>
<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3 class="text-center">Management</h3>
    </div>
    <ul class="list-unstyled">
        <p class="listboxpfh fs20">Managers</p>
        <li>
            <a href="<?php echo base_url('admin/dashboard'); ?>" id="wrapper-1" class="listboxpf ps-5 fs16">หน้าหลัก</a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/user_management'); ?>" id="wrapper-2" class="listboxpf ps-5 fs16">จัดการผู้ใช้</a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/manage_reservation'); ?>" id="wrapper-2" class="listboxpf ps-5 fs16">จัดการการจอง</a>
        </li>
        <?php
        if (isset($Q_Pos_ID) && $Q_Pos_ID >= 4) { ?>
            <!-- Admin -->
        <?php } ?>
        <li>
            <a href="<?php echo base_url('admin/meeting_room_management'); ?>" id="wrapper-4" class="listboxpf ps-5 fs16">การจัดการห้องประชุม</a>
        </li>
        <li>
            <a href="<?php echo base_url('admin/chek_report'); ?>" id="wrapper-6" class="listboxpf ps-5 fs16">การรายงานปัญหา</a>
        </li>
        <p class="listboxpfh fs20">Others</p>
        <li>
            <a href="<?php echo base_url(); ?>" class="listboxpf ps-5 fs16">กลับสู่หน้าหลัก</a>
        </li>
        <li>
            <a href="<?php echo base_url('logout'); ?>" class="listboxpf ps-5 fs16 text-danger">ออกจากระบบ</a>
        </li>
    </ul>
</nav>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
        if (window.location.href == "<?php echo base_url('dashboard'); ?>") {
            document.getElementById("wrapper-1").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-2").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-3").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-4").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-5").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-6").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {
            document.getElementById("wrapper-7").style.background = "#FFB000";
        } else if (window.location.href == "<?php echo base_url('...'); ?>") {}
    });
</script>