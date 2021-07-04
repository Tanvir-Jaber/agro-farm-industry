<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Meid = $_SESSION ['Mid'];
$Mename = $_SESSION ['Mname'];
$Meemail = $_SESSION ['Memail'];
$dbmanipulate = new DataManipulation();
$trueStatus = $dbmanipulate->singleUsers($Meid);
$details = $dbmanipulate->singleUsersDetails($Meid);
if($details){
    $name=$details->name;
    $image=$details->image;
}else{
    $name="";
    $image="";

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Agro Farm Industry</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="../../dist/css/bappi.min.css">

    <style>
        .error{
            color: #e80000;
            display: table;
            border-collapse: collapse;
            width:100%;
            margin: 0px;

        }
        .typewriter h1 {

            overflow: hidden;
            border-right: .10em solid orange;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .10em; /* Adjust as needed */
            animation:
                    typing 3.5s steps(55, end ),
                    blink-caret .75s step-end infinite ;

        }

        /* The typing effect */
        @keyframes typing {
            from { width: 0 }
            to { width: 50% }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {
            from, to { border-color: transparent }
            30% { border-color: orange; }
        }
        .main-sidebar{
            background-color: #89ABE3FF;
        }
        .nav-icon,p, .brand-text,.name-admin{
            color:#FCF6F5FF!important;

        }
        p,.brand-text,.name-admin,body{
            font-family: "Nexa Light";
        }
        .content-wrapper{
            background-color:#FCF6F5FF!important;
        }
        .navbar{
            background-color: #FCF6F5FF !important;
            border-bottom: 1px solid #FCF6F5FF;
        }
        .container-fluid{
            margin-top: -12px!important;
        }
        .container-fluid h1{
            font-weight: bolder;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar">
        <a href="BuyersHome.php" class="brand-link">
            <span style="font-family: 'Quantify'" class="d-flex justify-content-center brand-text">Agro Farm Industry</span>
        </a>
        <div class="sidebar p-2 ">
            <div class="user-panel d-flex pb-2">
                <?php
                if($image){
                    ?>
                    <img style="width: 3.1rem; height: 3.1rem" src="<?php echo $image ?>" class="img-circle elevation-2" alt="User Image">
                    <?php

                }else{
                    ?>
                    <img style="width: 3.1rem; height: 3.1rem" src="../../assets/img/ok-2B.jpg" class="img-circle elevation-2" alt="User Image">
                    <?php
                }
                ?>
                <div style="display: grid" class="info">
                    <span style="display: flex; align-items: center; font-weight: bolder; font-size: 17px; "  class=" name-admin"><?php echo $name ?></span>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav-list-my nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                    <?php
                    $value = $dbmanipulate->singleUsers($Meid);
                    if($value){
                    ?>
                    <li class="nav-item">
                        <a href="BuyersHome.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Chat.php" class="nav-link three">
                            <i class="nav-icon fas fa-trash-restore-alt"></i>
                            <p>
                                Sellers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ManagePost.php" class="nav-link four">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>
                                Manage Post
                            </p>
                        </a>
                    </li>
                        <li class="nav-item">
                            <a href="pending_post.php" class="nav-link four">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Pending Post
                                </p>
                            </a>
                        </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link five">
                            <i class="nav-icon fas fa-lightbulb"></i>
                            <p>
                                Update Profile
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="viewNotice.php" class="nav-link seven">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                View Notice
                            </p>
                            <span style="background: #FCF6F5FF"  class="badge  ml-4">
                                <?php
                                $list = $dbmanipulate->viewNoticeInfo();
                                $count=0;
                                if($list){
                                    foreach ($list as $value){
                                        $count++;
                                    }
                                }
                                echo  $count;
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                          <a href="confirm_product.php" class="nav-link">
                                <i class="nav-icon fas fa-book-dead"></i>
                                <p>
                                    Product Request
                                </p>
                            </a>
                      </li>
                    <li class="nav-item">
                          <a href="request_list.php" class="nav-link">
                                <i class="nav-icon fas fa-save"></i>
                                <p>
                                    Product Confirm
                                </p>
                            </a>
                      </li>
                        <li class="nav-item">
                          <a href="contact_us.php" class="nav-link">
                              <i class=" nav-icon far fa-address-card"></i>
                                <p>
                                    Contact
                                </p>
                            </a>
                      </li>

                    <li class="nav-item">
                        <a href="../process/data-process.php?Alogout=1" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Sign Out
                            </p>
                        </a>
                    </li>
                    <?php
                        }
                        else{
                        ?>
                            <li class="nav-item">
                                <a href="BuyersHome.php" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>
                                        Home
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../process/data-process.php?Alogout=1" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </aside>