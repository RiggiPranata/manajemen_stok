<?= $this->extend('Templates/index'); ?>

<?= $this->section('pages-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="<?= base_url('adminlte'); ?>/dist/img/avatar5.png" class="card-img" alt="profile picture">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4><?= user()->username; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <?= user()->email; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>