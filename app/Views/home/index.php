<?php $this->layout(config('view.layout')) ?>

<?php $this->start('page') ?>
<main>
    <!--HomeSlide-->
    <section class="callout position-relative">
        <div class="video-bg">
            <video autoplay loop muted>
                <source src="assets/videos/home.mp4" type="video/mp4">
            </video>
        </div>
        <div class="video-overlay"></div>
        <div class="callout-inner text-center">
            <h1 class="mb-3">L'amour</h1>
            <a href="#" class="text-decoration-none mt-5">
                <div class="btn-home">Khám phá</div>
            </a>
        </div>
    </section>
    <!-- Open -->
    <section class="home-open py-4">
        <div class="container">
            <div class="row row-cols-md-4 p-2 align-items-center justify-content-center">
                <div class="col-lg-3 text-center">
                    <h5 class="text-white"><i class="fas fa-birthday-cake text-warning me-3"></i>L’amour Cake</h5>
                    <p class="text-muted">Welcome to L’amour</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h5 class="text-white"><i class="fas fa-map-marker-alt text-warning me-3"></i>Can Tho University
                    </h5>
                    <p class="text-muted">Q.Ninh Kieu, TP. Can Tho</p>

                </div>
                <div class="col-lg-3 text-center">
                    <h5 class="text-white"><i class="fas fa-clock text-warning me-3"></i>Open Monday-Friday</h5>
                    <p class="text-muted">7:00am - 22:00pm</p>
                </div>
                <div class="col-lg-3 text-center">
                    <h5 class="text-white"><i class="fas fa-phone-alt text-warning me-3"></i>(+84) 77 656 0825</h5>
                    <p class="text-muted">Hotline phone</p>
                </div>
            </div>
        </div>
        <div class="bottom-line">

        </div>
    </section>
    <!-- Special-->
    <section class="home-special py-5" style="background-color: #fff;">
        <div class="container text-center">
            <div class="row heading-section pt-5">
                <div class="row fs-4">
                    <div class="col text-end pe-0">
                        <span>SPECIAL</span>
                    </div>
                    <div class="col text-start ps-0">
                        <span class="special">PRODUCTS</span>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-3 pt-5 row-cols-sm-2 row-cols-1">
                <?php foreach ($products as $product) :?>
                <div class="col-sm">
                    <a href="/productDetail?masp=<?=$product->ID_product?>" class="text-decoration-none text-dark">
                        <div class="card card-product">
                            <?php echo '<img src="assets/images/Products/';
                                if ($product->ID_type == 'L01') { echo 'CAKES/' . $product->image;} 
                                else if ($product->ID_type == 'L02') echo 'CUPCAKES/' . $product->image;
                                else if ($product->ID_type == 'L03') echo 'PIES/' . $product->image;
                                else echo 'SET_CUPCAKES/' . $product->image;
                                echo '" width="90%" alt=""></td>';
                            ?>
                            <div class="card-body text-center">
                                <h3 class="card-text"><?=$product->name_product?></h3>
                                <p class="card-text mb-3"><?=$product->price?>đ</p>
                                <a href="/addCart?ID_product=<?= $product->ID_product ?>"><button class="btn-product">ADD TO CART</button></a>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="home-bst py-5" style="background-color: #fff;">
        <div class="container">
            <div class="row heading-section mt-4 mb-3">
                <div class="row fs-4">
                    <div class="col text-end pe-0">
                        <span>PRODUCTS</span>
                    </div>
                    <div class="col text-start ps-0">
                        <span class="special">COLLECTION</span>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-3 pt-5 row-cols-1">
                <a href="#">
                    <div class="col mb-5">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst1.jpg" class="card-img img-fluid w-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst2.jpg" class="card-img">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst3.jpg" class="card-img img-fluid w-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst4.jpg" class="card-img img-fluid w-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst5.jpg" class="card-img img-fluid w-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="#">
                    <div class="col">
                        <div class="card card-bst bg-dark text-white">
                            <img src="assets/images/Banner/bst6.png" class="card-img img-fluid w-100">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Gateaux Mousse</h5>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        </div>

    </section>
    <section class="callout position-relative">
        <div class="video-bg">
            <video autoplay loop muted>
                <source src="assets/videos/home_2.mp4" type="video/mp4">
            </video>
        </div>
        <div class="video-overlay"></div>
    </section>
</main>
<?php $this->stop() ?>