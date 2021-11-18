<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- pop up image -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <!-- css link -->
    <link rel="stylesheet" href="/css/style.css?v=2">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light">
        <!-- Container wrapper -->
        <div class="container">
            <a class="navbar-brand mt-2 mt-lg-0" href="/">
                <i class="fas fa-campground"></i> </a>
            <!-- Collapsible wrapper -->
            
            <!-- Collapsible wrapper -->

            <!-- Right elements -->
            <div class="d-flex align-items-center">
                <!-- Avatar -->
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink"
                    role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <img src="<?php if($user->avt) {echo $user->avt; }else{ echo '/img/default.jpg';}?>"
                        class="rounded-circle" height="35" alt="" loading="lazy" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                    <li>
                        <p class="dropdown-item font-weight-bold mb-0"><?=$this->e($user->name)?></p>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/profile">My profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- Right elements -->
        </div>
        <!-- Container wrapper -->
    </nav>
    <br>
    <!-- body -->
    <?=$this->section("page")?>
    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>

                <!-- Github -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                        class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->
                    <div class="row d-flex justify-content-center">
                        <!--Grid column-->
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-auto">
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->

            <!-- Section: Text -->
            <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>
            <!-- Section: Text -->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- BT4 -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- js link -->
    <script src="/js/index.js?v=3"></script>
    <!-- pop js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>

</body>

</html>