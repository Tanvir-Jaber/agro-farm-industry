<?php

if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['m'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Online Agro Farm Industry</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="../../dist/css/bappi.min.css">
        <style>
            body {
                background-image: url('https://c4.wallpaperflare.com/wallpaper/208/132/901/leaves-light-green-background-wallpaper-preview.jpg')!important;
                background-repeat: no-repeat!important;
                background-attachment: fixed!important;
                background-size: cover!important;
                overflow: hidden;
            }
            .card{
                background-color: rgb(241, 241, 241);
            }
            .error{
                color: #e80000;
                display: table;
                border-collapse: collapse;
                width:100%;
                margin: 0px;
            }
            .input-group-text{
                width: 42px;
                background: #1f7e00;
                color: aliceblue;
            }
            .card-header a:hover{
                color: dimgray;
            }
        </style>
    </head>
    <body class="hold-transition login-page" >
    <div class="login-box">
        <div class="card callout callout-success" >
            <div class="card-header text-center">
                <a href="#" class="h1" style="font-family: Antonio"><b>Online Agro </b><br>Farm Industry</a>
            </div>
            <?php
            if(isset($_SESSION['errorMessageVerification'])){
                echo $_SESSION['errorMessageVerification'];
                unset($_SESSION['errorMessageVerification']);
            }
            ?>
            <div class="card-body">
                <p class="login-box-msg">We have sent otp on your email address</p>
                <form autocomplete="off" id="verification" action="../process/data-process.php" method="post">
                    <div class="input-group mb-3">
                        <input type="hidden" class="form-control" name="mail" value="<?php echo $_SESSION['m']?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="otp" placeholder="OTP">

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="verification-btn" style="background: #1f7e00;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-danger btn-block"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i>Verification</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/bappi.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $("#verification").validate({
            rules:{
                otp: {
                    required: true,
                    minlength:6,
                    maxlength:6
                }
            },

            messages:{
                otp: {
                    required: "Please enter your valid one time password",
                    minlength: "Please enter your valid one time password",
                    maxlength:"Sorry. Your one time password should be six digit"
                }
            }
        });
    </script>

    </body>
    </html>

    <?php
}
else{
    header("Location: login.php");
}
?>
