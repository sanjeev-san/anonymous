function copyText() {
    var copyText = document.getElementById("link");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
    alert("Copied the text: " + copyText.value);
}

function accpagefun(val) {
    if (val == 1) {
        $("#sharepage").fadeOut(() => {
            $("#accpage").fadeIn();
            document.getElementById("accbutt").innerHTML = 'Home <i class="bi bi-house-heart-fill"></i>';
            document.getElementById("accbutt").setAttribute('val', '2');
        })
    } else {
        $("#accpage").fadeOut(() => {
            $("#sharepage").fadeIn();
            document.getElementById("accbutt").innerHTML = 'Profile <i class="bi bi-person-heart"></i>';
            document.getElementById("accbutt").setAttribute('val', '1');
        })
    }

}

function logout() {
    if (confirm("Are you sure you want logout?? Please take note of your login details for future login.") == true) {
        window.location.href = "http://localhost/anonymous/deactivate?do=logout";
    } else {
        return
    }
}

function usernamefun(id) {
    var usernamediv = document.getElementById(`${id}`);
    usernamediv.innerHTML = username;
}

function passwordfun(id) {
    var passworddiv = document.getElementById(`${id}`);
    passworddiv.innerHTML = password;

}

var mailcheckcall = 0;

function email(obj1) {
    if (mailcheckcall == 0) {
        $.ajax({
            url: "http://localhost/anonymous/home",
            method: "POST",
            dataType: "text",
            data: {
                getmail: "mail"
            },
            beforeSend: function () {
                console.log("fetching email");
            },
            success: function (o) {
                mailcheckcall++;
                var obj = JSON.parse(o);
                if (obj == '') {
                    alert("Please set your email first");
                    $("#emailset").fadeIn();
                    obj1.style.display = "none";
                } else {
                    $("#emailset").remove();
                    obj1.innerHTML = obj;
                }
            },
            failure: function () {
                alert("Failed to retireve your mail");
            }
        })
    }
}

function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return (true);
    }
    alert("You have entered an invalid email address!");
    return (false);
}

function setemail(obj1) {
    var data = document.getElementById("email").value;
    if (ValidateEmail(data) == false) {
        return;
    }
    $.ajax({
        url: "http://localhost/anonymous/home",
        method: "POST",
        dataType: "text",
        data: {
            setmail: data
        },
        beforeSend: function () {
            console.log("setting email");
        },
        success: function (o) {
            $("#emailset").remove();
            document.getElementById("emailfetch").innerHTML = data;
            $("#emailfetch").fadeIn();
        },
        failure: function () {
            alert("failed");
        }
    })
}

function clearinbox() {
    if (confirm("This will delete all your messages permanently. Do you want to proceed?") == false) {
        return;
    }
    $.ajax({
        url: "http://localhost/anonymous/home",
        method: "POST",
        dataType: "text",
        data: {
            clear: 1
        },
        beforeSend: function () {
            console.log("clearing");
        },
        success: function (o) {
            if (o == 0) {
                console.log("success");
            } else {
                console.log("Failed to clear");
            }
        },
        failure: function () {
            alert("Failed to send clear inbox request");
        }
    })
}

var customqueryeditEL = document.getElementById("customqueryedit");
var customquerysetEL = document.getElementById("customqueryset");
var defaultquerysetEL = document.getElementById("defaultqueryset");
var cancelquerysetEL = document.getElementById("cancelqueryset");
var queryEL = document.getElementById("query");

function customqueryedit() {
    queryEL.readOnly = false;
    customqueryeditEL.style.display = "none";
    customquerysetEL.style.display = "inline-block";
    defaultquerysetEL.style.display = "inline-block";
    cancelquerysetEL.style.display = "inline-block";
}
function customqueryset() {
    queryEL.readOnly = true;
    customquerysetEL.style.display = "none";
    defaultquerysetEL.style.display = "none";
    cancelquerysetEL.style.display = "none";
    customqueryeditEL.style.display = "inline-block";
    var data = document.getElementById("query").value;
    $.ajax({
        url: "http://localhost/anonymous/home",
        method: "POST",
        dataType: "text",
        data: {
            setquery: data
        },
        beforeSend: function () {
            console.log("setting query");
        },
        success: function (o) {
            alert("Your custom topic was successfully saved");
        },
        failure: function () {
            alert("Some error occured. Remember you can only change your query once every 48 hours");
        }
    })
}
function defaultqueryset() {
    queryEL.readOnly = true;
    customquerysetEL.style.display = "none";
    defaultquerysetEL.style.display = "none";
    cancelquerysetEL.style.display = "none";
    customqueryeditEL.style.display = "inline-block";
    $.ajax({
        url: "http://localhost/anonymous/home",
        method: "POST",
        dataType: "text",
        data: {
            setquery: "default"
        },
        beforeSend: function () {
            console.log("setting query");
        },
        success: function (o) {
            alert("Your default topic was successfully saved");
        },
        failure: function () {
            alert("Some error occured. Remember you can only change your query once every 48 hours");
        }
    })
}
function cancelqueryset() {
    queryEL.readOnly = true;
    customquerysetEL.style.display = "none";
    defaultquerysetEL.style.display = "none";
    cancelquerysetEL.style.display = "none";
    customqueryeditEL.style.display = "inline-block";
}