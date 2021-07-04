<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$dbmanipulate = new DataManipulation();
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
                        <h1 class="m-0 text-dark">Home</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <?php
            $value = $dbmanipulate->singleUsers($Seid);

            if($value){
                $sellers_name = $value->name;
                $position = $value->position;
            }

            if($value){
                ?>
            <div class="container-fluid">
                <div class="d-flex justify-content-center " >
                    <div style="width: 90%" class="">
                        <div class="">
                            <form id="FormData" action="../process/data-process.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="name" name="name" value="<?php echo $sellers_name?>">
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $Seid?>">
                                <input type="hidden" id="position" name="position" value="<?php echo $position?>">
                                <div class="card-body ">
                                    <strong><i class="fas fa-book mr-1"></i>Post Box</strong>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="customFile" accept="video/mp4,video/x-m4v,video/*">
                                        <label class="custom-file-label" for="customFile">Choose File</label>
                                    </div>
                                    <input type="text" name="post_title" class="post_title form-control" id="post_title" placeholder="Please Type Your Post Title" required>
                                    <textarea style="resize: none; height: 150px" name="noticeInfo" class="post-message main-search form-control"></textarea>
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <button type="submit" name="newNotice" style="background: #A13942;border: #00adc2;color: #ffffff;font-weight: bold" class="newNotice btn btn-block"><i class="fa fa-sign-language mr-2" aria-hidden="true"></i>Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center ">
                    <div class="col-md-8 dataShow"></div>

                </div>

                <?php
            }
                else{ ?>
                    <div class="typewriter d-flex justify-content-center">
                        <h1>Sorry.Your Account is not Active.</h1>
                    </div><?php
                }?>
            </section>
    </div>
    </div>
    <?php
    include_once "sellersFooter.php";
    ?>
    <script>
        showData()
        var user_name = $("#name").val();
        var user_id = $("#user_id").val();
        var position = $("#position").val();
        function tConvert (time) {
            // Check correct time format and split into components
            time = time.toString ().match (/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];

            if (time.length > 1) { // If time format correct
                time = time.slice (1);  // Remove full string match value
                time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
                time[0] = +time[0] % 12 || 12; // Adjust hours
            }
            return time.join (''); // return adjusted time or original string
        }
        function showData() {
            var getData = " ";
            $.ajax({
                type: "GET",
                url: "../process/data-process.php",
                data: {
                    getData: getData
                },
                success: function(data)
                {
                    var data = JSON.parse(data);
                    var html = " ";
                    var htmlString = " ";
                    for (var i = 0;  i<data.length;  i++){
                        if (data[i].commentNo == null) {
                            html +="<div class=\"\">\n" +
                                "<div class=\"card card-widget\">\n" +
                                "<div class=\"card-header\">\n" +
                                "<div class=\"user-block\">\n" +
                                "<img class=\"img-circle\" src=\"../../assets/img/ok-2B.jpg\" alt=\"User Image\">\n" +
                                "<span class=\"username\"><a href=\"#\">" + data[i].name + "</a></span>\n" +
                                "<span class=\"description\">" +data[i].date + " Time " +  tConvert(data[i].time) +"</span>\n" +
                                "</div>\n" +
                                "<div class=\"card-tools\">\n"
                            if(data[i].user_id != user_id && data[i].position != 'Buyers' && data[i].position != 'Sellers' ) {
                                html+= "<button data-id ='"+ data[i].user_id +"' type=\"button\" class=\"btn confirm_Btn_eye\"  data-toggle=\"modal\" data-target=\"#exampleModal\">\n" +
                                "<i class=\"fas fa-eye\"></i>\n" +
                                "</button>\n"
                            }
                                html +="<button type=\"button\" class=\"btn btn-tool\" data-card-widget=\"collapse\">\n" +
                                "<i class=\"fas fa-minus\"></i>\n" +
                                "</button>\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "<div class=\"card-body\">\n" +
                                "<div style='white-space: pre-wrap; font-weight: bold; font-size: 30px'>" + data[i].title + "</div>" +
                                "<div style='white-space: pre-wrap;'>" + data[i].post + "</div>" +
                                "<video class=\"img-fluid pad\"  controls>"+
                                "<source src='"+ data[i].image +"' type=\"video/mp4\"><source src='"+ data[i].image +"' type=\"video/ogg\">"+
                                "</video>"+
                                "<span class=\"float-right text-muted\">Comments</span></div>"

                            for (var j = 0; j < data.length; j++) {
                                if (data[i].no == data[j].commentNo) {
                                    html += "<div class=\"card-footer card-comments\">\n" +
                                        "<div class=\"card-comment\">\n" +
                                        "<img class=\"img-circle img-sm\" src=\"../../assets/img/ok-2B.jpg\" alt=\"User Image\">\n" +
                                        "<div class=\"comment-text\">\n" +
                                        "<span class=\"username\">\n" + data[j].name +
                                        "<span class=\"text-muted float-right\">" + tConvert(data[j].time) + "</span>\n" +
                                        "</span>" + data[j].post +
                                        "</div>\n" +
                                        "</div>\n" +
                                        "</div>\n"
                                }
                            }
                               html += "<div class=\"card-footer\">\n" +
                                "<a href='' data-id ='"+ data[i].no +"' class=\"telegrambtn text-primary img-fluid img-circle img-sm\"><i class=\"fab fa-telegram fa-2x\" ></i></a>\n" +
                                "<div class=\"img-push\">\n" +
                                "<input type=\"text\" class=\"form-control form-control-sm\" placeholder=\"Press enter to post comment\">\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>\n" +
                                "</div>"


                        }
                        $(".dataShow").html(html);
                        $(".telegrambtn").click(function (e) {
                            e.preventDefault();
                            var commentValue = $(this).parent().find('input').val();
                            var commentNo = $(this).attr("data-id");
                            var user_name = $("#name").val();
                            var user_id = $("#user_id").val();
                            if (commentValue.length>0){
                                $.ajax({
                                    type: "POST",
                                    url: "../process/data-process.php",
                                    data: {
                                        commentValue: commentValue,
                                        commentNo: commentNo,
                                        user_name: user_name,
                                        user_id: user_id,
                                    },
                                    success: function(data)
                                    {
                                        showData()
                                    }
                                });
                                $(this).parent().find('input').val(" ")

                            }
                        })
                        $(".confirm_Btn_eye").click(function () {
                            var confirm = $(this).attr('data-id');
                            $(".parent_id").val(confirm)
                        });
                    }


                }
            });
        }
        function submitPostData(form_data) {
            $.ajax({
                type: "POST",
                url: "../process/data-process.php",
                data: form_data,
                processData:false,
                contentType:false,
                cache:false,
                success: function(data)
                {
                    console.log(data)
                    showData()
                }
            });
        }
        $(".btnConfirmSend").click(function (e) {
            e.preventDefault();
            var ConfirmForm = new FormData($('#ConfirmForm')[0]);
            $.ajax({
                type: "POST",
                url: "../process/data-process.php",
                data: ConfirmForm,
                processData:false,
                contentType:false,
                cache:false,
                success: function(data)
                {
                    document.getElementById("ConfirmForm").reset();
                    window.location.href = "confirm_product.php";
                }
            });
        });
        $(".resetbtn").click(function () {
            document.getElementById("ConfirmForm").reset();
        });
        $(".newNotice").click(function (e) {
            e.preventDefault();
            var textarea = $(".post-message").val().length;
            var post_title = $("#post_title").val().length;
            var textareas = $(".post-message").val();
            var imageFilename = $("#customFile").val().length;
            var form_data = new FormData($('#FormData')[0]);
            /*form_data.append("file",imageFilename);*/
            form_data.append("user_name",user_name);
            form_data.append("user_id",user_id);
            form_data.append("position",position);
           /* form_data.append("textarea",textareas);*/
            if(textarea>0 && imageFilename>0 && post_title>0)
            {

               submitPostData(form_data);
                $(".post-message").val("");
                $("#post_title").val("");
                $("#customFile").val('');
                $(".custom-file-label").text('Choose File');
            }

        })

    </script>
    <?php
}
else{
    header("Location: ../login-register/login.php");
}
?>

