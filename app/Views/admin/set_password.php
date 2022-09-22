<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>


<div class="container-fluid">
    <?php if (isset($validation)) { ?>
    <div class="col-md-12">
        <?php foreach ($validation->getErrors() as $error) : ?>
        <div class="alert alert-warning" role="alert">
            <i class="mdi mdi-alert-outline me-2"></i>
            <?= esc($error) ?>
        </div>
        <?php endforeach ?>
    </div>
    <?php } ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-700"><b>Reset Password</b></h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php if (isset($validation)) { ?>
            <div class="col-md-12">
                <?php foreach ($validation->getErrors() as $error) : ?>
                <div class="alert alert-warning" role="alert">
                    <i class="mdi mdi-alert-outline me-2"></i>
                    <?= esc($error) ?>
                </div>
                <?php endforeach ?>
            </div>
            <?php } ?>

            <form action="<?= base_url(); ?>admin/setPassword" method="post">
                <input type="hidden" name="id" class="id" value="<?= $id; ?>">
                <div class="form-group row">
                    <div class="col-6">
                        <input type="password" name="password"
                            class="form-control form-control-user <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-6">
                        <input type="password" name="pass_confirm"
                            class="form-control form-control-user <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                            placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>