<?php
define("TAG", 1);
$pagename = "Inbox - Secret Messages";
include_once("./config/db.php");
include_once("./config/function.php");
session_start();

// require_once(__DIR__ . '/vendor/autoload.php');
// userdefinedfunc();

if (isset($_POST["getdata"])) {
    //echo $_POST["getdata"];
    loadmessage();
    exit();
}
if (isset($_POST["updatestatus"])) {
    //echo $_POST["getdata"];
    updatereadstatus();
    exit();
}
if (isset($_POST["delete"])) {
    //echo $_POST["getdata"];
    deletemessage();
    exit();
}
$status = autologin();
if ($status != 2) {
    lastseen();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
</head>

<body>
    <?php include("include/navbar.php") ?>

    <div class='onesignal-customlink-container' style="margin:10px auto; min-height:unset;"></div>

    <?php
    if ($status == 2) { ?>
        <main class="main">
            <h3>You cannot access this page without login</h3>
            <a href="http://localhost/anonymous/register?utm_source=inbox&utm_medium=dna&utm_campaign=register">
                <button class="sendbutt">Login Now <i class="bi bi-arrow-right"></i></button></a>
        </main>
    <?php
    } else { ?>
        <div class="container card1 ">
            <div class="intoho">
                <h1>inbox</h1>
                <a href="http://localhost/anonymous/home">
                    <button type="button">Back <i class="bi bi-box-arrow-in-left"></i></button>
                </a>
            </div>
            <div class="inbox" id="inbox">
            </div>
            <div class="loadmore" id="nomsg">No message yet</div>
            <div class="loadmore" id="nomore">All messages loaded</div>
            <button class="loadmore" id="loadmore" onclick="loadmore1()">
                <div class="loader"></div>
            </button>
        </div>

        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content" id="modal-content">
                <span class="close" id="close" data-html2canvas-ignore="true"><i class="bi bi-x-circle"></i></span>
                <img src="img/message1.png" alt="Secrete Message">
                <p id="query" class="queryinbox1"></p>
                <p id="message">Some text in the Modal..</p>
                <div class="userdetails">
                    <p id="time">Some text in the Modal..</p>
                    <p id="username">@<?php echo $_SESSION['uname']; ?></p>
                </div>
                <p class="webdetails">#ShareMSG</p>
                <button id="sharebutt" type="button" onclick="sharefun(this.getAttribute('curr'),'<?php echo $_SESSION['linkid']; ?>')" curr="0" data-html2canvas-ignore="true">Share Now</button>
                <button id="deletemessage" class="msg-delete" curr="0" onclick="deletemessagefun(this.getAttribute('curr'))" data-html2canvas-ignore="true"><i class="bi bi-trash-fill"></i></button>
            </div>
        </div>
    <?php
    }
    ?>

    <div class="faq">
        <h3>FAQ</h3>
        <div class="questions">
            <hr class="hrline">
            <div class="faqopenbtn" qindex="0">
                <h5 class="faqquestion">How can I share my messages?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <ol>
                    <li>Go to Your Inbox.</li>
                    <li>Choose the message You want to share.</li>
                    <li>Tap on "Share Now".</li>
                    <li>Tap on "Share Now" again to share the anonymous message with Your Friends.</li>
                </ol>
            </div>
            <hr class="hrline">
            <div class="faqopenbtn" qindex="1">
                <h5 class="faqquestion">How can I delete a message?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <ol>
                    <li>Go to Your Inbox.</li>
                    <li>Tap on the message You want to delete.</li>
                    <li>On the upper left side, You will see this "<i class="bi bi-trash-fill"></i>" icon.</li>
                    <li>Tap it to Delete the selected message.</li>
                </ol>
            </div>
            <hr class="hrline">
            <div class="faqopenbtn" qindex="2">
                <h5 class="faqquestion">Is it possible to get back my deleted messages?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>It is unfortunately not possible to retrieve deleted messages once they have been deleted.</p>
            </div>
        </div>
    </div>


    <?php include("include/footer1.php") ?>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="js/main.js?v=11.0"></script>
    <script src="js/inbox.js?v=11.0"></script>

</body>

</html>