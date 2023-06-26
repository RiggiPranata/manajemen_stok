<?= $this->extend('Auth/Templates/index'); ?>

<?= $this->section('content'); ?>
<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h2><?= lang('Auth.loginTitle') ?></h2>
            </div>
            <div class="card-body pt-0">
                <p class="login-box-msg"> <?= view('Myth\Auth\Views\_message_block') ?></p>

                <form action="<?= url_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']) : ?>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <div class="fas fa-user-alt" aria-hidden="true"></div>
                                </div>
                            </div>
                            <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <div class="fas fa-user-alt" aria-hidden="true"></div>
                                </div>
                            </div>
                            <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>" autofocus>
                            <div class="invalid-feedback">
                                <?= session('errors.login') ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <div class="fas fa-lock" aria-hidden="true"></div>
                            </div>
                        </div>
                        <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mt-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <?php if ($config->allowRegistration) : ?>
                    <p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>
                <?php endif; ?>
                <?php if ($config->activeResetter) : ?>
                    <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                <?php endif; ?>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
</div>
<?= $this->endSection(); ?>