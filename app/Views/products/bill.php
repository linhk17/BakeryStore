<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>

<main>
    <div class="container">
        <div class="row pt-5">
            <div class="col-md-8">
                <form action="/userFillBill" method="post">
                    <div class="row row-cols-lg-2">
                        <div class="col-md-6 d-flex">
                            <input type="date" name="date" class="w-100" label="2021-5-5">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn-product justify-content-md-end"><i class="fas fa-filter me-2"></i>Lọc</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row pt-5">
            <div class="container">
              <table class="table table-hover rounded text-center">
                <thead>
                    <th>
                        ID
                    </th>
                    <th>
                        Thời gian
                    </th>
                    <th>
                        Tên người nhận
                    </th>
                    <th>
                        Địa chỉ
                    </th>
                    <th>
                        Trạng thái đơn hàng
                    </th>
                    <th>
                        Thao tác
                    </th>
                </thead>
                <tbody>
                    <?php foreach ($bills_user as $bill) : ?>
                        <tr>
                            <td><?= $bill->ID_bill ?></td>
                            <td><?= $bill->date_time ?></td>
                            <td><?= $bill->full_name ?></td>
                            <td><?= $bill->address ?></td>
                            <td>
                                <?php if ($bill->status_bill == 'Đã xác nhận') {
                                    echo
                                    '<div>
                                    <p class="badge rounded-pill alert-success">' . $bill->status_bill . '</p>
                                </div>
                            ';
                                } else if ($bill['status_bill'] == 'Đã hủy') {
                                    echo '
                                <div>
                                    <p class="badge rounded-pill alert-danger">' . $bill->status_bill . '</p>
                                </div>
                             </td>';
                                } else echo
                                '<div>
                                    <p class="badge rounded-pill alert-warning">' . $bill->status_bill . '</p>
                                </div>
                            </td>';
                                ?>
                            <td>
                                <div>
                                    <a href="/userBillDetail?detail=<?= $bill->ID_bill ?>"><i class="fas fa-info-circle text-primary"></i></a>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>

            </table>  
            </div>
            
        </div>
    </div>
</main>


<?php $this->stop(); ?>