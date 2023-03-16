<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 mt-2">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none text-secondary">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-3 pt-3 text-center menu">
            <ul class="list-group position-sticky" style="top: 12%; z-index: 900;">
                <li class="p-2 title-list-group text-title border-0 justify-content-between align-items-center ">
                    <h3 class="">Menu</h3>
                </li>
                <?php foreach ($typeProduct as $type) : ?>
                    <a href="/product?malsp=<?= $type->ID_type ?>" class="text-decoration-none">
                        <li class="list-group-item p-3 d-flex border-0 border-bottom justify-content-between align-items-center">
                            <span><?= $type->name_type ?></span>
                            <span class="badge text-menu rounded-pill">
                                <?php
                                if ($type->ID_type == 'L01') echo $cakes;
                                else if ($type->ID_type == 'L02') echo $cupcakes;
                                else if ($type->ID_type == 'L03') echo $pies;
                                else echo $set_cupcakes;
                                ?>
                            </span>
                        </li>
                    </a>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-9">
            <div class="pt-3">
                <div class="row row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <?php foreach ($products as $product) : ?>
                        <div class="col-sm">
                            <a href="/productDetail?masp=<?= $product->ID_product ?>" class="text-decoration-none text-dark">
                                <div class="card card-product">
                                    <?php echo '<img src="assets/images/Products/';
                                    if ($product->ID_type == 'L01') {
                                        echo 'CAKES/' . $product->image;
                                    } else if ($product->ID_type == 'L02') echo 'CUPCAKES/' . $product->image;
                                    else if ($product->ID_type == 'L03') echo 'PIES/' . $product->image;
                                    else echo 'SET_CUPCAKES/' . $product->image;
                                    echo '" width="90%" alt=""></td>';
                                    ?>
                                    <div class="card-body text-center">
                                        <h3 class="card-text"><?= $product->name_product ?></h3>
                                        <p class="card-text mb-3"><?= $product->price ?>đ</p>
                                        <a href="/addCart?ID_product=<?= $product->ID_product ?>"><button class="btn-product">ADD TO CART</button></a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->stop(); ?>