<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Adid = $_SESSION ['Aid'];
$Adname = $_SESSION ['Aname'];
$Ademail = $_SESSION ['Aemail'];
$dbmanipulate = new DataManipulation();
$trueStatus = $dbmanipulate->singleUsers($Adid);
$details = $dbmanipulate->singleUsersDetails($Adid);
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
        .container-fluid h1{
            font-weight: bolder;
        }
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
            background-color: #755139FF;
        }
        .nav-icon,p, .brand-text,.name-admin{
            color:#F2EDD7FF!important;

        }
        p,.brand-text,.name-admin,body{
            font-family: "Nexa Light";
        }
        .content-wrapper{
            background-color:#F2EDD7FF!important;
        }
        .navbar{
            background-color: #F2EDD7FF !important;
            border-bottom: 1px solid #F2EDD7FF;
        }
        .container-fluid{
            margin-top: -12px!important;
        }
        .swing {
            animation: swing ease-in-out 1s infinite alternate;
            transform-origin: center -5px;
            /*float:left;*/
            box-shadow: 0px 0px 0px rgba(0,0,0,0);
        }
        .swing img {
            border: 5px solid #f8f8f8;
            display: block;
        }
        .swing:after{
            content: '';
            position: absolute;
            width: 25px; height: 20px;
            border: 1px solid #999;
            top: -8px; left: 50%;
            z-index: 0;
            border-bottom: none;
            border-right: none;
            transform: rotate(35deg);
        }
        /* nail */
        .swing:before{
            content: '';
            position: absolute;
            width: 20px; height: 5px;
            top: -14px;left: 50%;
            z-index: 5;
            border-radius: 30% 30%;
            background: #000;
        }

        @keyframes swing {
            0% { transform: rotate(1deg); }
            100% { transform: rotate(-1deg); }
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
    <aside class="main-sidebar  elevation-4">
        <a href="bHome.php" class="brand-link">
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
                    <li class="nav-item">
                        <a href="bHome.php" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                            </p>
                        </a>
                    </li>
                    <?php
                    $list = $dbmanipulate->AdminCheck($Adid);
                    if ($list){
                        ?>
                        <li class="nav-item">
                            <a href="view_Admin.php" class="nav-link seven">

                                <i class="nav-icon fas fa-house-damage"></i>
                                <p>
                                    Manage Admin
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="AddAdmin.php" class="nav-link three">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    New Admin
                                </p>
                            </a>
                        </li>
                        <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a href="Notice.php" class="nav-link four">
                            <i class="nav-icon fas fa-user-edit"></i>
                            <p>
                                Notice
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="add_expert.php" class="nav-link three">
                            <i class="nav-icon fas fa-book-open"></i>
                            <p>
                                New Expert
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ManagePost.php" class="nav-link five">
                            <i class="nav-icon fas fa-lightbulb"></i>
                            <p>
                                Manage Post
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="bprofile.php" class="nav-link six">
                            <i class="nav-icon fas fa-user-alt"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="Members.php" class="nav-link seven">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Members List
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="post_approved.php" class="nav-link seven">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Pending Post
                            </p>
                            <span style="background: #F2EDD7FF" class="badge  ml-4">
                                <?php
                                $list = $dbmanipulate->PendingPostCountRequest();
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
                        <a href="PendingRequest.php" class="nav-link eight ">
                            <i class="nav-icon fas fa-apple-alt"></i>
                            <p>
                                Pending Request
                            </p>
                            <span style="background: #F2EDD7FF" class="badge  ml-4">
                                <?php
                                $list = $dbmanipulate->PendingRequest();
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
                        <a href="trash.php" class="nav-link">
                            <i class="nav-icon fas fa-trash-restore"></i>
                            <p>
                                Recover Data
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

                </ul>
            </nav>
        </div>
    </aside>