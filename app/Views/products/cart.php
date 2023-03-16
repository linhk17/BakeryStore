<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<main>
    <div class="container">
        <div class="row">
            <div class=" justify-content-center text-center pb-5">
                <img src="assets/images/logo/hereu_watch_white.jpg" width="20%" alt="">
            </div>
            <div class="col-lg-8 col-12">
                <table class="table table-hover text-end">
                    <thead>
                        <th class="text-center">Sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($carts as $cart) : ?>
                            <tr class="align-self-center align-middle">
                                <td class="text-start">
                                    <a href="/productDetail?masp=<?= $cart->ID_product ?>" class="text-decoration-none text-dark">
                                        <?php
                                        $sum = $cart->price * $cart->quanlity;
                                        $total += $sum;
                                        echo '<img src="assets/images/Products/';
                                        if ($cart->ID_type == 'L01') echo 'CAKES/' . $cart->image;
                                        else if ($cart->ID_type == 'L02') echo 'CUPCAKES/' . $cart->image;
                                        else if ($cart->ID_type == 'L03') echo 'PIES/' . $cart->image;
                                        else echo 'SET_CUPCAKES/' . $cart->image;
                                        echo '" alt="" width="50%" height="150vh"/></a>';
                                        ?>
                                        <span class="pt-5"><?= $cart->name_product ?></span>
                                </td>
                                <td class="fs-6"><?= $cart->price ?>đ</td>
                                <td class=""><?= $cart->quanlity ?></td>
                                <td class=""><?= $sum ?>đ</td>
                                <td class=""><a href="/deleteCart?delete=<?= $cart->ID_product ?>">
                                        <button type="button" class="btn-close" aria-label="Close"></button></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4 col-12">
                <div class="card shadow-sm" style="max-width: 29rem;">
                    <div class="card-body">
                        <h5 class="card-title border-bottom py-3">Thông tin đơn hàng</h5>
                        <div class="card-subtitle">
                            <div class="d-flex border-bottom py-2">
                                <div class="p-2">Tổng tiền : </div>
                                <div class="ms-auto p-2 text-danger"><?= $total ?> đ</div>
                            </div>
                        </div>
                        <p class="card-text py-3">Phí vận chuyển sẽ được tính ở trang thanh toán.
                            Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</p>
                        <button type="button" class="border-0 btn-submit py-2 w-100 mb-2" data-bs-toggle="modal" data-bs-target="#pay">Đặt hàng</button>
                        <?php
                        if (auth()) {
                            echo '<a href="/bill?user=' . auth()->username . '"><button class="btn-forgot py-2 w-100 mb-2">Danh sách đơn hàng</button></a>';
                        }
                        ?>

                        <a href="/product"><button class="btn-forgot py-2 w-100 mb-2">Tiếp tục mua
                                hàng</button></a>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="/pay" method="post" style="width:30rem;">
                        <input type="hidden" name="magh" value="<?= $carts[0]['ID_cart'] ?>" />
                        <input type="hidden" name="makh" value="<?= $ID_user ?>" />
                        <input type="hidden" name="tongtien" value="<?= $total ?>" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label class="form-label">Họ tên</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ghi chú (nếu có):</label>
                                    <input type="text" name="note" class="form-control" id="exampleFormControlInput1">
                                </div>
                                <div class="mb-3">
                                    <h6>Phương thức thanh toán</h6>
                                    <button type="button" class="btn-momo py-2">MoMo</button>
                                    <button type="button" class="btn-bank py-2">Thẻ tín dụng</button>
                                    <button type="button" class="btn-pay py-2">Thanh toán trực tiếp</button>
                                </div>
                                <div class="d-flex py-2">
                                    <div class="p-2">Tổng tiền : </div>
                                    <div class="ms-auto p-2 text-danger"><?= $total ?> đ</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-forgot py-2" data-bs-dismiss="modal">Thoát</button>
                                <button type="submit" class="btn-submit border-0 py-2">Thanh toán</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
<?php $this->stop(); ?>