<?= $this->extend('template-admin/index'); ?>
<?= $this->Section('konten'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <div class="btn-group pull-right">
                <ol class="breadcrumb hide-phone p-0 m-0">
                    <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Tampil Mahasiswa</li>
                </ol>
            </div>
            <h4 class="page-title">Tampil Mahasiswa</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="card-title">
                    <button type="button" class="btn btn-danger btn-sm btntambah-mahasiswa" data-animation="fadeInUp"><i class=" fa fa-plus-circle mr-1"></i>Tambah Data</button>
                </div>
                <div id="get-mahasiswa"></div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div class="view-modal" style="display: none;"></div>
<script>

</script>
<?= $this->endSection(); ?>