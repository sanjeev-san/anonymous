<?php
define("TAG", 1);
$pagename = "Register Now! - Start Getting Anonymous Messages Today";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
</head>

<body>
    <?php include("include/navbar.php") ?>

    <?php
    if (isset($_COOKIE["connstatus"])) { ?>
        <main class="main">
            <h3>It seems you already have an account</h3>
            <a href="http://localhost/anonymous/home">
            <button class="sendbutt">Go to Home <i class="bi bi-arrow-right"></i></button></a>
        </main>
    <?php } else { ?>
        <main class="main">
            <h3>Welcome To ShareMSG</h3>

            <div class="select" id="select">
                <div class="left" onclick="newuser()">
                    <div class="logo1"><i class="bi bi-person-add"></i></div>
                    <div class="text1">New User</div>
                </div>
                <div class="mid">
                    <hr class="rule">
                </div>
                <div class="right" onclick="olduser()">
                    <div class="logo1"><i class="bi bi-person-fill-check"></i></div>
                    <div class="text1">Old User</div>
                </div>
            </div>
            <form class="newuser" id="newuser" action="home" method="post" onSubmit="document.getElementById('newsub').disabled=true;">
                <input class="input1" name="name" type="text" placeholder="Enter your name" required maxlength="15">
                <p class="tc_check">
                    *By Registering/Signing In, You agreed to our <a href="http://localhost/anonymous/terms"> Terms & Conditions</a> and <a href="http://localhost/anonymous/privacy">Privacy Policy</a>.
                </p>
                <button type="submit">Sign In</button>
                <button type="reset" id="newsub" onclick="backtoselect('newuser')"><i class="bi bi-arrow-left"></i></button>
            </form>
            <form class="olduser" id="olduser" action="home" method="post" onSubmit="document.getElementById('oldsub').disabled=true;">
                <input class="input1" type="text" placeholder="Enter Username" name="uname" required maxlength="15">
                <input class="input1" type="password" placeholder="Enter Password" name="psw" required maxlength="8">
                <p class="tc_check">
                    *By Registering/Signing In, You agreed to our <a href="http://localhost/anonymous/terms"> Terms & Conditions</a> and <a href="http://localhost/anonymous/privacy">Privacy Policy</a>.
                </p>
                <button type="submit">Log In</button>
                <button type="reset" id="oldsub" onclick="backtoselect('olduser')"><i class="bi bi-arrow-left"></i></button>
            </form>
        </main>
    <?php }
    ?>


    <div class="faq">
        <h3>FAQ</h3>
        <div class="questions">
            <hr class="hrline">
            <div class="faqopenbtn" qindex="0">
                <h5 class="faqquestion">What is ShareMSG?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>ShareMSG is an anonymous online messaging website that allows users to send messages without revealing their identity. ShareMSG is perfect for those who want to share their thoughts and feelings without the fear of being judged or ridiculed.</p>
            </div>

            <hr class="hrline">
            <div class="faqopenbtn" qindex="1">
                <h5 class="faqquestion">is ShareMSG safe?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>Yes, ShareMSG is considered secure as it does not collect or store any information about its users, ensuring the privacy of their messages and identities. The service is designed to be anonymous, so even ShareMSG does not know who sent the messages.</p>
            </div>


            <hr class="hrline">
            <div class="faqopenbtn" qindex="2">
                <h5 class="faqquestion">How can I create an account on ShareMSG?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <ol>
                    <li>Go to <a href="http://localhost/anonymous/">sharemsg.me</a>.</li>
                    <li>Tap on “Get Started”.</li>
                    <li>Tap on "New”</li>
                    <li>Enter Your name.</li>
                    <li>Share Your link.</li>
                    <li>Enjoy</li>
                </ol>
            </div>


        </div>
    </div>
    <?php include("include/footer1.php") ?>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/main.js?v=11.0"></script>
    <script src="js/register.js?v=11.0"></script>
</body>


</html>