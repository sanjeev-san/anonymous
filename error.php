<?php
if (isset($_GET['c'])) {
    $c = $_GET['c'];
    $d = "Looks like some error occured.";
    if ($c == 404) {
        $d = "Looks like the page you were looking for is no longer here.";
    }
} else {
    $c = "???";
    $d = "Looks like some error occured. This could be server issue. ";
}

$pagename = "Error " . $c;

?>
<!DOCTYPE html>

<div class="center">
    <p class="text">ERROR : <?php echo $c; ?></p>
    <p class="text"><?php echo $d; ?></p>
    <p class="text"><a type="button" href=" http://localhost/anonymous/register.php">Back to home</a></p>

</div>

<style>
    .offline {
        width: 20%;
    }

    .text {
        text-align: center;
        font-size: 40px;
    }
</style>