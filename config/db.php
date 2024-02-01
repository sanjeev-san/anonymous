<?php
if (!defined("TAG")) {
    die('Kal aana');
}

error_reporting(0);


// connection with database
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Call it for Normal Usage -- Change $DBCon Here
$conn = new MySQLi($servername,$username,$password,$dbname);

//Check if connection is working or not.
if ($conn->connect_errno) {
    die('<meta http-equiv="refresh" content="0;url=http://localhost/anonymous/error?c=500" />');
}

// Call it for Global tagging
// $SessDBcon = new MySQLi($servername,$username,$password,$dbname);


