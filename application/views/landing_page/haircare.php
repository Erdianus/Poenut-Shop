<section id="product">
    <div class="container">
        <div class="py-5">
            <div class="mb-5 mx-5 text-center">
                <h1><Strong>Haircare Product</Strong></h1>
            </div>
            <div class="row mx-5">
                <?php foreach ($haircare as $value) : ?>
                <div class="d-flex justify-content-evenly col-lg-4">
                    <div class="card " style="width: 30rem;">
                        <img src="<?= base_url('assets/produk/') . $value['file_gmbr'] ?>" class="card-img-top">
                        <div class="card-body pt-5">
                            <h2 class="card-title"><strong><?= $value['nama_produk'] ?></strong></h2>
                            <p><?= $value['deskripsi'] ?></p>
                            <h3>Rp. <?= number_format($value['harga'], 2, ',', '.'); ?></h3>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>