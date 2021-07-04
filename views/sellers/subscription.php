<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$Seid = $_SESSION ['Sid'];
$Sename = $_SESSION ['Sname'];
$Seemail = $_SESSION ['Semail'];
$dbmanipulate = new DataManipulation();
$details = $dbmanipulate->singleUsersDetails($Seid);
if (isset($_SESSION ['Sid']) && isset($_SESSION ['Sname']) && isset($_SESSION ['Semail']) ){
    include_once "sellersHeader.php";
    ?>
    <style>
        .white-mode {
            text-decoration: none;
            padding: 17px 40px;
            background-color: yellow;
            border-radius: 3px;
            color: black;
            transition: .35s ease-in-out;
            position: absolute;
            left: 15px;
            bottom: 15px
        }
        .pricingTable {
            text-align: center;
            background: #fff;
            margin: 0 -15px;
            box-shadow: 0 0 10px #ababab;
            padding-bottom: 40px;
            border-radius: 10px;
            color: #cad0de;
            transform: scale(1);
            transition: all .5s ease 0s
        }

        .pricingTable:hover {
            transform: scale(1.05);
            z-index: 1
        }

        .pricingTable .pricingTable-header {
            padding: 40px 0;
            background: #f5f6f9;
            border-radius: 10px 10px 50% 50%;
            transition: all .5s ease 0s
        }

        .pricingTable:hover .pricingTable-header {
            background: #ff9624
        }

        .pricingTable .pricingTable-header i {
            font-size: 50px;
            color: #858c9a;
            margin-bottom: 10px;
            transition: all .5s ease 0s
        }

        .pricingTable .price-value {
            font-size: 35px;
            color: #ff9624;
            transition: all .5s ease 0s
        }

        .pricingTable .month {
            display: block;
            font-size: 14px;
            color: #cad0de
        }

        .pricingTable:hover .month,
        .pricingTable:hover .price-value,
        .pricingTable:hover .pricingTable-header i {
            color: #fff
        }

        .pricingTable .heading {
            font-size: 24px;
            color: #ff9624;
            margin-bottom: 20px;
            text-transform: uppercase
        }

        .pricingTable .pricing-content ul {
            list-style: none;
            padding: 0;
            margin-bottom: 30px
        }

        .pricingTable .pricing-content ul li {
            line-height: 30px;
            color: #a7a8aa
        }

        .pricingTable .pricingTable-signup button {
            display: inline-block;
            font-size: 15px;
            color: #fff;
            padding: 10px 35px;
            border-radius: 20px;
            background: #ffa442;
            text-transform: uppercase;
            transition: all .3s ease 0s
        }

        .pricingTable .pricingTable-signup button:hover {
            box-shadow: 0 0 10px #ffa442
        }

        .pricingTable.blue .heading,
        .pricingTable.blue .price-value {
            color: #4b64ff
        }

        .pricingTable.blue .pricingTable-signup button,
        .pricingTable.blue:hover .pricingTable-header {
            background: #4b64ff
        }

        .pricingTable.blue .pricingTable-signup button:hover {
            box-shadow: 0 0 10px #4b64ff
        }

        .pricingTable.red .heading,
        .pricingTable.red .price-value {
            color: #ff4b4b
        }

        .pricingTable.red .pricingTable-signup button,
        .pricingTable.red:hover .pricingTable-header {
            background: #ff4b4b
        }

        .pricingTable.red .pricingTable-signup button:hover {
            box-shadow: 0 0 10px #ff4b4b
        }

        .pricingTable.green .heading,
        .pricingTable.green .price-value {
            color: #40c952
        }

        .pricingTable.green .pricingTable-signup button,
        .pricingTable.green:hover .pricingTable-header {
            background: #40c952
        }

        .pricingTable.green .pricingTable-signup button:hover {
            box-shadow: 0 0 10px #40c952
        }

        .pricingTable.blue:hover .price-value,
        .pricingTable.green:hover .price-value,
        .pricingTable.red:hover .price-value {
            color: #fff
        }

        @media screen and (max-width:990px) {
            .pricingTable {
                margin: 0 0 20px
            }
        }</style>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Subscription </h1>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($details->time == null){?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="demo">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <form action="../process/data-process.php" method="post">
                                            <div class="pricingTable">
                                                <div class="pricingTable-header">
                                                    <i class="fa fa-adjust"></i>
                                                    <div class="price-value"> 100 TK<span class="month">per month</span> </div>
                                                </div>
                                                <h3 class="heading">Standard</h3>
                                                <div class="pricing-content">
                                                    <ul>
                                                        <li>For Subscription</li>
                                                        <li>Transaction ID:(Send Money through Bkash <br>to the following number, <br> & give the transaction ID.)</li>
                                                        <li><b>Bkash Agent Number</b></li>
                                                        <li><b>01852454545</b></li>
                                                        <li><input style="border-radius: 10px;border: 1px solid burlywood;padding: 4px;" type="text" class="" name="transactionId" placeholder="Transaction Number" required></li>
                                                    </ul>
                                                </div>
                                                <div class="pricingTable-signup">
                                                    <input type="hidden" name="user_id" value="<?php echo $Seid?>">
                                                    <input type="hidden" name="amount" value="100">
                                                    <input type="hidden" name="time" value="1">
                                                    <button style="border:0px" name="pay-btn">Pay</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <form action="../process/data-process.php" method="post">
                                            <div class="pricingTable green">
                                                <div class="pricingTable-header">
                                                    <i class="fa fa-briefcase"></i>
                                                    <div class="price-value"> 300 TK <span class="month">Six months</span> </div>
                                                </div>
                                                <h3 class="heading">Business</h3>
                                                <div class="pricing-content">
                                                    <ul>
                                                        <li>For Subscription</li>
                                                        <li>Transaction ID:(Send Money through Bkash <br>to the following number, <br> & give the transaction ID.)</li>
                                                        <li><b>Bkash Agent Number</b></li>
                                                        <li><b>01852454545</b></li>
                                                        <li><input style="border-radius: 10px;border: 1px solid #19b877;padding: 4px;" type="text" class="" name="transactionId" placeholder="Transaction Number" required></li>
                                                    </ul>
                                                </div>
                                                <div class="pricingTable-signup">
                                                    <input type="hidden" name="user_id" value="<?php echo $Seid?>">
                                                    <input type="hidden" name="amount" value="300">
                                                    <input type="hidden" name="time" value="6">
                                                    <button style="border:0px" name="pay-btn">Pay</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>

                                    <div class="col-md-4 col-sm-6">
                                        <form action="../process/data-process.php" method="post">
                                            <input type="hidden" name="user_id" value="<?php echo $Seid?>">
                                            <input type="hidden" name="amount" value="500">
                                            <input type="hidden" name="time" value="12">
                                            <div class="pricingTable red">
                                                <div class="pricingTable-header">
                                                    <i class="fa fa-cube"></i>
                                                    <div class="price-value"> 500 TK <span class="month">per year</span> </div>
                                                </div>
                                                <h3 class="heading">Extra</h3>
                                                <div class="pricing-content">
                                                    <ul>
                                                        <li>For Subscription</li>
                                                        <li>Transaction ID:(Send Money through Bkash <br>to the following number, <br> & give the transaction ID.)</li>
                                                        <li><b>Bkash Agent Number</b></li>
                                                        <li><b>01852454545</b></li>
                                                        <li><input style="border-radius: 10px;border: 1px solid #b42550;padding: 4px;" type="text" class="" name="transactionId" placeholder="Transaction Number" required></li>
                                                    </ul>
                                                </div>
                                                <div class="pricingTable-signup">
                                                    <button style="border:0px" name="pay-btn">Pay</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } else{
            ?>
            <div class="typewriter d-flex justify-content-center">
                <h1>Please. Wait For Admin.</h1>
            </div>
            <?php
        }?>
    </div>
    </div>
    <?php
    include_once "sellersFooter.php";
    ?>

    <?php

}
else{
    header("Location: ../login-register/login.php");
}
?>

