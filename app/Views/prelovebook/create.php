
<div class="container">
<div class="col-sm-12 col-lg-12 pt-5 mb-5 pb-5">
        <div class="card">
            <div class="card-header">
                Form Upload Buku Prelove
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Inputan Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url(); ?>/prelovebook/save" enctype="multipart/form-data">
                      <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" rows="3"><?= old('judul'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" rows="3"><?= old('pengarang'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" rows="3"><?= old('harga'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" rows="3"><?= old('stok'); ?>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="Upload" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>