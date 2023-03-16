<header class="pt-2">
    <div class="container-fluid d-flex flex-wrap justify-content-center pt-2">
        <img src="assets/images/Logo/L`amour_Black.png" class="logo-img me-lg-2 ms-lg-3 mb-lg-0 mb-3" alt="">
        <form action="/search" method="post" class="col-12 col-lg-6 me-lg-5 ms-lg-5 mb-3 pt-lg-2 mb-lg-0 justify-content-center">
            <div class="p-1 bg-light rounded-pill shadow-sm mb-2">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button id="" type="submit" class="btn btn-link text-warning"><i class="fa fa-search"></i></button>
                    </div>
                    <input type="search" name="search" placeholder="What're you searching for?" aria-describedby="" class="form-control border-0 bg-light rounded-pill">
                </div>
            </div>
        </form>
        <ul class="nav header-list text-end pt-lg-2">
            <li class="nav-item"><a href="/cart" class="text-decoration-none nav-link text-nav"><i class="fab fa-shopify fs-4 "></i></a>
            </li>
            <?php
            if (auth()) {
                echo '
                <li class="nav-item"><a href="/login" class="text-decoration-none text-nav nav-link">' . auth()->username . '</a></li>
                <li class="nav-item"><a href="" data-bs-toggle="modal" data-bs-target="#logoutModal" class="text-decoration-none nav-link text-nav">Log out</a></li>
                ';
            } else {
                echo '
                <li class="nav-item"><a href="/login" class="text-decoration-none nav-link text-nav">Sign in</a></li>
                <li class="nav-item"><a href="/register" class="text-decoration-none nav-link text-nav">Register</a></li>
                ';
            }
            ?>
        </ul>
    </div>
</header>
<!--Navbar-->
<nav class="main-menu navbar navbar-expand-lg navbar-light position-sticky" style="top:0; z-index: 1000;">
    <div class="container-fluid">
        <button class="navbar-toggler border-0 " data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link me-4 text-nav" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown text-nav me-4" href="/product" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUCTS
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="/product?malsp=L01">CAKES</a></li>
                        <li><a class="dropdown-item" href="/product?malsp=L02">CUPCAKES</a></li>
                        <li><a class="dropdown-item" href="/product?malsp=L03">PIES</a></li>
                        <li><a class="dropdown-item" href="/product?malsp=L04">SET CUPCAKES</a></li>
                        <li><a class="dropdown-item" href="/product">Tất cả</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="Product.php">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="#">NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="me-4 nav-link text-nav" href="#">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->

<div class="modal fade" id="logoutModal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title ms-3">Sign Out</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body ">
                <h4 class="text-center text-danger">Are you sure?</h4>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="border-1 py-2 p-3 btn-fogot" data-bs-dismiss="modal">
                    <i class="lni lni-close"></i> Cancel
                </button>
                <a href="/logout">
                    <button type="button" class="border-0 py-2 p-3 btn-submit" data-bs-dismiss="modal" onclick="logout(event)">
                        <i class="lni lni-power-switch"></i>Logout
                    </button>
                </a>

            </div>
        </div>
    </div>
</div>