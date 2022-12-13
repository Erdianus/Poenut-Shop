<div class="text-center login-page d-flex justify-content-center align-items-center">
    <main class="form-signin w-100 m-auto">
        <div class="mb-5 title-login">Poenut Shop</div>
        <?= $this->session->flashdata('message') ?>
        <h1 class="mb-4 fw-normal">Login</h1>
        <form action="<?= site_url('auth/login') ?>" method="POST">
            <input class="form-control form-control-lg" type="text" placeholder="Username" name="username">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            <input class="form-control form-control-lg" type="password" placeholder="Password" name="password">
            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            <button class="w-100 btn btn-lg btn-primary button-login mb-4" type="submit">Log in</button>
        </form>
        <a href="<?= site_url() ?>">Kembali</a>
        <p class="mt-5 mb-3 text-muted">&copy; Copyright 2022, Peonut Shop, Develop by Erdianus Pagesong</p>
    </main>
</div>