<?php $this->layout(config('view.layout')) ?>
<?php $this->start('page'); ?>
<link rel="stylesheet" href="assets/css/Signin.css">
<main class="pt-5 form-login container">
    <div class="row">
        <div class="card shadow col-md-6 mx-auto d-block" style="max-width: 34rem;">
            <div class="card-body">
                <a href="/"><img src="assets/images/Logo/L`amour_White.png" class="w-75 img-logo-signin mx-auto d-block mb-3" alt=""></a>
                <div class="container">
                    <div class="mx-auto mb-4">
                        <a href="#"><button class="btn btn-twitter w-100 mb-3 rounded-pill"><i class="fab fa-twitter me-3"></i>Sign up with Twitter</button></a>
                        <a href="#"> <button class="btn btn-google w-100 mb-3 rounded-pill"><i class="fab fa-google me-3"></i>Sign up with Google</button></a>
                        <a href="#"> <button class="btn btn-facebook w-100 mb-3 rounded-pill"><i class="fab fa-facebook me-3"></i>Sign up with Facebook</button></a>
                    </div>
                    <hr>
                    <div class="pb-3 pt-4">
                        <form action="/register" method="POST" id="form_register" novalidate>
                            <div class="bg-light rounded-pill shadow-sm mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="" type="submit" class="btn"><i class="fas fa-info-circle text-dark mx-2"></i></button>
                                    </div>
                                    <input type="text" placeholder="Full name" require aria-describedby="" name="name" class="form-control border-0 bg-light rounded-pill">
                                </div>
                            </div>

                            <div class="bg-light rounded-pill shadow-sm mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="" type="submit" class="btn"><i class="fa fa-user text-dark mx-2"></i></button>
                                    </div>
                                    <input type="text" placeholder="Username" require aria-describedby="" name="username" class="form-control border-0 bg-light rounded-pill">
                                </div>
                            </div>
                            <div class="bg-light rounded-pill shadow-sm mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="" type="text" class="btn"><i class="fas fa-envelope mx-2 text-dark"></i></button>
                                    </div>
                                    <input type="email" placeholder="Email" require aria-describedby="" name="email" class="form-control border-0 bg-light rounded-pill">
                                </div>
                            </div>
                            <div class="bg-light rounded-pill shadow-sm mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="" type="submit" class="btn"><i class="fas fa-lock text-dark mx-2"></i></button>
                                    </div>
                                    <input type="password" placeholder="Password" require aria-describedby="" name="password" class="form-control border-0 bg-light rounded-pill">
                                </div>
                            </div>
                            <div class="bg-light rounded-pill shadow-sm mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="" type="submit" class="btn"><i class="fas fa-lock text-dark mx-2"></i></button>
                                    </div>
                                    <input type="password" placeholder="Confirm Password" require aria-describedby="" id="confirm_password" name="confirm_password" class="form-control border-0 bg-light rounded-pill">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-submit rounded-pill w-100 mb-3">Register</button>
                        </form>
                        <div class="text-start pb-5">
                            <span class="text-muted">Do have an account ?</span> <a href="Signin.html" class="text-decoration-none">Sign in</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<?php $this->stop(); ?>