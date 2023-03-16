<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>

<div class="col-lg-10 col-sm-12">
    <div class="container">
        <div class="col-md-2">
            <a href="/adminBill"> <button type="button" class="btn-product w-25 mb-2 mt-3 justify-content-md-end">
                    <i class="fas fa-arrow-left fs-5"></i></button></a>
                    
        </div>
        <div class="row pt-5">
            <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        Mã sản phẩm
                    </th>
                    <th>
                        Hình ảnh
                    </th>
                    <th>
                        Tên sản phẩm
                    </th>
                    <th>
                        Số lượng
                    </th>
                    <th>
                        Đơn giá
                    </th>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($details as $detail) {
                        $sum = 0;
                        $sum = $sum + $detail->quanlity * $detail->price;
                        $total = $total + $sum;
                        echo '<tr class="align-middle">
                            <td>' . $detail->ID_product . '</td>
                            <td class="w-25"><img src="assets/images/Products/';
                        if ($detail->ID_type == 'L01') echo 'CAKES/' . $detail->image;
                        else if ($detail->ID_type == 'L02') echo 'CUPCAKES/' . $detail->image;
                        else if ($detail->ID_type == 'L03') echo 'PIES/' . $detail->image;
                        else echo 'SET_CUPCAKES/' . $detail->image;
                        echo '"alt="" width="100%" height="150vh">
                            </td>
                            <td>' . $detail->name_product . '</td>
                            <td>' . $detail->quanlity . ' </td>
                            <td>' . $detail->price . 'đ</td>
                            </tr>
                </tbody>
                ';
                    }
                echo  '<tfoot>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h5 >Tổng tiền :</h5></td>
                        <td class="py-3"><h5 >' . $total . ' đ</h5></td>';

                    ?>
                    </tfoot>
            </table>
        </div>

    </div>

    <?php $this->stop(); ?>