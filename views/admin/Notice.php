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
                        <h1 class="m-0 text-dark">Notice</h1>
                    </div>
                </div>
            </div>
        </div>
        <?php

        if(isset($_SESSION['SuccessMessageForNewNotice'])){
            echo $_SESSION['SuccessMessageForNewNotice'];
            unset($_SESSION['SuccessMessageForNewNotice']);
        }
         if(isset($_SESSION['SuccessMsg'])){
             echo $_SESSION['SuccessMsg'];
             unset($_SESSION['SuccessMsg']);
         }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            <div class="card-body box-profile">
                                <div class="">
                                   <!-- <div class="card-header">
                                        <h3 class="card-title">Notice</h3>
                                    </div>-->
                                    <form action="../process/data-process.php" method="post">
                                        <input type="hidden" name="name" value="<?php echo $Adname?>">
                                        <div class="card-body">
                                            <strong><i class="fas fa-book mr-1"></i>Notice Box</strong>
                                            <input type="text" name="notice_title" class="form-control" placeholder="Please Type your Title" required>
                                            <textarea style="resize: none; height: 150px" name="notice" class="main-search form-control" required></textarea>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <button type="submit" name="addNotice" style="background: #02c27f;border: #00adc2;color: #ffffff;font-weight: bold" class="btn btn-block btn-outline-success"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <?php

        if(isset($_SESSION['inserMsg'])){
            echo $_SESSION['inserMsg'];
            unset($_SESSION['inserMsg']);
        }
        if(isset($_SESSION['updateMsg'])){
            echo $_SESSION['updateMsg'];
            unset($_SESSION['updateMsg']);
        }
        if(isset($_SESSION['deleteMsg'])){
            echo $_SESSION['deleteMsg'];
            unset($_SESSION['deleteMsg']);
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">View Notice..</h3>
                                </div>

                            </div>
                            <div class="card-body">

                            <h5><i class="fas fa-info"></i> View Notice:</h5>
                            <?php
                            $list = $dbmanipulate->viewNoticeInfo();

                            if($list){
                                foreach ($list as $lists){
                                    ?>
                                    <div class="row">
                                        <div class="col-8"><b><?php $date = $lists->date; echo  date(' m/d/Y', strtotime($date));?></b></div>
                                        <div class="col-4 btn-group d-flex justify-content-end" >
                                            <a style="text-decoration: none" href="edit_notice.php?notice_id=<?php echo $lists->no?>" class="btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <a style="text-decoration: none" href="../process/data-process.php?delete_notice=<?php echo $lists->no?>" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>

                                        </div>

                                    </div>
                                    <!--<div class="mb-5 mr-5 d-flex justify-content-end">9/5/2020</div>-->
                                    <div style="text-transform:capitalize;font-weight:bold;white-space:pre-wrap;font-size: 30px; padding-left: 13px"><?php echo $lists->title?></div>
                                    <div style="white-space:pre-wrap;font-size: 17px; padding-left: 13px"><?php echo $lists->notice?></div>
                                    <hr>
                                    <?php
                                }}
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <?php
    include_once "AdminFooter.php";

}
else{
    header("Location: ../login-register/login.php");
}
?>



