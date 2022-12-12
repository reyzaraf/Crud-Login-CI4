<div class="content-wrapper" style="min-height: 1302.12px;">
<div class="container">
<div class="col-sm-12 col-lg-12 pt-5 mb-5 pb-5">
        <div class="card">
            <div class="card-header">
                Form Upload Buku Donasi
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Inputan Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url(); ?>/donasi/save" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Donasi</label>
                        <input type="text" class="form-control" id="nama" name="nama_donasi" rows="3"><?= old('nama'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" rows="3"><?= old('alamat'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <textarea type="number" class="form-control" id="keterangan" name="keterangan" rows="3"><?= old('keterangan'); ?> 
                    </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="file">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="Upload" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                </div>