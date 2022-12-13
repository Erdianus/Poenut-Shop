<main id="main" class="main">
    <div class="pagetitle">
        <h1>Haircare Menu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Haircare</a></li>
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
                                <h5 class="card-title"> Haircare Table</h5>
                                <a href="<?= site_url('produk/createHaircare') ?>">
                                    <button class="btn btn-primary btn-sm mb-3">Tambah Produk</button>
                                </a>
                                <?= $this->session->flashdata('message') ?>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($produk as $no => $haircare) : ?>
                                        <tr>
                                            <th scope="row"><?= $no + 1 ?></th>
                                            <td><?= $haircare['nama_produk'] ?></td>
                                            <td><?= $haircare['stok'] ?></td>
                                            <td><?= $haircare['status'] ?></td>
                                            <td>
                                                <a href="<?= site_url('produk/show/' . $haircare['id']) ?>"><button
                                                        class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                                        Lihat</button></a>
                                                <a href="<?= site_url('produk/edit/' .  $haircare['id']) ?>"><button
                                                        class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i>
                                                        Edit</button></a>
                                                <a onclick="return confirm('Yakin ingin menghapus produk ini?')"
                                                    href="<?= site_url('produk/destroy/' .  $haircare['id']) ?>"><button
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
<!-- End #mainSkin