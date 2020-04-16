<?php
    $cancelPath = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '#';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ubah Password</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <?php
                if(isset($force))
                {
                    echo '<li class="breadcrumb-item force-ubah-password"><a href="#" class="green-plus2-custom">Home</a></li>';
                }
                else
                {
                    echo '<li class="breadcrumb-item"><a href="'.base_url().'" class="green-plus2-custom">Home</a></li>';
                }
            ?>
            <li class="breadcrumb-item active">Ubah Password</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>
 
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 ">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title">Form Ubah Password</h3>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('administrator/ubah_password_action'); ?>" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <div class="col-sm-12 input-group">
                    <input type="password" class="form-control" name="password_lama" placeholder="Password Lama" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 input-group">
                    <input type="password" class="form-control" name="password_baru" placeholder="Password Baru" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 input-group">
                    <input type="password" class="form-control" name="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru" required>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer pink-min-bg-custom">
                <?php
                    if(!isset($force))
                    {
                        echo '<a class="btn bg-dark" href="'.$cancelPath.'" role="button">Cancel</a>';
                    }
                ?>
                <button type="submit" class="btn green-btn-custom float-right">Submit</button>
              </div>
            </form>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>