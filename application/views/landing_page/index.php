<!-- Start slider -->
<section id="aa-slider">
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    <!-- single slide item -->
                    <?php foreach ($hero as $value) : ?>
                    <li>
                        <div class="seq-model">
                            <img class="hero" data-seq src="<?= base_url('assets/hero/') . $value['gambar'] ?>"
                                alt="Wristwatch slide img" />
                        </div>
                        <div class="seq-title">
                            <h2 data-seq><?= $value['title'] ?></h2>
                            <p data-seq><?= $value['subtitle'] ?></p>
                        </div>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- slider navigation btn -->
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
        </div>
    </div>
</section>
<!-- / slider -->

<section id="product">
    <div class="container p-product">
        <h2 class="text-center mt-3">PRODUCT TYPE</h2>
        <div class="row product-area">
            <div class=" col-md-4 col-sm-12 product-type">
                <a href="<?= site_url('landingpage/skincare') ?>">
                    <div class="container-product">
                        <img src="<?= base_url('assets/img/products/skincare.jpg') ?>" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Skincare</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 product-type">
                <a href="<?= site_url('landingpage/bodycare') ?>">
                    <div class="container-product">
                        <img src="<?= base_url('assets/img/products/bodycare.jpg') ?>" alt="Avatar" class="image">
                        <div class="overlay">
                            <div class="text">Bodycare</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-sm-12 product-type">
                <a href="<?= site_url('landingpage/haircare') ?>">
                    <div class="container-product">
                        <img src="<?= base_url('assets/img/products/haircare.jpg') ?>" class="image">
                        <div class="overlay">
                            <div class="text">Haircare</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Support section -->
<section id="aa-support">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-support-area">
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-truck"></span>
                            <h4>FREE SHIPPING</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-clock-o"></span>
                            <h4>30 DAYS MONEY BACK</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                    <!-- single support -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="aa-support-single">
                            <span class="fa fa-phone"></span>
                            <h4>SUPPORT 24/7</h4>
                            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Support section -->
<!-- Testimonial -->
<section id="aa-testimonial">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-testimonial-area">
                    <ul class="aa-testimonial-slider">
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="<?= base_url('assets/admin/') ?>assets/img/profile-img.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>Allison</p>
                                    <span>Designer</span>
                                    <a href="#">Dribble.com</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="<?= base_url('assets/admin/') ?>assets/img/profile-img.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>KEVIN MEYER</p>
                                    <span>CEO</span>
                                    <a href="#">Alphabet</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="<?= base_url('assets/admin/') ?>assets/img/profile-img.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>Luner</p>
                                    <span>COO</span>
                                    <a href="#">Kinatic Solution</a>
                                </div>
                            </div>
                        </li>
                        <!-- single slide -->
                        <li>
                            <div class="aa-testimonial-single">
                                <img class="aa-testimonial-img"
                                    src="<?= base_url('assets/admin/') ?>assets/img/profile-img.jpg"
                                    alt="testimonial img">
                                <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis
                                    possimus, facere, quidem qui.</p>
                                <div class="aa-testimonial-info">
                                    <p>Luner</p>
                                    <span>COO</span>
                                    <a href="#">Kinatic Solution</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / Testimonial -->

</body>

</html>