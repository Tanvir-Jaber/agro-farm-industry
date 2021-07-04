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
    $details = $dbmanipulate->singleUsersDetails($Meid);
    ?>
    <style>
        .profile-badge{
            border:1px solid #c1c1c1;
            padding:5px;
            position: relative;
        }
        .profile-pic{
            position: absolute;
            height:120px;
            width:120px;
            left: 50%;
            transform: translateX(-50%);
            top: 0px;
            z-index: 1001;
            padding: 10px;
        }
        .profile-pic img{

            border-radius: 50%;
            box-shadow: 0px 0px 5px 0px #c1c1c1;
            cursor: pointer;
            width: 100px;
            height: 100px;
        }
        .hidden{
            display: none;
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                </div>
            </div>
        </section>
        <?php
        if(isset($_SESSION['UpdateSuccessMessageForPassword'])){
            echo $_SESSION['UpdateSuccessMessageForPassword'];
            unset($_SESSION['UpdateSuccessMessageForPassword']);
        }
        ?>
        <section class="content">
            <div class="container-fluid">
                <?php
                 if ($trueStatus){
                     ?>
                     <div class="row">
                         <div class="col-md-6">
                             <div class="card card-info">
                                 <div class="card-body">
                                     <div class="text-center">
                                         <?php
                                         if($details->image){
                                             ?>
                                             <!-- <img id="profile-image1" class="profile-user-img img-fluid img-circle"
                                             src="<?php /*echo $trueStatus->image*/?>">-->
                                             <img style="height:120px!important;width: 120px!important;" id="profile-image1" height="220" width="120" src="<?php echo $details->image ?>" class="img-fluid img-circle" alt="User Pic">
                                             <?php

                                         }else{
                                             ?>
                                             <img style="height:120px!important;width: 120px!important;" alt="User Pic" height="120" width="120" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png"  class="img-fluid img-circle" id="profile-image1">
                                             <?php
                                         }
                                         ?>

                                         <form action="../process/data-process.php" method="post" enctype="multipart/form-data" >
                                             <div class="profile-pic">
                                                 <input type ='hidden' name="id"  value="<?php echo $Meid?>">
                                                 <input required name="photo" accept="image/x-png,image/gif,image/jpeg" id="profile-image-upload" class="hidden" type="file" onchange="previewFile()" value="" >
                                                 <div style="color:#999;" >  </div>
                                             </div>
                                             <input type="submit" class="mt-2 btn-sm btn-info mb-2"  name="Change_member_photo" value="Update Profile Picture" >

                                         </form>
                                     </div>
                                     <?php $list = $dbmanipulate->showUserProfile($Meemail) ?>
                                     <h3 class="profile-username text-center"><?php echo $details->name ?></h3>
                                     <p class="text-muted text-center"><?php echo "<b>".$list->position. "</b><br> of Agro Farm Industry " ?></p>
                                     <div class="card card-info">
                                         <div class="card-header">
                                             <h3 class="card-title">About Me</h3>
                                         </div>

                                         <?php
                                         if (isset($_SESSION["updateMsg"])){
                                             echo $_SESSION["updateMsg"];
                                             unset($_SESSION["updateMsg"]);
                                         }
                                         ?>
                                         <form action="../process/data-process.php" method="post">
                                             <div class="card-body">
                                                 <strong><i class="fas fa-book mr-1"></i> Name</strong>
                                                 <p class="text-muted">
                                                     <input name="name" class="form-control" value="<?php echo $details->name?>" required>
                                                     <input type="hidden" name="id" value="<?php echo $Meid?>">

                                                 </p>
                                                 <hr>
                                                 <strong><i class="fas fa-mail-bulk mr-1"></i> Email Address</strong>
                                                 <p class="text-muted">

                                                     <input disabled name="email" class="form-control" value="<?php echo $Meemail?>">
                                                 </p>
                                                 <hr>
                                                 <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
                                                 <p class="text-muted">
                                                     <input name="address" class="form-control" value="<?php echo $list->address?>" required>

                                                 </p>


                                                 <hr>
                                                 <strong><i class="fas fa-phone-square-alt mr-1"></i>Phone Number</strong>
                                                 <p class="text-muted">
                                                     <input name="pnumber" class="form-control" value="<?php echo $list->pnumber?>" required>

                                                 </p>
                                                 <hr>
                                                 <strong><i class="far fa-file-alt mr-1"></i> Company Name</strong>
                                                 <p class="text-muted">
                                                     <input name="cname" class="form-control" value="<?php echo $list->cname?>">

                                                 </p>
                                                 <button style="background-color: #89ABE3FF" class="btn form-control " name="change_member_profile">Update Information</button>

                                             </div>
                                         </form>

                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-6">
                             <div class="">
                                 <div class="card-header p-2">
                                     <ul class="nav nav-pills">
                                         <li class="nav-item"><a style="background-color:#89ABE3FF;text-decoration: none" class="nav-link active" href="#activity" data-toggle="tab">Change Password</a></li>
                                     </ul>
                                 </div>
                                 <div class="card-body">
                                     <div class="tab-content">
                                         <div class="active tab-pane" id="activity">
                                             <form id="UpdatePass" action="../process/data-process.php" method="post" class="form-horizontal">
                                                 <div class="form-group row">
                                                     <div class="col-sm-12 mb-2">
                                                         <input type="hidden" value="<?php echo $Meid?>" name="user_no">
                                                         <input type="password" class="form-control" name="password" id="password" placeholder="Create password">
                                                     </div>
                                                     <div class="col-sm-12">
                                                         <input type="password" class="form-control" name="repass" placeholder="Confirm password">
                                                     </div>
                                                 </div>
                                                 <div class="form-group row">
                                                     <div class="col-sm-12">
                                                         <button style="background-color: #89ABE3FF" type="submit" name="change-pass" class="btn w-100">Update Password</button>
                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                     <!-- /.tab-content -->
                                 </div><!-- /.card-body -->
                             </div>
                             <!-- /.card -->
                         </div>
                         <!-- /.col -->
                     </div>
                     <?php
                 }
                 else{
                     echo "<div class=\"alert alert-success alert-dismissible ml-1 mr-1\">
                  <h5><i class=\"icon fas fa-check\"></i> Opps!</h5>
                  Your account is not activated.
                </div>";
                 }
                ?>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>
</body>
</html>
 <?php
    ?>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../dist/js/bappi.min.js"></script>
    <script src="../../dist/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        function previewFile() {
            var preview = document.getElementById('profile-image1');
            var file    = document.querySelector('input[type=file]').files[0];
            var reader  = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function() {
            $('#profile-image1').on('click', function() {
                $('#profile-image-upload').click();
            });
        });
        $("#UpdatePass").validate({
            rules:{
                password:{
                    required: true,
                    minlength:6
                },
                repass:{
                    required: true,
                    minlength:6,
                    equalTo:"#password"
                }
            },

            messages:{
                password:{
                    required: "Please provide a strong password",
                    minlength:" Password should be above 5 characters "
                },
                repass:{
                    required: "Please provide a confirm password",
                    minlength:"Password should be above 5 characters ",
                    equalTo:"Confirm Password Should be same to Password"
                }
            }
        });


    </script>
    <?php
}
else{
    header("Location: ../login-register/login.php");
}
?>
