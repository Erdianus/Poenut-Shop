<div class="text-center login-page d-flex justify-content-center align-items-center">
    <main class="form-signin w-100 m-auto">
        <form>
            <div class="mb-5 title-login">Poenut Shop</div>
            <h1 class="mb-4 fw-normal">Login</h1>
            <?= $this->session->flashdata('message') ?>
            <form action="<?= site_url('auth/login') ?>" method="post">
                <input class="form-control form-control-lg" type="text" placeholder="Username" name="username" required>
                <input class="form-control form-control-lg" type="password" placeholder="Password" name="password"
                    required>
                <button class="w-100 btn btn-lg btn-primary button-login mb-4" type="submit">Sign in</button>
            </form>
            <a href="<?= base_url() ?>">Kembali</a>
            <p class="mt-5 mb-3 text-muted">&copy; Copyright 2022, Peonut Shop, Develop by Erdianus Pagesong</p>
        </form>
    </main>
</div>