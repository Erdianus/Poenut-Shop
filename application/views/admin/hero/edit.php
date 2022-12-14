<main id="main" class="main">
    <?php
    foreach ($hero as $data) : ?>
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="<?= site_url('dashboard/hero'); ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Edit Produk</h5>
                <?= $this->session->flashdata('message') ?>

                <!-- Vertical Form -->

                <form class="row g-3" method="POST" action="<?= site_url('hero/update') ?>"
                    enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $data['id'] ?>" required>
                    <div class="col-12">
                        <label for="title" class="form-label">Title Hero</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title Produk"
                            value="<?= $data['title'] ?>">
                        <?= form_error('harga'); ?>
                    </div>
                    <div class="col-12">
                        <label for="subtitle" class="form-label">Sub Title Hero</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            value="<?= $data['subtitle'] ?>" placeholder="Sub Title Hero" required>
                        <?= form_error('subtitle'); ?>
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                        <p>*max 1 mb</p>
                    </div>
                    <input type="hidden" class="form-control" id="status" name="status" value="<?= $data['status'] ?>"
                        required>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>

                <!-- Vertical Form -->

            </div>
        </div>
    </section>
    <?php endforeach ?>
</main>