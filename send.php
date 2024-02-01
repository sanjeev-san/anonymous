<?php
define("TAG", 1);
$pagename = "Send Secret Message to your friend Now";
include_once("./config/db.php");
include_once("./config/function.php");

if (isset($_POST["message"]) && isset($_POST["refid"] ) && isset($_POST["query"] )) {
    $status = sendmessage();
} else if (isset($_GET["id"])) {
    $status = displaysendpage();
    if (isset($uname) && $uname != '') {
        $pagename = "Send Secret Message to " . $uname . " Now";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
</head>

<body>
    <?php include("include/navbar.php") ?>

    <?php
    if (isset($_POST["message"]) && isset($_POST["refid"])) {
        // $status = sendmessage();
        if ($status == 1) {
            //sql error
    ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>Some error occured. </h4>

                </div>
                <object class="error-image" data="img/error.svg"></object>
                <!-- <img class="error-image" src="img/error.svg" alt="error"> -->
                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        } else if ($status == 0) {
            // message send success
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>Success</h4>
                </div>
                <object class="error-image" data="img/sent.svg"></object width>
                <p><i class="icons1 bi-shield-lock"></i>Message has been sent anonymously</p>
                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        } else {
            //fake success to prevent spam
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>Success</h4>
                </div>
                <object class="error-image" data="img/sent.svg"></object width>
                <p><i class="icons1 bi-shield-lock"></i>Message has been sent anonymously</p>

                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        }
    } else if (isset($_GET["id"])) {
        // $status = displaysendpage();
        if ($status == 1) {
            //sql error
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>Some error occured. Try reloading or get the correct link.</h4>
                </div>
                <object class="error-image" data="img/error.svg"></object>


                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        } else if ($status == 2) {
            //user does not exist || invalid link
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>Link is Invalid</h4>
                </div>
                <object class="error-image" data="img/error.svg"></object>


                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        } else if ($status == 3) {
            //user exist but deactivated
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h4>This account has been deactivated</h4>
                </div>
                <object class="error-image" data="img/error.svg"></object>
                <!-- <hr style="width: 80%;margin:10px auto;"> -->
                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php
        } else {
            //user exist 
        ?>
            <div class="container card2 ">
                <div class="sendpage">
                    <h1>
                        <?php if ($query != NULL) {
                            echo $query;
                        } else {
                            echo "Send anonymous message to " . $uname; 
                        } ?>
                    </h1>
                    <form class="messageform" name="messageform" id="messageform2" onSubmit="document.getElementById('msgsub2').disabled=true;" method="post" action="send">
                        <textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Enter your message" required maxlength="1024"></textarea>
                        <span id="char_count">*1024 character remaining</span>
                        <input type="hidden" name="refid" value="<?php echo $refid; ?>">
                        <input type="hidden" name="query" value="<?php if ($query != NULL) {
                                                                        echo $query; 
                                                                    } else {
                                                                        echo "default";
                                                                    } ?>">
                    </form>
                </div>
                <p><i class="icons1 bi-shield-lock"></i>Send message anonymously</p>
                <button onclick="formsub2()" class="sendbutt" id="msgsub2">Send<i class="icons bi-send-fill"></i></button>
                <br>
                <!-- <hr style="width: 80%;margin:10px auto;"> -->

                <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
            </div>
        <?php

        }
    } else {
        //link is invalid
        ?>
        <div class="container card2 ">
            <div class="sendpage">
                <h4>Link is Invalid</h4>
            </div>
            <object class="error-image" data="img/error.svg"></object>

            <!-- <hr style="width: 80%;margin:10px auto;"> -->
            <a href="http://localhost/anonymous/register" type="button" class="joinbutt">Join Us<i class="icons bi-person-fill-add"></i></a>
        </div>
    <?php
    }
    ?>

    <?php include("include/footer1.php") ?>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/main.js?v=11.0"></script>
    <script src="js/send.js?v=11.0"></script>
</body>


</html>