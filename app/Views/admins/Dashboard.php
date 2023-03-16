<?php $this->layout(config('view.admin')) ?>

<?php $this->start('page') ?>
<div class="col-lg-10 pt-5" style="background-color: #DDDDDD;">
    <div class="container">
        <div class="row row-cols-md-4">
            <div class="col-lg-3">
                <div class="card card-admin-product" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">PRODUCTS</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countProduct ?></h3>
                            </div>
                            <div class="ms-auto"><i class="fab fa-product-hunt fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+5</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Since last month
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-user" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">USERS</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countUser ?></h3>
                            </div>
                            <div class="ms-auto"><i class="fas fa-users fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+5</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Since last month
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-recipt" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">BILLS</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h3 class="card-text w-100"><?= $countBill ?></h3>
                            </div>
                            <i class=""></i>
                            <div class="ms-auto"><i class="fas fa-file-invoice-dollar fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+15</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Last 1 minute
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card card-admin-proceed" style="width: 100%;">
                    <div class="card-body p-4">
                        <h6 class="card-title card-text mb-3">PROCEED</h6>
                        <div class="d-flex mb-3">
                            <div>
                                <h5 class="card-text w-100"><?php $sum = 0;
                                                            foreach ($bills as $bill) {
                                                                if ($bill->status_bill == 'Đã xác nhận') $sum += $bill->total;
                                                            }
                                                            echo $sum; ?>đ</h5>
                            </div>
                            <div class="ms-auto"><i class="fas fa-chart-line fs-1 ms-auto"></i></div>
                        </div>
                        <div class="d-flex mb-2">
                            <div><i class="fas fa-arrow-up fs-6 me-1"></i>
                                <span class="card-text">+500</span>
                            </div>
                            <div class="badge card-text text-wrap pt-2 ms-auto " style="width: 7rem;">
                                Last 1 minute
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop(); ?>