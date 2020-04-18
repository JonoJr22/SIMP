<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>" class="green-plus2-custom">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('administrator/list_pengguna'); ?>" class="green-plus2-custom">List Pengguna</a></li>
            <li class="breadcrumb-item active">Tambah Pengguna</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>
 
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title">Form Tambah Pengguna</h3>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('administrator/tambah_pengguna_action'); ?>" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-4 input-group">
                    <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" required pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                  <div class="col-sm-3 input-group">
                    <input type="text" class="form-control" name="nama_tengah" placeholder="Nama Tengah" pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                  <div class="col-sm-3 input-group">
                    <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama_ayah_kandung" class="col-sm-2 col-form-label">Nama Ayah</label>
                  <div class="col-sm-4 input-group">
                    <input type="text" class="form-control" name="nama_ayah_depan" placeholder="Nama Depan" required pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                  <div class="col-sm-3 input-group">
                    <input type="text" class="form-control" name="nama_ayah_tengah" placeholder="Nama Tengah" pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                  <div class="col-sm-3 input-group">
                    <input type="text" class="form-control" name="nama_ayah_belakang" placeholder="Nama Belakang" pattern="^\S+$" title="Tidak boleh ada spasi">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="role" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10 input-group">
                    <select class="form-control" name="role" style="width: 100%;">
                      <?php
                        $seq = 1;
                        foreach($role as $itemRole)
                        {
                            if($seq == 1)
                            {
                                echo '<option selected="selected" value="'.$itemRole->id.'">'.ucwords(strtolower($itemRole->role)).'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$itemRole->id.'">'.ucwords(strtolower($itemRole->role)).'</option>';
                            }    

                            $seq = 0;
                        }
                      ?> 
                    </select>
                  </div>
                </div>
              </div>
              <div class="card-footer pink-min-bg-custom">
                <a class="btn bg-dark" href="<?php echo site_url('administrator/list_pengguna') ?>" role="button">Cancel</a>
                <button type="submit" class="btn green-btn-custom float-right">Submit</button>
              </div>
            </form>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    <?php
    $existFlashDataSuccessClosableMessage = $this->session->flashdata('success_closable_message');  
    if($existFlashDataSuccessClosableMessage) {
        echo '
            $(document).Toasts("create", {
                body: "'.$existFlashDataSuccessClosableMessage.'",
                title: "Success",
                icon: "fas fa-shield-check fa-lg",
                class: "bg-success",
                position: "bottomRight",
            })
        ';
    }
    ?>
</script>
