<main id="main" class="main">
    <div class="pagetitle">
        <h1>Approval Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Approval</a></li>
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
                                <h5 class="card-title"> Table Approval</h5>
                                <?= $this->session->flashdata('message') ?>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Jenis Produk</th>
                                            <th scope="col">Gambar Produk</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($products as $no => $produk) : ?>
                                        <tr>
                                            <th scope="row"><?= $no + 1 ?></th>
                                            <td><?= $produk['nama_produk'] ?></td>
                                            <td><?= $produk['stok'] ?></td>
                                            <td>Rp. <?= number_format($produk['harga'], 2, ',', '.'); ?></td>
                                            <td><?= $produk['jenis_produk'] ?></td>
                                            <td><img width="60px"
                                                    src="<?= base_url('assets/produk/') . $produk['file_gmbr'] ?>">
                                            </td>
                                            <td>
                                                <a href="<?= site_url('produk/approved/' . $produk['id']) ?>"><button
                                                        class="btn btn-success btn-sm"><i
                                                            class="bi bi-journal-check"></i>
                                                        Setujui</button></a>
                                                <a href="<?= site_url('produk/rejected/' . $produk['id']) ?>"><button
                                                        class="btn btn-danger btn-sm"><i class="bi bi-journal-x"></i>
                                                        Ditolak</button></a>
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