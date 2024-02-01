<?php
define("TAG", 1);
$pagename = "Legal - ShareMSG Anonymous Messaging Website";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("include/head.php") ?>
</head>

<body>
    <?php include("include/navbar.php") ?>

    <div class="terms">
        <h1>Legal</h1>

        <div class="para">
            <!-- About Us -->
            <div>
                <h4 id="about" class="legalbutt">About Us</h4>
                <div class="dataseen" name="about" style="display: block;">
                    <p>
                        Welcome to ShareMSG, the anonymous messaging website that connects you with others in a friendly and safe environment. Whether you're looking to connect with friends, vent about your day, or just chat with someone new, ShareMSG has you covered. Our user-friendly interface makes it easy to get started, and our commitment to privacy ensures that your conversations will always remain confidential.
                    </p>

                    <a href="http://localhost/anonymous/about" target="_blank">Read More...</a>
                </div>
            </div>
            <!-- Disclaimer -->
            <div>
                <h4 id="disclaimer" class="legalbutt">Disclaimer </h4>
                <div class="dataseen" name="disclaimer">
                    <p>
                        Welcome to ShareMSG! We are a platform dedicated to providing a safe and secure space for individuals to communicate freely and without fear of judgment. Our website allows users to send and receive messages without revealing their identity. We believe that everyone has the right to express themselves without fear of retribution, and our platform provides a way for people to do so.
                    </p>

                    <a href="http://localhost/anonymous/disclaimer" target="_blank">Read More...</a>
                </div>
            </div>
            <!-- Contact Us -->
            <div>
                <h4 id="contact" class="legalbutt">Contact Us</h4>
                <div class="dataseen" name="contact">
                    <p>
                        Hi there! Thank you for visiting ShareMSG. We hope you are enjoying using our anonymous messaging platform. If you have any questions, feedback, or suggestions for us, we would love to hear from you. You can reach us through our <a href="http://localhost/anonymous/contact">contact page</a>. We are always looking for ways to improve our service, and your input is invaluable to us. Thanks again for choosing ShareMSG, and we look forward to hearing from you soon!
                    </p>
                    <a href="http://localhost/anonymous/contact" target="_blank">Read More...</a>
                </div>
            </div>
            <!-- Terms & Conditions -->
            <div>
                <h4 id="terms" class="legalbutt">Terms and Conditions</h4>
                <div class="dataseen" name="terms">
                    <p>
                        ShareMSG Web, including ShareMSG Web's subsidiaries, affiliates, divisions, contractors and all data sources and suppliers, (collectively "ShareMSG Web", "ShareMSG", "we", "us" or "our") welcomes you to "www.ShareMSG" and/or "www.ShareMSG.me" (the "Website"). These terms and conditions of service (collectively, with ShareMSG's Privacy Policy, located at http://localhost/anonymous/terms, the "Terms of Use" or "Agreement") govern your use of the Website and the services, features, content or applications operated by ShareMSG (together with the Website, the "Services"), and provided to the Users (the "user", "sub-user", "you" or "your").
                    </p>
                    <a href="http://localhost/anonymous/terms" target="_blank">Read More...</a>
                </div>
            </div>
            <!-- Privacy Policy -->
            <div>
                <h4 id="privacy" class="legalbutt">Privacy Policy</h4>
                <div class="dataseen" name="privacy">
                    <p>Thank you for visiting our anonymous messaging website (the "shareMSG.me"). We are committed to protecting the privacy of our users and have implemented the following privacy policy ("Policy") to explain how we collect, use, and share information about you when you use the Site. By using the Site, you agree to the collection, use, and sharing of your information as described in this Policy.</p>
                    <a href="http://localhost/anonymous/privacy" target="_blank">Read More...</a>

                </div>
            </div>
        </div>
    </div>

    <?php include("include/footer1.php") ?>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="js/main.js?v=11.0"></script>
    <script>
        const divbutt = document.querySelectorAll(".legalbutt")
        const divlist = document.querySelectorAll(".dataseen")
        var lastbutt = 'about';
        divbutt.forEach((butt) => {
            butt.addEventListener("click", () => {

                var buttid = butt.id;
                if (buttid != lastbutt) {
                    divlist.forEach((divele) => {
                        divele.style.display = "none"
                    })
                    lastbutt = buttid
                    const divele = document.querySelector(`[name='${buttid}']`)
                    divele.style.display = "block"
                }

            })
        })
    </script>
</body>

</html>