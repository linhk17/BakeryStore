<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <link rel="stylesheet" href="assets/css/glightbox.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="assets/css/Style.css">
    <link rel="stylesheet" href="assets/css/Signin.css">
    <title><?= config('app.APP_NAME') ?></title>
    <!-- insert specific page's css -->
    <?= $this->section('css') ?>
</head>

<body>
    <!-- Header section -->
    <?= $this->insert('layouts/header'); ?>

    <!-- Content section -->
    <?= $this->section('page') ?>
    
    
    <div class="position-fixed" style="bottom:50px;right:50px;z-index:1000;">
        <i class="fas fa-chevron-circle-up fs-2" style="color:#FFD07F;" id="on-top"></i>
    </div>
    <!-- Footer section -->
    <?= $this->insert('layouts/footer'); ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?= $this->insert('layouts/notifications'); ?>
    <!-- insert specific page's scripts -->
    <?= $this->section('js') ?>
    
</body>


<script>
    $(document).ready(function() {
        $('#on-top').hide();
        $(window).scroll(function() {
            if ($(window).scrollTop() < 200)
                $('#on-top').hide();
            else $('#on-top').show();
        })
        $('#on-top').click(function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        })
    })
</script>

</html>