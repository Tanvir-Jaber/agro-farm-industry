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
                        <h1 class="m-0 text-dark">List of Member</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List of Member Data</h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead style="background: cadetblue;color: wheat">
                                    <tr>
                                        <th>Name</th>
                                        <th>Company Name</th>
                                        <th>Position</th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Transaction Number(Sellers)</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $list = $dbmanipulate->SearchVia();
                                    if ($list){
                                        foreach ($list as $lists){
                                            ?>
                                            <tr>
                                                <td><?php echo $lists->name; if ($lists->position == 'Sellers'){ ?>
                                                    <span class="message-show-on-alert badge-info badge"><?php echo $lists->time ?> months</span><?php }?>
                                                </td>
                                                <td><?php echo $lists->cname ?></td>
                                                <td><?php echo $lists->position ?></td>
                                                <td><?php echo $lists->pnumber ?></td>
                                                <td><?php echo $lists->address ?></td>
                                                <td><?php echo $lists->transaction ?></td>
                                                <td>
                                                    <a href="../process/data-process.php?moveToTrash=<?php echo $lists->no; ?>" class="btn-round btn-sm btn-info"><i class="fas fa-trash"></i></a>
                                                </td>
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
    include_once "AdminFooter.php";
}
else{
    header("Location: ../login-register/login.php");
}
?>

