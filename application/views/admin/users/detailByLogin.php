<main id="main" class="main">
    <a href="<?= site_url('dashboard') ?>">
        <i class="bi bi-arrow-left"></i><span> Kembali</span>
    </a>
    <div class="pagetitle my-4">
        <h1>My Profile</h1>
    </div><!-- End Page Title -->
    <?= $this->session->flashdata('message') ?>
    <?php foreach ($users as $user) : ?>
    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2><?= $user['nama'] ?></h2>
                        <h3><?= $user['role_id'] == 1 ? 'Admin' : 'Pegawai' ?></h3>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reset-pass">Reset
                                    Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['nama'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['username'] ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Role</div>
                                    <div class="col-lg-9 col-md-8"><?= $user['role_id'] == 1 ? 'Admin' : 'Pegawai' ?>
                                    </div>
                                </div>

                            </div>

                        </div><!-- End Bordered Tabs -->
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form method="post" enctype="multipart/form-data"
                                    action="<?= site_url('users/updateProfile/') . $this->session->userdata('id') ?>">

                                    <div class="row mb-3">
                                        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="nama"
                                                value="<?= $this->session->userdata('nama') ?>">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username"
                                                value="<?= $this->session->userdata('username') ?>">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3" id="reset-pass">

                                <!-- Profile Edit Form -->
                                <form method="post"
                                    action="<?= site_url('users/resetPass/') . $this->session->userdata('username') ?>">

                                    <div class="row mb-3">
                                        <label for="currentPass" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="currentPass" type="password" class="form-control"
                                                id="currentPass">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="newPass" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newPass" type="password" class="form-control" id="newPass">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="konfirPass" class="col-md-4 col-lg-3 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="konfirPass" type="password" class="form-control"
                                                id="konfirPass">
                                        </div>
                                    </div>
                                    <input name="id" type="hidden" class="form-control" id="id"
                                        value="<?= $this->session->userdata('id') ?>">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php
    endforeach ?>

</main><!-- End #main -->