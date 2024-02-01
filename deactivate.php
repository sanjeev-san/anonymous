<?php
define("TAG", 1);
$pagename = "Account Deletion - ShareMSG Anonymous Messaging Website";
include_once("./config/db.php");
include_once("./config/function.php");
session_start();

if (isset($_GET["do"])) {
    logout();
    exit();
}
if (isset($_POST["feedback"])) {
    $status = deleteuser();
    if ($status == 0) {
        header("Location: http://localhost/anonymous/register?utm_source=deactivate&utm_medium=success&utm_campaign=register");
        exit();
    } else {
        echo ("<script>alert('Some error occured while deactivating the account');</script>");
    }
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

    <?php
    if ($status == 2) { ?>
        <main class="main">
            <h3>You cannot access this page without login</h3>
            <a href="http://localhost/anonymous/register?utm_source=deactivate&utm_medium=dna&utm_campaign=register">
                <button class="sendbutt">Login Now <i class="bi bi-arrow-right"></i></button></a>
        </main>
    <?php
    } else { ?>
        <div class="container card2 ">
            <div class="sendpage">
                <h1>Are you sure you want to leave?</h1>
                <form class="messageform" name="deactivateform" id="deactivateform" onSubmit="document.getElementById('deactivatebutt').disabled=true;" method="post" action="deactivate">
                    <textarea class="message" name="feedback" id="feedback" cols="30" rows="10" placeholder="Tell us how we can improve" required maxlength="256"></textarea>
                </form>
            </div>
            <p>crying emoji</p>
            <button onclick="deactivatebutt()" class="sendbutt" id="deactivatebutt">Deactivate <i class="bi bi-person-x-fill"></i></button>
            <br>
            <!-- <hr style="width: 80%;margin:10px auto;"> -->

            <a href="http://localhost/anonymous/home" type="button" class="joinbutt">Back to home <i class="bi bi-house-heart-fill"></i></a>
        </div>
    <?php
    }
    ?>



    <?php include("include/footer1.php") ?>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/main.js?v=11.0"></script>
    <script>
        function deactivatebutt() {
            if (document.getElementById("feedback").value != '') {
                document.getElementById("deactivateform").submit();
            } else {
                alert("feedback cannot be empty")
            }
        }
    </script>
</body>


</html>