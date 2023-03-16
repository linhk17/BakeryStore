<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 text-center" style="margin-top : 80px; ">
            <?php
              echo '
                    <img src="assets/images/Products/';
                    if ($productDetail->ID_type == 'L01') echo 'CAKES/' . $productDetail->image;
                    else if ($productDetail->ID_type == 'L02') echo 'CUPCAKES/' . $productDetail->image;
                    else if ($productDetail->ID_type == 'L03') echo 'PIES/' . $productDetail->image;
                    else echo 'SET_CUPCAKES/' . $productDetail->image;
                    echo '" alt="" width="70%" />
                 '; 
            ?>
            </div>
            <div class="col-lg-4 p-3 py-5">
                <form action="/addCart" method="post">
                    <h3 class="pt-3"><?= $productDetail->name_product ?></h3>
                    <p class="pt-3 fw-bold h5"><?= $productDetail->price ?> đ</p>
                    <div class="pt-3">
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Size D: 32cm</button>
                    </div>
                    <div class="pt-3"><label>Số lượng: </label>
                        <input type="number" name="soluong" class="text-center ms-4" value="1" min="1" max="20" style="width:50px" />
                    </div>
                    <input type="hidden" value="<?= $productDetail->ID_product ?>" name="ID_product" />
                    <div class="pt-3">
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Egg</button>
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Flour</button>
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Milk </button>
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Fruit</button>
                        <button type="button" class="btn btn-light text-dark me-2 mb-2">Wipping Cream</button>
                    </div>
                    <div class="pt-3"><button type="submit" class="btn-product-detail mb-2 w-100">ADD TO CART</button>
                        <a href="/product"><button class="btn-forgot py-2 w-100 mb-2" type="button">Shopping</button></a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</main>
<?php $this->stop(); ?>