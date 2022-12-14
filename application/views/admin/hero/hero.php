<main id="main" class="main">
    <div class="pagetitle">
        <h1>Management Hero</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Hero</a></li>
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
                                <h5 class="card-title"> Table Hero Landing Page</h5>
                                <a <?= $this->session->userdata('role_id') == 1 ? 'hidden' : '' ?>
                                    href="<?= site_url('hero/create') ?>">
                                    <button class="btn btn-primary btn-sm mb-3">Tambah Hero</button>
                                </a>
                                <?= $this->session->flashdata('message') ?>
                                </p>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Sub Title</th>
                                            <th scope="col">Gambar Produk</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($hero as $no => $produk) : ?>
                                        <tr>
                                            <th scope="row"><?= $no + 1 ?></th>
                                            <td><?= $produk['title'] ?></td>
                                            <td><?= $produk['subtitle'] ?></td>
                                            <td><img src="<?= base_url('assets/hero/') . $produk['gambar'] ?>"
                                                    width="100px"></td>
                                            <td>
                                                <a href="<?= site_url('hero/show/' . $produk['id']) ?>"><button
                                                        class="btn btn-primary btn-sm"><i class="bi bi-eye"></i>
                                                        Detail</button></a>

                                                <a <?= $this->session->userdata('role_id') == 1 ? 'hidden' : '' ?>
                                                    href="<?= site_url('hero/edit/' . $produk['id']) ?>"><button
                                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i>
                                                        Edit</button></a>
                                                <a <?= $this->session->userdata('role_id') == 1 ? 'hidden' : '' ?>
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus Hero ini di Landing Page?')"
                                                    href="<?= site_url('hero/destroy/' . $produk['id']) ?>"><button
                                                        class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                                        Delete</button></a>
                                                <?php
                                                    if ($produk['status'] == 'Tidak Ditampilkan') {
                                                        echo '<a ' . ($this->session->userdata('role_id') == 2 ? 'hidden' : '') . '  onclick="return confirm("Apakah anda yakin ingin menampilkan Hero ini di Landing Page?")"
                                                            href=' . site_url("hero/tampilkan/" . $produk['id']) . '<button
                                                        class="btn btn-success btn-sm"><i class="bi bi-journal-check"></i>Tampilkan</button></a>';
                                                    } else {

                                                        echo '<a ' . ($this->session->userdata('role_id') == 2 ? 'hidden' : '') . ' onclick="return confirm("Apakah anda yakin ingin menampilkan Hero ini di Landing Page?")"
                                                        href=' . site_url("hero/tidakDitampilkan/" . $produk['id']) . '<button class="btn btn-danger btn-sm"><i class="bi bi-journal-x"></i>Tidak Ditampilkan</button></a>';;
                                                    }
                                                    ?>
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