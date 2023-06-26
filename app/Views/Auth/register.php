<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2><?= lang('Auth.register') ?></h2>
            </div>
            <div class="card-body pt-0">
                <p class="login-box-msg"> <?= view('Myth\Auth\Views\_message_block') ?></p>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="input-group mb-3">
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.username') ?>" name="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <small id="emailHelp" class="form-text text-muted pl-2 mb-2"><?= lang('Auth.weNeverShare') ?></small>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?= url_to('login') ?>" class="text-center"><?= lang('Auth.alreadyRegistered') ?> <?= lang('Auth.signIn') ?></a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>
<?= $this->endSection(); ?>