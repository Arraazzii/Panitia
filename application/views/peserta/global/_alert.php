<?php if ($this->session->flashdata('danger')):?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('danger') ?>
  </div>
<?php endif;?>

<?php if ($this->session->flashdata('success')):?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('success') ?>
  </div>
<?php endif;?>

<?php if ($this->session->flashdata('warning')):?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?= $this->session->flashdata('warning') ?>
  </div>
<?php endif;?>