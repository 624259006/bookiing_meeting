<?= $this->extend('layouts/user/header-main') ?>
<?= $this->section('title') ?>Genarate User Admin<?= $this->endSection(); ?>
<?= $this->section('header-content'); ?>
<?php if (!empty($student_id)) { ?>
  <script>alert('Student ID => ' + <?= $student_id; ?> + '\n' + 'Password => ' + <?= $student_id; ?>); console.log('Student ID => ' + <?= $student_id; ?> + '\n' + 'Password => ' + <?= $student_id; ?>)</script>
<?php } ?>
<?= $this->endSection(); ?>