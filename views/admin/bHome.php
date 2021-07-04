<?php
if(!isset($_SESSION)){
    session_start();
}
$Adid = $_SESSION ['Aid'];
$Adname = $_SESSION ['Aname'];
$Ademail = $_SESSION ['Aemail'];
if (isset($_SESSION ['Aid']) && isset($_SESSION ['Aname']) && isset($_SESSION ['Aemail']) ){
    include_once "AdminHeader.php";

    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Home</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Users</span>
                                <span class="info-box-number"> <?php
                                    $list = $dbmanipulate->SearchVia();
                                    $count = 0;
                                    if ($list){
                                        foreach ($list as $value){
                                            $count++;
                                        }
                                        echo $count;
                                    }
                                    ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Post</span>
                                <span class="info-box-number"><?php
                                    $list = $dbmanipulate->viewAllPostForAdmin();
                                    $count = 0;
                                    if ($list){
                                        foreach ($list as $value){
                                            $count++;
                                        }
                                        echo $count;
                                    }
                                    else{
                                        echo " 0 ";
                                    }
                                    ?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Pending Request</span>
                                <span class="info-box-number"><?php
                                    $list = $dbmanipulate->PendingRequest();
                                    $counts = 0;
                                    if ($list){
                                        foreach ($list as $value){
                                            $counts++;
                                        }
                                        echo $counts;
                                    }
                                    else{
                                        echo " 0 ";
                                    }
                                    ?></span>
                            </div>
                        </div>
                    </div>
                  <div class="col-md-3 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Admin</span>
                                <span class="info-box-number"><?php
                                    $list = $dbmanipulate->Admin();
                                    $counts = 0;
                                    if ($list){
                                        foreach ($list as $value){
                                            $counts++;
                                        }
                                        echo $counts;
                                    }
                                    else{
                                        echo " 0 ";
                                    }
                                    ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-2 d-flex justify-content-center swing">
                <img style="width: auto;height: 350px"  src="https://cdn.dribbble.com/users/2181348/screenshots/6270781/cow_gif.gif">
                <img style="width: auto;height: 350px"  src="https://66.media.tumblr.com/5e14d9c75493f89c28223c60837dd4af/tumblr_o9xrsy6tAB1up8zyho1_1280.gif">
            </div>

            <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                 <div class="carousel-inner">
                     <div class="carousel-item active">
                         <img class="d-block w-100"  src="https://cdn.dribbble.com/users/2181348/screenshots/6270781/cow_gif.gif"  height="420px" alt="First slide">
                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100"  src="../../assets/img/slid_3.jpg"  height="420px" alt="Second slide">
                     </div>
                     <div class="carousel-item">
                         <img class="d-block w-100" src="../../assets/img/slid_3.jpg" height="420px" alt="Third slide">
                     </div>
                 </div>
             </div>-->
        </section>
    </div>
    </div>
    <?php
    include_once "AdminFooter.php";
    ?>
        <script>
          /*  $('.carousel').carousel({
                interval: 1500
            })*/
        </script>
    <?php
}
else{
    header("Location: ../login-register/login.php");
}
?>



