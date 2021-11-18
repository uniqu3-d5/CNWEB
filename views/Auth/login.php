<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <!-- pop up image -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <!-- css link -->
    <link rel="stylesheet" href="/css/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <section class="vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex align-items-center justify-content-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                            class="img-fluid" alt="Phone image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign in</p>
                        <form action="/login" method="POST">
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input name="email" type="email" id="form1Example13" class="form-control form-control-lg" />
                                <label class="form-label" for="form1Example13">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input name="password" type="password" id="form1Example23" class="form-control form-control-lg" />
                                <label class="form-label" for="form1Example23">Password</label>
                            </div>
                            <?php if(isset($_SESSION['errors']['email'])) { ?>
                            <div class="d-flex justify-content-center align-items-center mb-4 text-danger">
                                <p><?= $_SESSION['errors']['email'] ?></p>
                            </div>
                            <?php } ?>
                            <?php if(isset($_SESSION['errors']['password'])) { ?>
                            <div class="d-flex justify-content-center align-items-center mb-4 text-danger">
                                <p><?= $_SESSION['errors']['password'] ?></p>
                            </div>
                            <?php } ?>
                            <div class="d-flex justify-content-around align-items-center mb-4">
                                <a href="/register">Don't have account?</a>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>
    <!-- BT4 -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/jquery.validate.js"></script>

</body>

</html>