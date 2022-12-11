<main id="main" class="main">
    <div class="pagetitle">
        <h1>Users Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Users</a></li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title"> Users Table</h5>
                                <a href="<?= site_url('users/create') ?>">
                                    <button class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus"></i> Tambah
                                        User</button>
                                </a>
                                <?= $this->session->flashdata('message') ?>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($users as $no => $user) : ?>
                                        <tr>
                                            <th scope="row"><?= $no + 1 ?></th>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['nama'] ?></td>
                                            <td><?= $user['role_id'] == 1 ? 'Admin' : 'Pegawai' ?></td>
                                            <td>
                                                <a href="<?= site_url('users/show/' . $user['id']) ?>"><button
                                                        class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                                        Lihat</button></a>
                                                <a href="<?= site_url('users/edit/' . $user['id']) ?>"><button
                                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i>
                                                        Edit</button></a>
                                                <a href="<?= site_url('users/destroy/' . $user['id']) ?>"><button
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                        Hapus</button></a>
                                            </td>
                                        </tr>
                                        <?php
                                        endforeach ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <!-- End Recent Sales -->
                </div>
            </div>
            <!-- End Left side columns -->
        </div>
    </section>
</main>
<!-- End #main -->