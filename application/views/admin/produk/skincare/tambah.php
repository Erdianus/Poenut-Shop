<main id="main" class="main">
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="<?= site_url('dashboard/skincare') ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Tambah Produk Skincare</h5>
                <?= $this->session->flashdata('message') ?>
                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?= site_url('produk/store') ?>"
                    enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                            placeholder="Nama Produk" required>
                        <?= form_error('nama_produk'); ?>
                    </div>
                    <div class="col-12">
                        <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"
                            placeholder="Deskripsi Produk Anda" required></textarea>
                        <?= form_error('deskripsi'); ?>
                    </div>
                    <div class="col-12">
                        <label for="stok" class="form-label">Stok Produk</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok Produk"
                            required>
                        <?= form_error('stok'); ?>
                    </div>
                    <div class="col-12">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Produk"
                            required>
                        <?= form_error('harga'); ?>
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <input type="hidden" class="form-control" id="jenis_id" name="jenis_id" value="1" required>
                    <input type="hidden" class="form-control" id="status" name="status" value="Belum disetujui"
                        required>
                    <input type="hidden" class="form-control" id="dibuat_oleh" name="dibuat_oleh"
                        value="<?= $this->session->userdata('id') ?>" required>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form><!-- Vertical Form -->

            </div>
        </div>
    </section>
</main>