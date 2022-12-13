<main id="main" class="main">
    <?php
    foreach ($produk as $data) : ?>
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="
                <?php
                if ($data['jenis_id'] == 1) {
                    echo site_url('dashboard/skincare');
                } else if ($data['jenis_id'] == 2) {
                    echo site_url('dashboard/bodycare');
                } else {
                    echo site_url('dashboard/haircare');
                }
                ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Edit Produk</h5>
                <?= $this->session->flashdata('message') ?>

                <!-- Vertical Form -->

                <form class="row g-3" method="POST" action="<?= site_url('produk/update') ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" required>
                    <div class="col-12">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control <?= form_error('nama_produk') ? 'invalid' : '' ?>"
                            id="nama_produk" name="nama_produk" placeholder="Nama Produk"
                            value="<?= $data['nama_produk'] ?>">
                        <?php if (form_error('nama_produk')) {
                                echo '<div class="invalid-feedback">';
                                echo form_error('nama_produk');
                                echo '</div';
                            }
                            ?>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"
                            placeholder="Deskripsi Produk Anda" required><?= $data['deskripsi'] ?></textarea>
                        <div class="invalid-feedback"><?= form_error('deskripsi') ?></div>
                    </div>
                    <div class="col-12">
                        <label for="stok" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['stok'] ?>"
                            placeholder="Stok Produk" required>
                        <?= form_error('stok'); ?>
                    </div>
                    <div class="col-12">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['harga'] ?>"
                            placeholder="Harga Produk" required>
                        <?= form_error('harga'); ?>
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <input type="hidden" class="form-control" id="jenis_id" name="jenis_id"
                        value="<?= $data['jenis_id'] ?>" required>
                    <input type="hidden" class="form-control" id="status" name="status" value="<?= $data['status'] ?>"
                        required>
                    <input type="hidden" class="form-control" id="dibuat_oleh" name="dibuat_oleh"
                        value="<?= $this->session->userdata('id') ?>" required>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

                <!-- Vertical Form -->

            </div>
        </div>
    </section>
    <?php endforeach ?>
</main>