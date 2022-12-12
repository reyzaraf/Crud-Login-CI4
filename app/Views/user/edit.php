
<div class="content-wrapper" style="min-height: 1302.12px;">
<div class="container">
<div class="col-sm-12 col-lg-12 pt-5 mb-5 pb-5">
        <div class="card">
            <div class="card-header">
                Form Edit 
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <h4>Periksa Inputan Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('/user/update/'.$users['id_user']); ?>" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label">username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $users['username']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">password</label>
                        <input type="text" class="form-control" id="password" name="password" value="<?= $users['password']?>" rows="3">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $users['name']?>" rows="3">
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" class="btn btn-info" value="update" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
                </div>