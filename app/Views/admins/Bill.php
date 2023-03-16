<?php $this->layout(config('view.admin')) ?>
<?php $this->start('page') ?>
<div class="col-lg-10">
    <div class="container">
        <div class="row mb-3 pt-4">
            <div class="col-md-8">
                <form action="/adminFillBill" method="post">
                    <div class="row">
                        <div class="col-md-6 d-flex">
                            <input type="date" name="date" class="w-100" label="2021-5-5">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn-product justify-content-md-end"><i class="fas fa-filter me-2"></i>Lọc</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2">
            <button type="button" class="btn-product w-100 mb-2">Xuất EXCEL</button>
            </div>
            <div class="col-md-2">
            <button type="button" class="btn-product w-100 mb-2">Xuất PDF</button>
            </div>
        </div>
        <div class="row pt-2">
            <table class="table table-hover rounded text-center align-middle">
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
                    <?php foreach ($bills as $bill) : ?>
                        <tr>
                            <td>
                                <?= $bill->ID_bill ?>
                            </td>
                            <td>
                                <?= $bill->date_time ?>
                            </td>
                            <td>
                                <?= $bill->full_name ?>
                            </td>
                            <td>
                                <?= $bill->address ?>
                            </td>
                            
                            <?php 
                            if ($bill->status_bill == 'Đã xác nhận') 
                                echo '
                                <td> 
                                <div> 
                                    <p class="badge rounded-pill alert-success">'.$bill->status_bill.'</p> 
                                </td>
                                <td>
                                    <a href="/adminBillDetail?detail=' . $bill->ID_bill . '"><i class="fas fa-info-circle text-primary fs-5"></i></a>
                                </td>';
                            else if($bill->status_bill == 'Đang xác nhận')
                                echo '
                                <td> 
                                <div> 
                                    <p class="badge rounded-pill alert-warning">'.$bill->status_bill.'</p> 
                                </div> 
                                </td>
                                <td> 
                                <div> 
                                    <a href="/adminBill?accept=' . $bill->ID_bill . '"><i class="fas fa-check text-success fs-5"></i></a>
                                    <a href="/adminBillDetail?detail=' . $bill->ID_bill . '"><i class="fas fa-info-circle text-primary fs-5 p-3"></i></a>
                                    <a href="/adminBillCancle?del=' . $bill->ID_bill . '"><i class="fas fa-ban text-danger fs-5"></i></a>  
                                </div> 
                                </td>';
                            else
                                echo '
                                <td> 
                                <div>
                                    <p class="badge rounded-pill alert-danger">'.$bill->status_bill.'</p>   
                                </div> 
                                </td>
                                <td>
                                    <a href="/adminBillDetail?detail=' . $bill->ID_bill . '"><i class="fas fa-info-circle text-primary fs-5"></i></a>
                                </td>';
                            ?> 
                            </td>
                           </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php $this->stop(); ?>