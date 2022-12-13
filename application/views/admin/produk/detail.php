<main id="main" class="main">
    <?php foreach ($produk as $data) : ?>
    <a href="<?php if ($data['jenis_id'] == 1) {
                        echo site_url('dashboard/skincare');
                    } else if ($data['jenis_id'] == 2) {
                        echo site_url('dashboard/bodycare');
                    } else {
                        echo site_url('dashboard/haircare');
                    }
                    ?>">
        <i class="bi bi-arrow-left"></i><span> Kembali</span>
    </a>
    <div class="pagetitle mt-4">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Detail Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-12">

                <div class="card px-3">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Produk Details</h5>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url('assets/produk/') . $data['file_gmbr'] ?>" width="200px">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nama Produk</div>
                                            <div class="col-lg-9 col-md-8"><?= $data['nama_produk'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Deskripsi Produk</div>
                                            <div class="col-lg-9 col-md-8"><?= $data['deskripsi'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Stok Produk</div>
                                            <div class="col-lg-9 col-md-8"><?= $data['stok'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Harga Barang</div>
                                            <div class="col-lg-9 col-md-8">Rp.
                                                <?= number_format($data['harga'], 2, ',', '.'); ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Status</div>
                                            <div class="col-lg-9 col-md-8">
                                                <?php
                                                    if ($data['status'] == 'Disetujui') {
                                                        echo '<td><span class="badge bg-success">' . $data['status'] . '</span></td>';
                                                    } else if ($data['status'] == 'Belum disetujui') {
                                                        echo '<td><span class="badge bg-warning">' . $data['status'] . '</span></td>';
                                                    } else {
                                                        echo '<td><span class="badge bg-danger">' . $data['status'] . '</span></td>';
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>


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