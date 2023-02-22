<table id="tabel" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>TTL</th>
            <th>Jenkel</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($mahasiswa as $mhs) : ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['nama']; ?></td>
                <td><?= $mhs['tempat']; ?>, <?= tanggal($mhs['tgl']); ?></td>
                <td><?= $mhs['jenkel'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="edit('<?= $mhs['id_mahasiswa'] ?>')">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="hapus('<?= $mhs['id_mahasiswa'] ?>')">Hapus</button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $("#tabel").DataTable();
    });

    function edit(id_mahasiswa) {
        $.ajax({
            url: "/Mahasiswa/EditData",
            data: {
                id_mahasiswa: id_mahasiswa
            },
            dataType: "JSON",
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#modal-edit").modal("show");
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            },
        });
    }

    function hapus(id_mahasiswa) {
        swal({
            title: 'Apakah anda yakin ?',
            text: "Menghapus data mahasiswa ini!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function() {
            $.ajax({
                url: "/Mahasiswa/DeleteData",
                data: {
                    id_mahasiswa: id_mahasiswa
                },
                dataType: "JSON",
                success: function(response) {
                    swal({
                        title: 'Berhasil',
                        text: response.sukses,
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonClass: 'btn btn-success',
                        cancelButtonClass: 'btn btn-danger m-l-10'
                    })
                    viewMahasiswa()
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                },
            });
        })
    }
</script>