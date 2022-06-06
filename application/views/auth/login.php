<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>Travel </b>APP</a>
        </div>
        <?= $this->session->flashdata('message') ?>
        <div class="card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?= base_url('auth') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger"><?= form_error('email') ?></small>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger"><?= form_error('password') ?></small>
                <div class="row">
                    <div class="col-lg">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <p class="mb-0">
                <a href="<?= base_url('auth/register') ?>" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->