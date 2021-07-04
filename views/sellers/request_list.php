<?php
if(!isset($_SESSION)){
    session_start();
}
$Seid = $_SESSION ['Sid'];
$Sename = $_SESSION ['Sname'];
$Seemail = $_SESSION ['Semail'];
if (isset($_SESSION ['Sid']) && isset($_SESSION ['Sname']) && isset($_SESSION ['Semail']) ){
    include_once "sellersHeader.php";
    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Requested Product History</h1>
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
                                    <thead style="background-color: #A13942; color: #FCF6F5FF;">
                                    <tr>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                       <!-- <th>Product Image</th>-->
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Item Need</th>
                                        <th>Units</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    <?php
                                    $list = $dbmanipulate->viewConfimrListRequestInfo($Seid);
                                    if ($list){
                                        foreach ($list as $lists){
                                            ?>
                                            <tr>
                                                <td><?php echo $lists->name ?></td>
                                                <td><?php echo $lists->address ?></td>
                                                <td><?php echo $lists->pnumber ?></td>
                                                <!--<td>
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
                                                <td><a href="../process/data-process.php?status_id=<?php echo $lists->no ?>" class="btn-sm btn-info">Accept Request</a></td>
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
    include_once "sellersFooter.php";
}
else{
    header("Location: ../login-register/login.php");
}
?>

