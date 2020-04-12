<div class="login-box login-box-custom">
  <div class="card">
    <div class="card-body login-card-body">
      <center><img src="<?php echo base_url('assets/image/logo2.jpg'); ?>" width="80%"/></center>
      <h4 class="green-plus-custom text-center">Sistem Informasi Monitoring Produksi</h4>
      <hr>
      <p class="login-box-msg">Masuk untuk memulai sesi</p>
      <form action="<?php echo site_url('authentication/login'); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control tes" placeholder="Username" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Kata Sandi" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="mx-auto col-4">
            <button type="submit" class="btn pink-plus-btn-custom btn-block text-center">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
<?php
    $existFlashDataAlertMessage = $this->session->flashdata('alert_message');  

    if($existFlashDataAlertMessage) {
        echo 'toastr.error("'.$existFlashDataAlertMessage.'")';
    } 
?>
</script>