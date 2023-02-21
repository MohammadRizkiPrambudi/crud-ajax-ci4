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
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $("#tabel").DataTable();
    });
</script>