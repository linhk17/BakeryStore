<div class="col-lg-2 p-4 position-sticky" style="background-color: #000;height:100vh;top:0">
    <div class="admin-menu" style="width: 100%; ">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 text-decoration-none border-bottom">
            <svg class="bi me-2" width="30" height="24">
                <use xlink:href="#bootstrap"></use>
            </svg>
            <span class="fs-5 fw-semibold admin-text">Menu</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <a href="/admin">
                    <button class="btn btn-toggle admin-text align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        <i class="fas fa-tachometer-alt text-success me-3"></i>Dashboard
                    </button>
                </a>
            </li>
            <li class="mb-1">
                <a href="/adminProduct">
                    <button class="btn btn-toggle admin-text align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        <i class="fas fa-file-invoice me-3 text-primary"></i> Product
                    </button>
                </a>
            </li>
            <li class="mb-1">
                <a href="/adminBill">
                    <button class="btn btn-toggle admin-text align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="false">
                        <i class="fas fa-file-invoice-dollar me-3 text-warning"></i> Bill
                    </button>
                </a>
            </li>
            <li class="mb-1">
                <a href="/adminUser">
                    <button class="btn btn-toggle admin-text align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#product-collapse" aria-expanded="false">
                        <i class="fas fa-users me-3 text-info"></i> User
                    </button>
                </a>
            </li>
            
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle admin-text align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    <?php 
                    if (auth()){
                        echo auth()->username;
                    }
                    ?>
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#" class="link-dark rounded">New...</a></li>
                        <li><a href="#" class="link-dark rounded">Profile</a></li>
                        <li><a href="#" class="link-dark rounded">Settings</a></li>
                        <li><a href="/logout" class="link-dark rounded">Sign out</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>