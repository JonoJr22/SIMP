<div class="content-wrapper">
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Daftar Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>" class="green-plus2-custom">Home</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
          </ol>
        </div>
      </div>
      <hr>
    </div>
  </div>
 
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title" style="margin-top:5px;">Tabel Pengguna</h3>
              <a class="btn btn-sm green-btn-custom float-right" href="<?php echo site_url('administrator/tambah_pengguna') ?>" role="button">Tambah</a>
            </div>
              <div class="card-body">
              <table id="pengguna" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th><center>No.</center></th>
                  <th><center>Nama</center></th>
                  <th><center>Role</center></th>
                  <th><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $no = 1;
                    
                    foreach($pengguna as $itemPengguna)
                    {
                        echo '<tr id='.$itemPengguna->id.'>';
                        echo '<td><center>'.$no.'</center></td>';
                        echo '<td>'.$itemPengguna->nama.'</td>';
                        echo '<td>'.ucwords(strtolower($itemPengguna->role)).'</td>';

                        echo '<td>';
                        echo '<center>';
                        echo '<div class="btn-group">';
                        echo '<a class="btn btn-sm btn-warning" href="'.site_url('administrator/ubah_pengguna/'.$itemPengguna->username).'" role="button"><i class="fas fa-edit"></i></a>';
                        echo '<a class="btn btn-sm btn-danger hapus" data-id="'.$itemPengguna->id.'" role="button"><i class="fas fa-trash-alt"></i></a>';
                        echo '</div>';
                        echo '</center>';
                        echo '</td>';
                        echo '</tr>';
                        $no++;
                    }
                  ?>
              </table>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $("#pengguna").DataTable({
        'columnDefs': [{
            'targets': 3, 
            'orderable': false, 
        }],
        "language": {
            "emptyTable"    : "Tidak ada data tersedia",
            "info"          : "Menampilkan _START_ sampai _END_ dari _TOTAL_ record",
            "infoEmpty"     : "Menampilkan 0 sampai 0 dari 0 record",
            "infoFiltered"  : "(Menyeleksi dari _MAX_ total record)",
            "lengthMenu"    : "Menampilkan _MENU_ record",
            "loadingRecords": "Memuat...",
            "processing"    : "Memproses...",
            "search"        : "Cari:",
            "zeroRecords"   : "Tidak ada data yang cocok ditemukan",
            "paginate"      : {
                "first"     : "Pertama",
                "last"      : "Terakhir",
                "next"      : "Selanjutnya",
                "previous"  : "Sebelumnya"
            }
        }
    });

    $('.hapus').click(function(){
        var id = $(this).attr("data-id");

        swal({
            title: "Apa anda yakin?",
            text: "Setelah dihapus, data ini tidak bisa dikembalikan.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya, hapus",
            cancelButtonClass: "bg-dark",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '<?php echo site_url('administrator/hapus_pengguna_action/'); ?>'+ id,
                    type: 'DELETE',
                    error: function() {
                        alert('Terjadi kesalahan');
                    },
                    success: function(data) {
                        swal({
                            title: "Terhapus!",
                            text: "Data pengguna ini telah terhapus",
                            type: "success",
                            confirmButtonClass: "bg-dark",
                            confirmButtonText: "Oke, sip"
                        },
                        function(isConfirm) {
                            if(isConfirm) {
                                location.reload(true);
                            }
                        });
                    }
                });
            } 
            else 
            {
                swal({
                    title: "Dibatalkan",
                    text: "Data pengguna ini sudah aman",
                    type: "error",
                    confirmButtonClass: "bg-dark",
                    confirmButtonText: "Oke, sip"
                });
            }
        });
    });
</script>