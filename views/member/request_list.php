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
                        <h1 class="m-0 text-dark">Confirm Product History</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="" class="table table-bordered table-striped">
                                    <thead style="background-color: #89ABE3FF">
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <!--<th>Product Image</th>-->
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Item Need</th>
                                        <th>Units</th>
                                        <th>Rating</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    <?php
                                    $list = $dbmanipulate->viewConfimrListSellersInfo($Meid);
                                    if ($list){
                                        foreach ($list as $lists){
                                            ?>
                                            <tr>
                                                <td><?php echo $lists->name ?></td>
                                                <td><?php echo $lists->address ?></td>
                                                <td><?php echo $lists->pnumber ?></td>
                                              <!--  <td>
                                                    <div class="d-flex justify-content-center">
                                                        <?php
/*                                                        $listImage = $dbmanipulate->viewConfirmImage($lists->product);
                                                        */?>
                                                        <img class="rounded-circle" height="70px" width="70px" src="<?php /*echo $listImage->image*/?>">

                                                    </div>
                                                </td>-->
                                                <td><?php echo $lists->date ?></td>
                                                <td><?php echo $lists->time ?></td>
                                                <td><?php echo $lists->item ?></td>
                                                <td><?php echo $lists->units ?></td>
                                                <td><a href=rating_profile.php?seller_user_id=<?php echo  $lists->no ?>" class="btn-sm btn-primary">Rating Profile</a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    <?php
    include_once "BuyersFooter.php";
}
else{
    header("Location: ../login-register/login.php");
}
?>

