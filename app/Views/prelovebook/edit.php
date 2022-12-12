
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
                <form method="post" action="<?= base_url('/prelovebook/update/'.$prelovebooks['id_prebook']); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $prelovebooks['judul']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label">pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $prelovebooks['pengarang']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $prelovebooks['harga']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $prelovebooks['stok']?>" rows="3">
                        
                    </div>
                    <div class="mb-3">
                    <span>
                            Gambar yang telah terupload 
                        </span><br>
                        <img width="auto" height="120" src="<?= base_url('uploads/images/users/'.$prelovebooks["image"]);?>" alt="">  
                        <br>
                        <label for="image" class="form-label">Image</label>
                        <input type="hidden"  class="form-control" id="fileold" name="image" value="<?= $prelovebooks['image']?>" rows="3">
                        <input type="file" class="form-control" id="image" name="file" value="<?= $prelovebooks['image']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="Upload" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>