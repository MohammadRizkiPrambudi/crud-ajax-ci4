<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle-1">Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="frm-tambahmahasiswa" action="/Mahasiswa/InsertData">
                    <div class="form-group">
                        <label>Nama</label>
                        <input autocomplete="off" type="text" class="form-control" name="nama" id="nama" placeholder="Nama" />
                        <div class="invalid-feedback errorNama">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nim</label>
                        <div>
                            <input autocomplete="off" type="text" id="nim" name="nim" class="form-control" placeholder="NIM" />
                            <div class="invalid-feedback errorNim">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tempat</label>
                        <div>
                            <input autocomplete="off" type="text" name="tempat" id="tempat" class="form-control" placeholder="Tempat Lahir" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div>
                            <input autocomplete="off" type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Tanggal Lahir" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div>
                            <select name="jenkel" id="jenkel" class="form-control">
                                <option> -- Pilih --</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-simpanmahasiswa">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(".frm-tambahmahasiswa").submit(function(e) {
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
                    $(".btn-simpanmahasiswa").html("Simpan");
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }
                        if (response.error.nim) {
                            $('#nim').addClass('is-invalid');
                            $('.errorNim').html(response.error.nim);
                        } else {
                            $('#nim').removeClass('is-invalid');
                            $('.errorNim').html('');
                        }
                    } else {
                        swal({
                            title: 'Berhasil',
                            text: response.sukses,
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonClass: 'btn btn-success',
                            cancelButtonClass: 'btn btn-danger m-l-10'
                        })
                        $("#modal-tambah").modal("hide");
                        viewMahasiswa();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                },
            });
        });
    });
</script>