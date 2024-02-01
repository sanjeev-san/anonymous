<?php

use function PHPSTORM_META\type; //?i did this but why

if (!defined("TAG")) {
    die('Kal aana');
}

function get_client_ip()
{
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function saitama($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; //input string
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

//update last seen time
function lastseen()
{
    global $conn;
    $secret_key = $_SESSION["secret_key"];
    //query to update data
    $query = "UPDATE `users` SET `lastseen`=CURRENT_TIMESTAMP WHERE `secret_key`='$secret_key';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        return 1;
    }
    return 0;
}

//function to create new user
function createuser()
{
    global $conn;
    //TODO input restriction check to avoid unnecessary db calls
    $uname = $_POST["name"];
    //sanitizing
    $uname = strip_tags($uname);
    $uname = $conn->real_escape_string($uname);
    //sanitizing done
    $linkid = saitama(6);
    //sanitizing
    $linkid = strip_tags($linkid); //? do we need to sanitize this
    $linkid = $conn->real_escape_string($linkid);
    //sanitizing done
    $secret_key = saitama(8);
    //sanitizing
    $secret_key = strip_tags($secret_key);
    $secret_key = $conn->real_escape_string($secret_key);
    //sanitizing done

    $ip = get_client_ip();

    if (isset($_COOKIE['refid'])) {
        //if referrer id exist in cookie
        $refid = $_COOKIE['refid'];
        //sanitizing
        $refid = strip_tags($refid);
        $refid = $conn->real_escape_string($refid);
        //sanitizing done
        //query to insert data
        $query = "INSERT INTO `users` (`username`,`linkid`,`secret_key`,`refid`,`ip`) VALUES ('$uname','$linkid','$secret_key','$refid','$ip')";
    } else {
        //if refid does not exist
        //query to insert data
        $query = "INSERT INTO `users` (`username`,`linkid`,`secret_key`,`ip`) VALUES ('$uname','$linkid','$secret_key','$ip')";
    }
    $sql = $conn->query($query);
    if (!$sql) {
        //sql error
        header("Location: http://localhost/anonymous/register?utm_source=register&utm_medium=error&utm_campaign=register");
        exit();
    }
    //set cookie and session data
    setcookie("connstatus", $secret_key, time() + (365 * 24 * 3600), "/"); //cookie reset     
    setcookie("customquery", "default", time() + (365 * 24 * 3600), "/"); //cookie set
    $_SESSION["linkid"] =  $linkid;
    $_SESSION["uname"] =  $uname;
    $_SESSION["secret_key"] =  $secret_key;
    return 0;
}

//finction to login users by using name and password
function relogin()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $uname = $_POST["uname"]; //??do we need to check username match because secret-pin itself will be unique
    //sanitizing
    $uname = strip_tags($uname);
    $uname = $conn->real_escape_string($uname);
    //sanitizing done
    $password = $_POST["psw"];
    //sanitizing
    $password = strip_tags($password);
    $password = $conn->real_escape_string($password);
    //sanitizing done
    //query return rows with given form data
    $query = "SELECT `linkid`,`status`,`query` FROM `users` WHERE `secret_key`='$password' AND `username`='$uname';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        header("Location: http://localhost/anonymous/register?utm_source=relogin&utm_medium=error&utm_campaign=register");
        exit();
    }
    if (mysqli_num_rows($sql) == 0) {
        //query returns 0 rows
        header("Location: http://localhost/anonymous/register?utm_source=relogin&utm_medium=dna1&utm_campaign=register");
        exit();
    }
    $row = $sql->fetch_assoc();
    if ($row["status"] == 0) {
        //account deactivated
        header("Location: http://localhost/anonymous/register?utm_source=relogin&utm_medium=dna2&utm_campaign=register");
        exit();
    }
    //setting cookie and session data
    setcookie("connstatus", $password, time() + (365 * 24 * 3600), "/"); //cookie reset
    if ($row['query'] != NULL) {
        setcookie("customquery", $row['query'], time() + (365 * 24 * 3600), "/"); //cookie set
    } else {
        setcookie("customquery", 'default', time() + (365 * 24 * 3600), "/"); //cookie set
    }
    $_SESSION["linkid"] =  $row['linkid'];
    $_SESSION["uname"] =  $uname;
    $_SESSION["secret_key"] =  $password;
    return 0;
}

//logging the user in  automatically
function autologin()
{
    if (isset($_SESSION["secret_key"])) {
        //if the user is already logged in
        return 0;
    } else if (isset($_COOKIE["connstatus"])) {
        //TODO input restriction check to avoid unnecessary db calls
        //if the user is not logged in but has account data
        global $conn;
        //??is this needed
        $connstatus = strip_tags($_COOKIE["connstatus"]);
        $connstatus = $conn->real_escape_string($connstatus);
        //question ends
        $query = "SELECT `username`,`linkid`,`query` FROM `users` WHERE `secret_key`='$connstatus' AND `status`='1';";
        $sql = mysqli_query($conn, $query);
        if (!$sql) {
            //sql error
            header("Location: http://localhost/anonymous/register?utm_source=autologin&utm_medium=error&utm_campaign=register");
            exit("Some error occured"); //??should this be given at each redirect
        }
        if ($sql->num_rows == 0) {
            //if no data with given secret_key exist
            setcookie("connstatus", $connstatus, time() - (30 * 24 * 3600), "/"); //remove client side cookie
            header('Location: http://localhost/anonymous/register?utm_source=autologin&utm_medium=dna&utm_campaign=register');   //redirect to index
            exit();
        } else {
            //if at least one row exist                   
            $row = $sql->fetch_assoc();
            //set session data
            $_SESSION["linkid"] =  $row['linkid'];
            $_SESSION["uname"] =  $row['username'];
            $_SESSION["secret_key"] =  $connstatus;
            setcookie("connstatus", $connstatus, time() + (365 * 24 * 3600), "/"); //cookie reset 
            if ($row['query'] != NULL) {
                setcookie("customquery", $row['query'], time() + (365 * 24 * 3600), "/"); //cookie set
            } else {
                setcookie("customquery", 'default', time() + (365 * 24 * 3600), "/"); //cookie set
            }
            return 1;
        }
    } else {
        //the user does not have account data 
        return 2;
    }
}

//sendding message to user
function sendmessage()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $message = $_POST["message"]; //the message
    //sanitizing
    $message = strip_tags($message);
    $message = $conn->real_escape_string($message);
    //sanitizing done
    $refid = $_POST["refid"];
    //sanitizing
    $refid = strip_tags($refid);
    $refid = $conn->real_escape_string($refid);
    //sanitizing done 
    $query = $_POST["query"];
    //sanitizing
    $query = strip_tags($query);
    $query = $conn->real_escape_string($query);
    //sanitizing done    
    $ip = get_client_ip();
    //TODO this check call to db can be spammed, prevent it (maybe some kinda variable or ip blocking)
    $check_record = $conn->query("SELECT COUNT(aid) FROM `inbox` WHERE `linkid`='$refid' AND `ip`='$ip' AND created>DATE_SUB(NOW(), INTERVAL 1 MINUTE)"); //spam protect
    $countsex = $check_record->fetch_row();
    if ($countsex[0] == 0) {
        //GO AHEAD AND DO IT
        //query to insert message
        if ($query != "default") {
            $sqlquery = "INSERT INTO `inbox` (`linkid`,`message`,`ip`,`query`) VALUES ('$refid','$message','$ip','$query')";
        } else {
            $sqlquery = "INSERT INTO `inbox` (`linkid`,`message`,`ip`) VALUES ('$refid','$message','$ip')";
        }
        $sql = mysqli_query($conn, $sqlquery);
        if (!$sql) {
            //sql error
            return 1;
        }
        header('Refresh: 8; URL=http://localhost/anonymous/register');
        return 0;
    } else {
        //FAKE SUCCESS MESSAGE
        header('Refresh: 8; URL=http://localhost/anonymous/register');
        return 2;
    }
}

//displaying the send page on initial load of send
function displaysendpage()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn, $refid;
    $refid = $_GET["id"]; //data form link
    //sanitizing
    $refid = strip_tags($refid);
    $refid = $conn->real_escape_string($refid);
    //sanitizing done
    //query to retrieve user info
    $query = "SELECT `username`,`status`,`query` FROM `users` WHERE `linkid`='$refid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        return 1;
    }
    if ($sql->num_rows == 0) {
        //if no data with given linkid exist
        return 2;
    } else {
        //if data exists
        $row = $sql->fetch_assoc();
        global $uname, $query;
        $uname = $row["username"];
        $query = $row["query"];
        setcookie("refid", $refid, time() + (365 * 24 * 3600), "/"); //cookie set 
        if ($row["status"] == 0) {
            //user is deactivated
            return 3;
        } else {
            return 0;
        }
    }
}

//deleting/deactivating user account
function deleteuser()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $message = $_POST["feedback"]; //feddback message
    //sanitizing
    $message = strip_tags($message);
    $message = $conn->real_escape_string($message);
    //sanitizing done    
    $secret_key = $_SESSION["secret_key"];
    //removing session data
    setcookie("connstatus", $secret_key, time() - (30 * 24 * 3600), "/"); //remove client side cookie
    unset($_SESSION["secret_key"]);
    unset($_SESSION["linkid"]);
    unset($_SESSION["uname"]);
    //query to deactivate user info
    $query = "UPDATE `users` SET `status`=0 WHERE `secret_key`='$secret_key';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        return 1;
    }
    return 0;
}

//loading message in the inbox from initial call - currently it returns all mesaages in json
function loadmessage()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $getdata = $_POST["getdata"];
    $linkid = $_SESSION["linkid"];
    //query to fetch all messages 
    if ($getdata == 0) {
        $query = "SELECT `aid`,`message`,`created`,`readstatus`,`query` FROM `inbox` WHERE `linkid`='$linkid'  ORDER BY `created` DESC LIMIT 8;";
    } else {
        $query = "SELECT `aid`,`message`,`created`,`readstatus`,`query` FROM `inbox` WHERE `linkid`='$linkid'  AND `aid`<'$getdata' ORDER BY `created` DESC LIMIT 4;";
    }

    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        return 1;
    }
    //creating an array of messages
    $arr = [];
    $var = 1;
    while ($row = mysqli_fetch_array($sql)) {
        $arr[$var] = array($row["aid"], $row["message"], $row["created"], $row["readstatus"], $row["query"]);
        $var++;
    }
    echo json_encode($arr);
    return 0;
}
// logout function
function logout()
{
    $secret_key = $_SESSION["secret_key"];
    //removing session data
    setcookie("connstatus", $secret_key, time() - (30 * 24 * 3600), "/"); //remove client side cookie
    unset($_SESSION["secret_key"]);
    unset($_SESSION["linkid"]);
    unset($_SESSION["uname"]);
    header("Location: http://localhost/anonymous/register?utm_source=logout&utm_medium=success&utm_campaign=register");
    exit();
}

// get email -- only for home page
function getemail()
{
    global $conn;
    $linkid = $_SESSION["linkid"];
    $query = "SELECT `email` FROM `users` WHERE `linkid`='$linkid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        return 1;
    }
    $row = mysqli_fetch_assoc($sql);
    if ($row['email'] == '') {
        echo json_encode(0);
        return 0;
    } else {
        echo json_encode($row['email']);
        return 0;
    }
}

// set email -- only for home page
function setemail()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $linkid = $_SESSION["linkid"];
    $email = $_POST["setmail"]; // email
    //sanitizing
    $email = strip_tags($email);
    $email = $conn->real_escape_string($email);
    //sanitizing done 
    $query = "UPDATE `users` SET `email`='$email' WHERE `linkid`='$linkid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        echo 1;
        return 1;
    }
    echo 0;
    return 0;
}

//update readstatus of one message 
function updatereadstatus()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $linkid = $_SESSION["linkid"];
    $aid = $_POST["updatestatus"]; // aid
    //sanitizing
    $aid = strip_tags($aid);
    $aid = $conn->real_escape_string($aid);
    //sanitizing done 
    $query = "UPDATE `inbox` SET `readstatus`=1 WHERE `aid`='$aid' AND `linkid`='$linkid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        echo 1;
        return 1;
    }
    echo 0;
    return 0;
}

//delete one message
function deletemessage()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $linkid = $_SESSION["linkid"];
    $aid = $_POST["delete"]; // aid
    //sanitizing
    $aid = strip_tags($aid);
    $aid = $conn->real_escape_string($aid);
    //sanitizing done 
    $query = "DELETE FROM `inbox` WHERE `aid`='$aid' AND `linkid`='$linkid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        echo 1;
        return 1;
    }
    echo 0;
    return 0;
}

//clearing box by user prompt
function clearinbox()
{
    global $conn;
    $linkid = $_SESSION["linkid"];
    $clear = $_POST["clear"]; //this is just a post variable from ajax not used anywhere
    $query = "DELETE FROM `inbox` WHERE `linkid`='$linkid';";
    $sql = mysqli_query($conn, $query);
    if (!$sql) {
        //sql error
        echo 1;
        return 1;
    }
    echo 0;
    return 0;
}

// set query -- only for home page
function setquery()
{
    //TODO input restriction check to avoid unnecessary db calls
    global $conn;
    $linkid = $_SESSION["linkid"];
    $query = $_POST["setquery"]; // query        
    //sanitizing
    $query = strip_tags($query);
    $query = $conn->real_escape_string($query);
    //sanitizing done 
    //TODO this check call to db can be spammed, prevent it (maybe some kinda variable or ip blocking)
    $check_record = $conn->query("SELECT COUNT(`linkid`) FROM `users` WHERE `linkid`='$linkid' AND querytime>DATE_SUB(NOW(), INTERVAL 48 HOUR)"); //spam protect
    $countsex = $check_record->fetch_row();
    if ($countsex[0] == 0) {
        if ($query == "default") {
            $sqlquery = "UPDATE `users` SET `query`=NULL,`querytime`=CURRENT_TIMESTAMP WHERE `linkid`='$linkid';";
            setcookie("customquery", "default", time() + (365 * 24 * 3600), "/"); //cookie set
        } else {
            $sqlquery = "UPDATE `users` SET `query`='$query',`querytime`=CURRENT_TIMESTAMP WHERE `linkid`='$linkid';";
            setcookie("customquery", $query, time() + (365 * 24 * 3600), "/"); //cookie set
        }
        $sql = mysqli_query($conn, $sqlquery);
        if (!$sql) {
            //sql error
            echo 1;
            return 1;
        }
        setcookie("customquery", $query, time() + (365 * 24 * 3600), "/"); //cookie set     
        echo 0;
        return 0;
    } else {
        echo 2;
        return 2;
    }
}

// function userdefinedfunc(){
//     global $SessDBcon;
//     $handler = new \SekureSessions\SessionHandler\SessionHandler($SessDBcon, 'sess_storage');
//     session_set_save_handler($handler, true);
//     session_start();
// }
