<main id="main" class="main">
    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <a href="<?= site_url('dashboard/hero') ?>">
                    <i class="bi bi-arrow-left"></i><span> Kembali</span>
                </a>
                <h5 class="card-title">Form Tambah Hero</h5>
                <?= $this->session->flashdata('message') ?>
                <!-- Vertical Form -->
                <form class="row g-3" method="POST" action="<?= site_url('hero/store') ?>"
                    enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="nama_produk" class="form-label">Title Hero</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title Hero"
                            required>
                        <?= form_error('title'); ?>
                    </div>
                    <div class="col-12">
                        <label for="subtitle" class="form-label">Sub Title Hero</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle"
                            placeholder="Sub Title Hero" required>
                        <?= form_error('subtitle'); ?>
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form><!-- Vertical Form -->

            </div>
        </div>
    </section>
</main>