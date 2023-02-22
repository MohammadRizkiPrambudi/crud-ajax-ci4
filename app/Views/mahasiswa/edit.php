<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="frm-editmahasiswa" action="/Mahasiswa/UpdateData">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id_mahasiswa" id="id_mahasiswa" value="<?= $id_mahasiswa; ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input autocomplete="off" type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?= $nama; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Nim</label>
                        <div>
                            <input autocomplete="off" type="text" id="nim" name="nim" class="form-control" readonly placeholder="NIM" value="<?= $nim; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat</label>
                        <div>
                            <input autocomplete="off" type="text" name="tempat" id="tempat" class="form-control" placeholder="Tempat Lahir" value="<?= $tempat; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div>
                            <input autocomplete="off" type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal Lahir" value="<?= $tgl; ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div>
                            <select name="jenkel" id="jenkel" class="form-control">
                                <option> -- Pilih --</option>
                                <option value="L" <?= $jenkel == 'L' ? 'selected' : ''; ?>>Laki-Laki</option>
                                <option value="P" <?= $jenkel == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-simpanmahasiswa">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".frm-editmahasiswa").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    $(".btn-simpanmahasiswa").attr("disable", "disabled");
                    $(".btn-simpanmahasiswa").html("<i class='fa fa-spin fa-spinner'></i> Proses");
                },
                complete: function() {
                    $(".btn-simpanmahasiswa").removeAttr("disable");
                    $(".btn-simpanmahasiswa").html("Update");
                },
                success: function(response) {
                    swal({
                        title: 'Berhasil',
                        text: response.sukses,
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10'
                    })
                    $("#modal-edit").modal("hide");
                    viewMahasiswa();

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                },
            });
        });
    });
</script>