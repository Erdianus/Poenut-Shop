<main id="main" class="main">
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="<?= site_url('dashboard/users') ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Tambah Users</h5>

                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?= site_url('users/store') ?>">
                    <div class="col-12">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap Anda"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            required>
                    </div>
                    <div class="col-12">
                        <label for="role" class="form-label">Role</label>
                        <select id="role_id" class="form-control" name="role_id" required>
                            <option selected value="2">Pegawai</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="col-6">
                        <label for="konfirPass" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirPass" name="konfirPass"
                            placeholder="Konfirmasi Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form><!-- Vertical Form -->

            </div>
        </div>
    </section>
</main>