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
                            <div class="widget-user-header text-white" style="background: url('../../assets/img/photo1.png')">
                                <h3 class="widget-user-username text-right"><?php echo $Adname ?></h3>
                                <h5 class="widget-user-desc text-right">Admin</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="../../assets/img/ok-2B.jpg" alt="User Avatar">
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
                                                $value = $dbmanipulate->PendingPostCountRequest();
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
                                            <span class="description-text">Total Pending Post</span>
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
                        $listOfValues = $dbmanipulate->viewAllPendingRequestPostForAdmin();
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
                                            <div class="image-holder">
                                                <video width="580" height="400" controls>
                                                    <source src="<?php echo $listOfValues->image?>" type="video/mp4"><source src="<?php echo $listOfValues->image?>" type="video/ogg">
                                                    Your browser does not support HTML video.
                                                </video>
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="../process/data-process.php?managePostDelete=<?php echo $listOfValues->no; ?>" class="btn btn-info btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                            <a href="../process/data-process.php?AdminPendingPostRequest=<?php echo $listOfValues->no; ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Accept</a>
                                        </div>

                                    </div>
                                </div>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <div class="typewriter d-flex justify-content-center mt-5">
                                <h1>There is no post.</h1>
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" name="btn-save-changes" class="btn btn-primary">Save changes</button>
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
    include_once "AdminFooter.php";
    ?>
    <script>

        $("#toast-container").fadeOut(3000)

        /*$(".editPost").click(function () {
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
        })*/
    </script>

    <?php
}
else{
    header("Location: ../login-register/login.php");
}
?>

