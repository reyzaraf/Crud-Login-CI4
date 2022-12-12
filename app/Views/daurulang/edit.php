<div class="content-wrapper" style="min-height: 1302.12px;">
<div class="container">
<div class="col-sm-12 col-lg-12 pt-5 mb-5 pb-5">
        <div class="card">
            <div class="card-header">
                Form Edit Buku Prelove
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Inputan Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('/daur_ulang/update/'.$daurulangs['id_daur_ulang']); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="batch" class="form-label">batch</label>
                        <input type="text" class="form-control" id="batch" name="batch" value="<?= $daurulangs['batch']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">keterangan</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $daurulangs['keterangan']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $daurulangs['alamat']?>" rows="3">
                    </div>
                    <div class="mb-3">
                    <span>
                            Gambar yang telah terupload 
                        </span><br>
                        <img width="auto" height="120" src="<?= base_url('uploads/images/users/'.$daurulangs["image"]);?>" alt="">  
                        <br>
                        <label for="image" class="form-label">Image</label>
                        <input type="hidden"  class="form-control" id="fileold" name="image" value="<?= $daurulangs['image']?>" rows="3">
                        <input type="file" class="form-control" id="image" name="file" value="<?= $daurulangs['image']?>" rows="3">
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