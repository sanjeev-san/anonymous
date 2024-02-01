<?php

error_reporting(0);

// connection with database
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Call it for Normal Usage -- Change $DBCon Here
$conn = new MySQLi($servername, $username, $password, $dbname);
$query = "SELECT DISTINCT(`linkid`) AS 'linkid' FROM `inbox` WHERE `readstatus`='0'  AND `created`>DATE_SUB(NOW(), INTERVAL 48 HOUR);";

$sql = mysqli_query($conn, $query);
if (!$sql) {
    //sql error
    exit;
}
//creating an array of messages
$arr = array();
while ($row = mysqli_fetch_array($sql)) {
    array_push($arr,$row["linkid"]);   
}

function sendMessage()
{
    global $arr;
   
    $fields = array(
        'app_id' => "",
        'include_external_user_ids' => $arr,
        'channel_for_external_user_ids' => 'push',
        'data' => array("foo" => "bar"),
        'template_id' => '',
        'url' => 'http://localhost/anonymous/inbox',
        'content_available' => true
    );

    $fields = json_encode($fields);
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic '
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

$response = sendMessage();
