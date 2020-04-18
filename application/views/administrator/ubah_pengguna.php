<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Ubah Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>" class="green-plus2-custom">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo site_url('administrator/list_pengguna'); ?>" class="green-plus2-custom">List Pengguna</a></li>
            <li class="breadcrumb-item active">Ubah Pengguna</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>
 
  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title">Detail</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <table class="table table-bordered">
                    <tbody>                  
                      <tr>
                        <td style="width: 120px"><b>Nama</b></td>
                        <td><?php echo $pengguna->nama; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title">Form Ubah Pengguna</h3>
            </div>
            <form class="form-horizontal" action="<?php echo site_url('administrator/ubah_pengguna_action'); ?>" method="post">
              <div class="card-body">
                <div class="form-group row">
                  <label for="role" class="col-sm-2 col-form-label">Role</label>
                  <div class="col-sm-10 input-group">
                    <select class="form-control" name="pengguna" style="width: 100%;">
                      <?php
                        foreach($role as $itemRole)
                        {
                            $value = base64_encode(serialize(array($pengguna->username, $itemRole->id)));
                            if($itemRole->role == $pengguna->role)
                            {
                                echo '<option selected="selected" value="'.$value.'">'.ucwords(strtolower($itemRole->role)).'</option>';
                            }
                            else
                            {
                                echo '<option value="'.$value.'">'.ucwords(strtolower($itemRole->role)).'</option>';
                            }    
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
