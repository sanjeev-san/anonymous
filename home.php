<?php
define("TAG", 1);
$pagename = "Welcome - Send me Anonymous Messages";
include_once("./config/db.php");
include_once("./config/function.php");
session_start();

if (isset($_POST["getmail"])) {
    getemail();
    exit();
}
if (isset($_POST["setmail"])) {
    setemail();
    exit();
}
if (isset($_POST["clear"])) {
    clearinbox();
    exit();
}
if (isset($_POST["setquery"])) {
    setquery();
    exit();
}

$status = autologin();
if ($status == 2) {
    if (isset($_POST["uname"]) && isset($_POST["psw"])) {
        $status = relogin();
    } else if (isset($_POST["name"])) {
        $status = createuser();
    }
}
if ($status != 2) {
    lastseen();
}
?>

<?php
if ($status != 2) { ?>
    <script>
        var username = '<?php echo $_SESSION["uname"]; ?>';
        var password = '<?php echo $_SESSION["secret_key"]; ?>'
        var email = ''
    </script>
<?php
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
    if ($status != 2) { ?>
        <div class="container card1 ">
            <div class="sharepage" id="sharepage">
                <h1>Share this link to Your Friends</h1>
                <div class="linkdiv">
                    <input type="text" class="link" id="link" value="<?php echo "http://localhost/anonymous/@" . $_SESSION["linkid"] ?>" readonly aria-label="user_link">
                    <span class="copy-btn" onclick="copyText()">
                        <i class="bi bi-clipboard2-fill"></i>
                    </span>
                </div>
                <div class="share">
                    <div class="sharerow">
                        <a class="shareele w-100" onclick="sharenow()" href="https://api.whatsapp.com/send?text=Send a secret message to <?php echo $_SESSION["uname"]; ?> http://localhost/anonymous/@<?php echo $_SESSION["linkid"]; ?>"><i class=" bi bi-whatsapp"></i> Share on WhatsApp</a>
                    </div>
                </div>
                <div class=" sharerow">
                    <div class="shareele" onclick="sharenow()">
                        <i class="bi bi-instagram"></i> Instagram
                    </div>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/anonymous/@<?php echo $_SESSION["linkid"]; ?>" class="shareele" onclick="sharenow()">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                </div>
                <div class="sharerow">
                    <div class="shareele" onclick="sharenow()">
                        <i class="bi bi-snapchat"></i> Snapchat
                    </div>
                    <a class="shareele" href="http://twitter.com/intent/tweet?text=Send a secret message to <?php echo $_SESSION["uname"]; ?> http://localhost/anonymous/@<?php echo $_SESSION["linkid"]; ?>" onclick="sharenow()">
                        <i class="bi bi-twitter"></i> Twitter
                    </a>
                </div>
                <h1 class="queryquestion">Customize your <b>Anonymous</b> Topic*</h1>
                <div class="linkdiv">
                    <input type="text" maxlength="32" minlength="10" readonly class="link" id="query" value="<?php
                                                                                                                if (isset($_COOKIE["customquery"]) and $_COOKIE["customquery"] != 'default') {
                                                                                                                    echo $_COOKIE["customquery"];
                                                                                                                } else {
                                                                                                                    echo "Send anonymous message to " . $_SESSION["uname"];
                                                                                                                }
                                                                                                                ?>" aria-label="user_link">
                    <span id="customqueryedit" class="copy-btn" onclick="customqueryedit()">
                        <i class="bi bi-pencil-fill"></i>
                    </span>
                </div>
                <button type="button" class="customqueryset" id="customqueryset" onclick="customqueryset()"> Save</button>
                <button type="button" class="customqueryset" id="defaultqueryset" onclick="defaultqueryset()"> Default</button>
                <button type="button" class="customqueryset" id="cancelqueryset" onclick="cancelqueryset()"> Cancel</button>
            </div>


            <div class="accpage" id="accpage">
                <div class="addemail">
                    <button type="button" id="emailfetch" onclick="email(this)">Email</button>
                    <div id="emailset" style="display: none;">
                        <input type="email" id="email" name="email" maxlength="64" placeholder="Add Your Email">
                        <button type="button" id="setmail" onclick="setemail(this)">Save</button>
                    </div>
                </div>
                <div class="otherbuttons">
                    <a href="#">
                        <button type="button" id="username" onclick="usernamefun(this.id)">Tap to see username <i class="bi bi-person-fill"></i></i></button>
                    </a>
                    <a href="#">
                        <button type="button" id="password" onclick="passwordfun(this.id)">Tap to see password <i class="bi bi-key"></i></i></button>
                    </a>
                </div>
                <div class="otherbuttons">
                    <a href="http://localhost/anonymous/contact">
                        <button type="button">Contact Us <i class="bi bi-telephone-fill"></i></button>
                    </a>
                    <a href="http://localhost/anonymous/legal">
                        <button type="button">Legal <i class="bi bi-book-half"></i></button>
                    </a>
                </div>

                <div class="otherbuttons">
                    <!-- <h4 class="credentials">danger zone</h4> -->
                    <a href="#">
                        <button type="button" onclick="clearinbox()">Delete All Messages <i class="bi bi-trash-fill"></i></button>
                    </a>
                    <a href="#">
                        <button type="button" onclick="logout()">Log out <i class="bi bi-box-arrow-right"></i></button>
                    </a>
                    <a href="http://localhost/anonymous/deactivate">
                        <button type="button">Deactivate <i class="bi bi-radioactive"></i></button>
                    </a>
                </div>

            </div>
        </div>

        <div class="sharepage" id="sharepagebutt">
            <div class="sharepagebutt">
                <a class="inboxbutt" href="http://localhost/anonymous/inbox">
                    inbox <i class="bi bi-envelope-fill"></i>
                </a>
                <div class="accbutt" id="accbutt" val="1" onclick="accpagefun(this.getAttribute('val'))">
                    Profile <i class="bi bi-person-heart"></i>
                </div>
            </div>
        </div>


    <?php
    } else { ?>
        <main class="main">
            <h3>You cannot access this page without login</h3>
            <a href="http://localhost/anonymous/register?utm_source=home&utm_medium=dna&utm_campaign=register">
                <button class="sendbutt">Login Now <i class="bi bi-arrow-right"></i></button></a>
        </main>
    <?php
    }
    ?>
    <div class="faq">
        <h3>FAQ</h3>
        <div class="questions">
            <hr class="hrline">
            <div class="faqopenbtn" qindex="0">
                <h5 class="faqquestion">Why ShareMSG link is not working?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>Please, enable cookies from your browser settings. Or Follow the below steps</p>
                <ol>
                    <li>Open (recommended to use Chrome Browser) For all Android, iPhone Device.</li>
                    <li>Go to More menu > Settings > Site settings > Cookies.
                        You’ll find the More menu icon in the top-right corner.</li>
                    <li>Make sure cookies are turned ‘on’ or ‘allow’.</li>
                </ol>
            </div>
            <hr class="hrline">
            <div class="faqopenbtn" qindex="1">
                <h5 class="faqquestion">Is someone abusing or threatening you?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>Dear user, I hope this message finds you well. I wanted to kindly remind you that when using the anonymous messaging service, the identities of the users sending messages are not stored. This means that there is no way for us or you to determine who sent a specific message.</p>
                <p>While I understand that this may be concerning for some, it is important to keep in mind that this is how our service operates.</p>
                <p>Now that you have a better understanding of the ShareMSG Link, I invite you to create your link and share it with your friends. This will allow you to start receiving anonymous compliments and messages. Thank you for your time and understanding.</p>
            </div>
            <hr class="hrline">
            <div class="faqopenbtn" qindex="2">
                <h5 class="faqquestion">Forgotten Your password?</h5>
                <span class="faqiconbtn"><i class="bi bi-patch-plus"></i></span>
            </div>
            <div class="answer">
                <p>Follow these steps to add Your email.</p>
                <ol>
                    <li>Go to Your “Profile".</li>
                    <li>Tap on “Email”.</li>
                    <li>Add your email. (Make sure to provide the correct email)</li>
                    <li>Tap on Save.</li>
                    <li>You will receive an Auto-relogin link on the email you have provided</li>
                </ol>
                <p>Sadly, if you did not use a valid email address in order to link your account to, or if you used a wrong email address, Our team will not be able to contact you and your account will not be retrieved.</p>
            </div>
        </div>
    </div>

    <?php include("include/footer1.php") ?>

    <?php
    if (strstr($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
    ?>
        <div class="popup">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">&times;</div>
                <img src="./img/android-icon-192x192.png" style="width:100px;" alt="Anonymous Messages icon for Android">
                <hr style="border:grey solid 1px;">
                <div class="android_prompt" style="display: none;">
                    <p>Add ShareMSG to Your Homescreen</p>
                    <button id="installbutton">Install</button>
                </div>
                <div class="ios_prompt" style="display: none;">
                    <p>1. Tap on <i class="bi bi-share-fill"></i>
                    </p>
                    <p>2. Select <span style="background-color:white;">"Add to Home Screen"</span></p>
                </div>
            </div>
        </div>
        <script src="http://localhost/anonymous/js/pwa.js?v=11.0"></script>
        <script>
            itisios();
        </script>
    <?php
    } else {
    ?>
        <div class="popup">
            <span class="helper"></span>
            <div>
                <div class="popupCloseButton">&times;</div>
                <img src="./img/android-icon-192x192.png" style="width:100px;" alt="Anonymous Messages icon for Android">
                <hr style="border:grey solid 1px;">
                <p>Add ShareMSG to Your Homescreen</p>
                <button id="installbutton">Install</button>
            </div>
        </div>
        <script src="http://localhost/anonymous/js/pwa.js?v=11.0"></script>
        <script>
            notios();
        </script>
    <?php
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/main.js?v=11.0"></script>
    <script src="js/home.js?v=11.0"></script>
    <script>
        function sharenow() {
            const url = 'http://localhost/anonymous/img/banner.jpg';
            const myRequest = new Request(url);
            fetch(myRequest)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.blob();
                })
            var share;
            if ('canShare' in navigator) {
                const share = async function(shareimg, sharetitle, sharetext) {
                    try {
                        const response = await fetch(shareimg);
                        const blob = await response.blob();
                        const file = new File([blob], 'ShareMSG.jpg', {
                            type: blob.type
                        });
                        await navigator.share({
                            title: sharetitle,
                            text: sharetext,
                            files: [file]
                        });
                    } catch (err) {
                        console.log(err.name, err.message);
                    }
                };
                share("http://localhost/anonymous/img/banner.jpg", "Share Message - ShareMSG", "Tell me a secret message you haven't told me yet 😜  *http://localhost/anonymous/@<?php echo $_SESSION["linkid"]; ?>");
            } else {
                console.log("canShare not found");
            }
        }
    </script>
</body>


</html>