<main id="main" class="main">
    <?php foreach ($hero as $data) : ?>
    <a href="<?= site_url('dashboard/hero') ?>">
        <i class="bi bi-arrow-left"></i><span> Kembali</span>
    </a>
    <div class="pagetitle mt-4">
        <h1>Detail</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Detail Hero</li>
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
                                <h5 class="card-title">Hero Details</h5>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <img src="<?= base_url('assets/hero/') . $data['gambar'] ?>" width="200px">
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Title Hero</div>
                                            <div class="col-lg-9 col-md-8"><?= $data['title'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Sub Title Hero</div>
                                            <div class="col-lg-9 col-md-8"><?= $data['subtitle'] ?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Status</div>
                                            <div class="col-lg-9 col-md-8">
                                                <td><span
                                                        class="badge <?= $data['status'] == 'Ditampilkan' ? 'bg-danger' : 'bg-success' ?>">
                                                        <?= $data['status'] ?></span></td>
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