<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>
<div class="col-lg-10">
    <div class="container">
        <div class="row mb-3 pt-4">
            <div class="col-md-6">
                <form action="/adminFillProduct" method="post">
                    <div class="row row-cols-lg-2">
                        <div class="col-md-6 d-flex">
                            <select class="form-select" name="opt_type">

                                <?php
                                if (isset($name_type)) {
                                    echo '<option >' . $name_type . '</option>';
                                } else echo '<option value="All">Tất cả</option>'
                                ?>

                                <option value="L01">Cakes</option>
                                <option value="L02">Cup Cakes</option>
                                <option value="L03">Pies</option>
                                <option value="L04">Set Cup Cakes</option>
                                <option value="All">Tất cả</option>
                            </select>
                        </div>
                        <div class="col-md-3 me-0">
                            <button type="submit" class="btn-product justify-content-md-end"><i class="fas fa-filter me-3"></i>Lọc</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-2">
                <button type="button" data-bs-toggle="modal" data-bs-target="#insert" class="btn-product w-100"><i class="fas fa-plus me-2"></i>Thêm</button>
            </div>
            <div class="col-md-2">
            <button type="button" class="btn-product w-100 mb-2">Xuất EXCEL</button>
            </div>
            <div class="col-md-2">
            <button type="button" class="btn-product w-100 mb-2">Xuất PDF</button>
            </div>


        </div>

        <div class="row pt-3">
            <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Hình ảnh
                    </th>
                    <th>
                        Tên
                    </th>
                    <th>Giá</th>
                    <th>
                        Thao tác
                    </th>
                    <th></th>
                </thead>
                <tbody class="product-table">
                    <?php foreach ($products as $product) : ?>
                        <tr class="align-middle">
                            <td><?= $product->ID_product ?></td>
                            <td class="w-25">
                                <?php echo '<img src="assets/images/Products/';
                                if ($product->ID_type == 'L01') { echo 'CAKES/' . $product->image;} 
                                else if ($product->ID_type == 'L02') echo 'CUPCAKES/' . $product->image;
                                else if ($product->ID_type == 'L03') echo 'PIES/' . $product->image;
                                else echo 'SET_CUPCAKES/' . $product->image;
                                echo '" width="45%" alt=""></td>';
                                ?>
                            <td><?= $product->name_product ?></td>
                            <td><?= $product->price ?>đ</td>
                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#<?= $product->ID_product ?>"><i class="fas fa-edit text-dark"></i></a></td>
                            <td>
                                <a href="/adminDelete?del=<?= $product->ID_product ?>">
                                    <div class="btn btn-close" aria-label="Close"></div>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Button trigger modal -->

        <?php foreach ($products as $product) : ?>
            <!-- Modal -->
            <div class="modal fade" id="<?= $product->ID_product ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/adminUpdate" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cập nhật thông tin sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-2">
                                    <label class="form-label" for="msp">Mã sản phẩm</label>
                                    <input type="text"  class="form-control" name="" value="<?= $product->ID_product ?>" disabled>
                                    <input type="hidden"  class="form-control" name="ID" value="<?= $product->ID_product ?>">
                                </div>
                                <div class="mb-2">
                                    <select class="form-select" name="opt_edit">
                                        <option value="<?= $product->ID_type?>"><?= $product->ID_type?></option>
                                        <option value="L01">L01</option>
                                        <option value="L02">L02</option>
                                        <option value="L03">L03</option>
                                        <option value="L04">L04</option>
                                        <option value="All">Tất cả</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label for="tsp" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="name" value="<?= $product->name_product ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="money" class="form-label">Giá sản phẩm</label>
                                    <input type="text" class="form-control" name="price" value="<?= $product->price ?>">
                                </div>
                                <!-- <div class="mb-2">
                                    <label for="money" class="form-label">Hình ảnh</label>
                                    <input type="file" class="form-control" name="image" value="<?= $product->image ?>">
                                </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn-forgot py-2" data-bs-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn-submit border-0 p-3 py-2">Cập nhật</button>
                            </div>
                        </form>



                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/adminInsert" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="tsp" class="form-label">Mã sản phẩm</label>
                                <input type="text" require class="form-control" name="ID" value="">
                            </div>
                            <div class="mb-2">
                                <label for="tsp" class="form-label">Tên sản phẩm</label>
                                <input type="text" require class="form-control" name="name" value="">
                            </div>
                            <div class="mb-2">
                                <label for="money" class="form-label">Giá sản phẩm</label>
                                <input type="text" require class="form-control" name="price" value="">
                            </div>
                            <div class="mb-2">
                                <label for="money" class="form-label">Loại sản phẩm</label>
                                <select class="form-select" require name='opt'>
                                    <option selected>Chọn</option>
                                    <option value="L01">CAKES</option>
                                    <option value="L02">CUPCAKES</option>
                                    <option value="L03">PIES</option>
                                    <option value="L04">SET CUP CAKE</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="money" class="form-label">Hình ảnh</label>
                                <input type="file" require class="form-control" name="image" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn-forgot py-2" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn-submit border-0 p-3 py-2">Thêm</button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <?php $this->stop(); ?>