<main id="main" class="main">
    <div class="pagetitle">
        <h1>Semua Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
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
                                <h5 class="card-title">Table Produk</h5>

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
                                        foreach ($produk as $no => $all) : ?>
                                        <tr>
                                            <th scope="row"><?= $no + 1 ?></th>
                                            <td><?= $all['nama_produk'] ?></td>
                                            <td><?= $all['stok'] ?></td>
                                            <?php
                                                if ($all['status'] == 'Disetujui') {
                                                    echo '<td><span class="badge bg-success">' . $all['status'] . '</span></td>';
                                                } else if ($all['status'] == 'Belum disetujui') {
                                                    echo '<td><span class="badge bg-warning">' . $all['status'] . '</span></td>';
                                                } else {
                                                    echo '<td><span class="badge bg-danger">' . $all['status'] . '</span></td>';
                                                }
                                                ?>
                                            <td>
                                                <a href="<?= site_url('produk/show/' . $all['id']) ?>"><button
                                                        class="btn btn-success btn-sm"><i class="bi bi-eye"></i>
                                                        Lihat</button></a>
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