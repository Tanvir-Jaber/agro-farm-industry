<?php
if(!isset($_SESSION)){
    session_start();
}
$Meid = $_SESSION ['Mid'];
$Mename = $_SESSION ['Mname'];
$Meemail = $_SESSION ['Memail'];
if (isset($_SESSION ['Mid']) && isset($_SESSION ['Mname']) && isset($_SESSION ['Memail']) ){
    include_once "BuyersHeader.php";
    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Notice Section</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout" >
                            <h3>Admin Notice</h3>



                            <?php
                            $notice = $dbmanipulate->viewNoticeInfo();

                            if($notice){
                                foreach ($notice as $list){
                                    $date=$list->date;
                                    $dateArray = explode("-",$date);

                                    $dateRevers= array_reverse($dateArray);
                                    $stringDate = implode("-", $dateRevers);
                                    ?>

                                        <div class="row">
                                            <div class="col-8">
                                                <strong style="color: #28a745"><?php echo"Date:- ". $list->date?></strong><span style="font-size: 20px; color: #a71d2a">
                                                <p style="color:black!important;font-weight:bold;white-space:pre-wrap;font-size: 30px;"><?php echo $list->title?></p>
                                            </div>
                                            <br>
                                            <div class="mb-2" style="white-space:pre-wrap;font-size: 17px; padding-left: 13px"><?php echo $list->notice?></div>
                                        </div>

                                        <p style="text-align: justify;margin-bottom: 50px; border-bottom: 2px solid #88151e">

                                        </p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </section>
    </div>
    <?php
    include_once "BuyersFooter.php";
}
else{
    header("Location: ../login-register/login.php");
}
?>
