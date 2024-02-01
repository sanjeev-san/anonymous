<?php
if (!defined("TAG")) {
    die('Kal aana');
}
?>

<header>
    <a class="logo" href="http://localhost/anonymous/home" id="logo">
        <img src="http://localhost/anonymous/img/logo.png" alt="logo" width="50px">
        <!-- <i class="fa-brands fa-bootstrap"></i> -->
    </a>
    <nav>
        <ul class="nav__links">
            <li><a href="http://localhost/anonymous/home">Home</a></li>
            <li><a href="http://localhost/anonymous/legal">Legal</a></li>
        </ul>
    </nav>
    <!-- <a class="cta" href="http://localhost/anonymous/contact">Contact</a> -->
    <button class="cta1" onclick="colorpicker()">Theme <i class="bi bi-palette-fill"></i></button>

    <!-- colormodal -->
    <div id="colormodal" class="colormodal">
        <!-- colormodalcontent -->
        <div class="colormodalcontent">
            <span class="close" id="colormodalclose">&times;</span>
            <!-- Theme -->
            <form class="color-picker" action="">

                <!-- <legend >Pick a color scheme</legend> -->
                <div class="theme"><label for="light">Light</label>
                    <input type="radio" name="theme" id="light">
                </div>
                <div class="theme"><label for="dark">Dark</label>
                    <input type="radio" name="theme" id="dark">
                </div>
                <div class="theme"><label for="cyberpunk">Candy</label>
                    <input type="radio" id="cyberpunk" name="theme">
                </div>

                <div class="theme"><label for="blue">Blue Ocean</label>
                    <input type="radio" id="blue" name="theme">
                </div>

            </form>
        </div>

    </div>

    <p class="cta menu" id="menu"><i class="bi bi-list"></i></p>
    <!-- THEME -->
</header>
<div id="mobile__menu" class="overlay">
    <a class="close" id="navbarclose">&times;</a>
    <div class="overlay__content">
        <a href="http://localhost/anonymous/home">Home</a>
        <a href="http://localhost/anonymous/disclaimer">Disclaimer</a>
        <a href="http://localhost/anonymous/terms">Terms</a>
        <a href="#">Policy</a>
        <a href="http://localhost/anonymous/about">About</a>
    </div>
</div>