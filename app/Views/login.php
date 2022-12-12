<div class="container">
        <div class="row justify-content-md-center">
 
            <div class="col-6">
                <h1>Sign In</h1>

                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?= base_url(); ?>/login/process">
                <?= csrf_field(); ?>
                <h1 class="h3 mb-3 fw-normal">Login</h1>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control" required autofocus>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" required>
                <button type="submit" class="w-100 btn btn-lg btn-primary">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy; Warung Belajar</p>
            </form>
            </div>
             
        </div>
    </div>