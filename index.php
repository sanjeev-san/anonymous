<?php
define("TAG", 1);
$pagename = "ShareMSG - Free Anonymous Messaging Website";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ShareMSG allows you to send anonymous messages or confess your feelings anonymously.">
    <meta name="keywords" content="anonymous messaging, anonymous messaging website, free anonymous messages">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pagename;  ?></title>

    <link rel="icon" href="http://localhost/anonymous/img/favicon-32x32.png" type="image/x-icon">
    <meta name="theme-color" content="#e75151">
    <link rel="apple-touch-icon" href="http://localhost/anonymous/img/apple-icon-180x180.png">
    <link rel="manifest" href="http://localhost/anonymous/manifest.json">

    <meta property="og:url" content="http://localhost/anonymous/" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo $pagename ?>" />
    <meta property="og:description" content="ShareMSG allows you to send anonymous messages or confess your feelings anonymously." />
    <meta property="og:image" content="http://localhost/anonymous/img/banner.jpg" />
    <meta property="fb:app_id" content="966242223397117" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/index.css?v=11.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">


</head>

<body>

    <header>
        <a class="logo" href="/" id="logo">
            <span>ShareMSG</span>
            <img src="http://localhost/anonymous/img/new-logo.svg" alt="">
        </a>
        <nav class="nav">
            <ul class="nav__links">
                <li><a href="http://localhost/anonymous/home">Home</a></li>
                <li><a href="http://localhost/anonymous/about">About Us</a></li>
                <li><a href="http://localhost/anonymous/contact">Contact Us</a></li>
            </ul>
        </nav>

        <p class="cta menu" id="menu"><img src="http://localhost/anonymous/img/hamburger.svg" alt=""></p>

    </header>

    <div id="mobile__menu" class="overlay">
        <a class="close" id="navbarclose">&times;</a>
        <div class="overlay__content">
            <a href="http://localhost/anonymous/home">Home</a>
            <a href="http://localhost/anonymous/disclaimer">Disclaimer</a>
            <a href="http://localhost/anonymous/terms">Terms & Conditions</a>
            <a href="http://localhost/anonymous/policy">Privacy Policy</a>
            <a href="http://localhost/anonymous/about">About Us</a>
        </div>
    </div>


    <main class="main">
        <div class="main-left">
            <p class="main-heading1">Welcome to</p>
            <p class="main-heading2">ShareMSG</p>
            <p class="main-text">The free anonymous messaging website! Here, you can send messages to friends and family without anyone knowing who sent it.</p>
            <p class="main-text">With ShareMSG, you can send messages without any personal information attached, giving you the freedom to be yourself. So join us today and start sending messages to your loved ones!</p>
            <p class="main-button" id="main-button">Get Started</p>
        </div>
        <img src="http://localhost/anonymous/img/page-icon4.png" alt="" class="main-right">

    </main>

    <section class="section1" id="about">
        <div class="section-heading">
            <p class="heading">About Us</p>
        </div>
        <div class="section-right-2">
            <img src="http://localhost/anonymous/img/page-icon1.svg" alt="" class="section-img">
        </div>
        <div class="section-left">
            <p class="section-content">Welcome to ShareMSG, the anonymous messaging website that connects you with others in a friendly and safe environment. Whether you're looking to connect with friends, vent about your day, or just chat with someone new, ShareMSG has you covered. Our user-friendly interface makes it easy to get started, and our commitment to privacy ensures that your conversations will always remain confidential.</p>
            <a href="http://localhost/anonymous/about">
                <button class="section-button">
                    Read More
                </button>
            </a>
        </div>
        <div class="section-right-1">
            <img src="http://localhost/anonymous/img/page-icon1.svg" alt="" class="section-img">
        </div>
    </section>

    <section class="section2" id="disclaimer">
        <div class="section-heading">
            <p class="heading">Disclaimer</p>
        </div>
        <div class="section-right-2">
            <img src="http://localhost/anonymous/img/page-icon2.svg" alt="" class="section-img">
        </div>
        <div class="section-right-1">
            <img src="http://localhost/anonymous/img/page-icon2.svg" alt="" class="section-img">
        </div>
        <div class="section-left">
            <p class="section-content">We take the privacy and security of our users very seriously, and we have implemented measures to ensure that all messages are kept strictly confidential. We do not collect any personal information from our users, and we do not track or monitor their activity on our website. We hope that our platform can provide a helpful and supportive space for people to share their thoughts, feelings, and experiences.</p>
            <a href="http://localhost/anonymous/disclaimer">
                <button class="section-button">
                    Read More
                </button>
            </a>
        </div>

    </section>

    <section class="section1" id="privacy-policy">
        <div class="section-heading">
            <p class="heading">Privacy Policy</p>
        </div>
        <div class="section-right-2">
            <img src="http://localhost/anonymous/img/page-icon3.svg" alt="" class="section-img">
        </div>
        <div class="section-left">
            <p class="section-content">Thank you for visiting our anonymous messaging website (the "shareMSG.me"). We are committed to protecting the privacy of our users and have implemented the following privacy policy ("Policy") to explain how we collect, use, and share information about you when you use the Site. By using the Site, you agree to the collection, use, and sharing of your information as described in this Policy.</p>
            <a href="http://localhost/anonymous/privacy">
                <button class="section-button">
                    Read More
                </button>
            </a>
        </div>
        <div class="section-right-1">
            <img src="http://localhost/anonymous/img/page-icon3.svg" alt="" class="section-img">
        </div>
    </section>





    <footer class="footer">
        <div class="footer-left">
            <p class="footer-heading">ShareMSG</p>
            <p class="copyright">&copy;2023 ShareMSG | All Rights Reserved</p>
        </div>
        <div class="footer-right">
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="#" aria-label="Facebook logo">
                        <i class="bi bi-facebook"></i>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#" aria-label="Twitter logo">
                        <i class="bi bi-twitter"></i>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="#" aria-label="Google logo">
                        <i class="bi bi-google"></i>
                    </a></li>
            </ul>
            <p class="foooter-text">Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
            <form class="input-group" method="post" onsubmit="submitmail(event);">
                <input type="text" class="form-control" id="userEmail" placeholder="Enter email" aria-label="Example input" aria-describedby="button-addon1" required />
                <button class="btn btn-primary" type="submit" id="button-addon1" data-mdb-ripple-color="dark">
                    <i class="bi bi-send-fill"></i>
                </button>
            </form>
            <ul class="footer-link">
                <li class="footer-link__item"><a class="footer-link__link" href="http://localhost/anonymous/home" target="_blank">
                        Home
                    </a></li>
                <li class="footer-link__item"><a class="footer-link__link" href="http://localhost/anonymous/privacy" target="_blank">
                        Privacy
                    </a></li>
                <li class="footer-link__item"><a class="footer-link__link" href="http://localhost/anonymous/terms" target="_blank">
                        Terms
                    </a></li>
                <li class="footer-link__item"><a class="footer-link__link" href="http://localhost/anonymous/contact" target="_blank">
                        Contact
                    </a></li>
            </ul>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="js/main.js?v=11.0"></script>
    <script>
        document.querySelector("#main-button").addEventListener('click', () => {
            window.location.replace("http://localhost/anonymous/register");
        })

        function submitmail(event) {
            event.preventDefault();
            let userEmail=document.getElementById("userEmail");
            let regex = /^[a-z0-9]+@[a-z]+\.[a-z]{2,3}$/;
            let result = regex.test(userEmail.value);
            if(result){                
                console.log("send request via ajax");
            }else{
                alert("Enter a valid email");
            }
        }
    </script>


</body>

</html>