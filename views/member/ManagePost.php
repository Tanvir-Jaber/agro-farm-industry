<?php
if(!isset($_SESSION)){
    session_start();
}
$Meid = $_SESSION ['Mid'];
$Mename = $_SESSION ['Mname'];
$Meemail = $_SESSION ['Memail'];
if (isset($_SESSION ['Mid']) && isset($_SESSION ['Mname']) && isset($_SESSION ['Memail']) ){
    include_once "BuyersHeader.php";
    $trueStatus = $dbmanipulate->singleUsers($Meid);
    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Post</h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_SESSION['TostUpdate'])){
            echo $_SESSION['TostUpdate'];
            unset($_SESSION['TostUpdate']);
        }
        ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-widget widget-user shadow">
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username"><?php echo $Mename ?></h3>
                                <h5 class="widget-user-desc">Buyers</h5>
                            </div>
                            <div class="widget-user-image">
                                <?php
                                if($trueStatus->image){
                                    ?>
                                    <img style="width: 6.1rem; height: 6.1rem" src="<?php echo $trueStatus->image?>" class="img-circle elevation-2" alt="User Image">
                                    <?php

                                }else{
                                    ?>
                                    <img style="width: 6.1rem; height: 6.1rem" src="../../assets/img/ok-2B.jpg" class="img-circle elevation-2" alt="User Image">
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header"><?php
                                                $value = $dbmanipulate->viewPostByUserId($Meid);
                                                $count = 0;
                                                if($value){
                                                    foreach ($value as $values){
                                                        $count++;
                                                    }
                                                    echo $count;
                                                }
                                                else{
                                                    echo $count;
                                                }
                                                ?></h5>
                                            <span class="description-text">Total Post</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 timeline">
                        <?php
                        $listOfValues = $dbmanipulate->viewPostByUserId($Meid);
                        if ($listOfValues){
                            foreach ($listOfValues as $listOfValues){
                                ?>

                                <div class="time-label">
                                    <span class="bg-red"><?php echo $listOfValues->date?></span>
                                </div>
                                <div>
                                    <i class="fas fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> <?php echo $listOfValues->time?></span>
                                        <h3 class="timeline-header"><?php echo $listOfValues->name?></h3>

                                        <div class="timeline-body">
                                            <p style="color:black!important;font-weight: bold; font-size: 30px"><?php echo $listOfValues->title ?></p>
                                            <p style="color:black!important;"><?php echo nl2br($listOfValues->post) ?></p>
                                            <!--<img width="580px" height="400px" src="<?php /*echo $listOfValues->image */?>">-->
                                            <video width="580" height="400" controls>
                                                <source src="<?php echo $listOfValues->image?>" type="video/mp4"><source src="<?php echo $listOfValues->image?>" type="video/ogg">
                                                Your browser does not support HTML video.
                                            </video>

                                        </div>
                                        <div class="timeline-footer">
                                            <a data-id = "<?php echo $listOfValues->no ?>"class="btn btn-info btn-sm editPost" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-pencil-alt"></i> Edit</a>
                                            <a href="../process/data-process.php?managePostDelete=<?php echo $listOfValues->no; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"> </i> Delete</a>
                                        </div>

                                    </div>
                                </div>

                                <?php

                                 if ($listOfValues->commentNo == NULL ){
                                     $comment = $dbmanipulate->viewPostComment($listOfValues->no);
                                     foreach ($comment as $comments){
                                         if($listOfValues->no == $comments->commentNo ) {
                                             ?>
                                             <div>
                                                 <i class="fas fa-comments bg-yellow"></i>
                                                 <div class="timeline-item">
                                                     <span class="time"><i class="fas fa-clock"></i> <?php echo $comments->date," ",$comments->time ; ?></span>
                                                     <h3 class="timeline-header"><?php echo "<b>", $comments->name,"</b>"; ?></h3>
                                                     <div class="timeline-body">
                                                         <?php echo $comments->post; ?>

                                                     </div>
                                                 </div>
                                             </div>
                                             <?php
                                         }
                                     }
                                 }
                                ?>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div class="typewriter d-flex justify-content-center mt-5">
                                <h1>You Have No Post.</h1>
                            </div><?php
                        }
                        ?>
                    </div>
                    <form action="../process/data-process.php" method="post">
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div style="min-height: 250px" class="modal-body">
                                        <textarea name="updatePostDataSection" class="updatePostDataSection" style="resize: none; width: 100%;height: 240px"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="user_no_from" class="user_no_from">
                                        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
                                        <button type="submit" name="btn-save-changes" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

            </div>
        </section>

    </div>
    </div>
    <?php
    include_once "BuyersFooter.php";
    ?>
    <script>

        $("#toast-container").fadeOut(3000)

        $(".editPost").click(function () {
            var value = $(this).attr('data-id');
            var postDataCollect = " ";
            $.ajax({
                type: "POST",
                url: "../process/data-process.php",
                data: {
                    value: value,
                    postDataCollect :postDataCollect
                },
                success: function(data)
                {
                    var data = JSON.parse(data);

                    $(".updatePostDataSection").val(data.post)
                    $(".user_no_from").val(data.no)

                }
            });
        })
    </script>

    <?php
}
else{
    header("Location: ../login-register/login.php");
}
?>

