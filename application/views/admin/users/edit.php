<main id="main" class="main">
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="<?= site_url('dashboard/users') ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Edit Users</h5>
                <?= $this->session->flashdata('message') ?>

                <!-- Vertical Form -->
                <?php
                foreach ($users as $user) : ?>
                <form class="row g-3" method="POST" action="<?= site_url('users/update/') ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id'] ?>" required>
                    <div class="col-12">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control <?= form_error('nama') ? 'invalid' : '' ?>" id="nama"
                            name="nama" placeholder="Nama Lengkap Anda" value="<?= $user['nama'] ?>" required>
                        <?= form_error('nama'); ?>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="<?= $user['username'] ?>" required>
                        <?= form_error('username'); ?>
                    </div>
                    <div class="col-12">
                        <label for="role" class="form-label">Role</label>
                        <select id="role_id" class="form-control <?= form_error('role_id') ? 'invalid' : '' ?>"
                            name="role_id" required>
                            <option value="<?= $user['role_id'] ?>">
                                <?= $user['role_id'] == 1 ? "Admin" : "Pegawai" ?></option>
                            <option value="2">Pegawai</option>
                            <option value="1">Admin</option>
                        </select>
                        <?= form_error('role_id') ?>
                    </div>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $user['id'] ?>" required>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
                <?php endforeach ?>
                <!-- Vertical Form -->

            </div>
        </div>
    </section>
</main>