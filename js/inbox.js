let firstload = 0;
let lastload = 0;
let getdata = 0;
var loadmore = document.getElementById("loadmore");
if (firstload == 0) {
    loadmessage();
}

var modal = document.getElementById("myModal");
var span = document.getElementById("close");
var message = document.getElementById("message");
var time = document.getElementById("time");
var query = document.getElementById("query");
var deletemessage = document.getElementById("deletemessage");
var sharebutt = document.getElementById("sharebutt");

function messageread(a) {
    deletemessage.setAttribute("curr", a.id);
    sharebutt.setAttribute("curr", a.id);

    if (a.getAttribute("readstatus") == 0) {
        a.setAttribute("readstatus", "1");
        a.innerHTML = '<i class="bi bi-envelope-open-heart"></i>';        
        $.ajax({
            url: "http://localhost/anonymous/inbox",
            method: "POST",
            dataType: "text",
            data: {
                updatestatus: a.id
            },
            beforeSend: function () {
                console.log("updating");
            },
            success: function (o) {
                if (o == 0) {
                    console.log("success");
                } else {
                    console.log("failure");
                }
            },
            failure: function () {
                alert("Failed to send request");
            }
        })
    }
    message.innerHTML = a.getAttribute("message");
    time.innerHTML = a.getAttribute("created");
    if (a.getAttribute("query") != "null") {
        query.innerHTML = a.getAttribute("query");
        query.style.display="block";
    }else{
        query.style.display="none";
    }
    modal.style.display = "block";
}
span.onclick = function () {
    modal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function loadmessage() {
    $.ajax({
        url: "http://localhost/anonymous/inbox",
        method: "POST",
        dataType: "text",
        data: {
            getdata: getdata
        },
        beforeSend: function () {
            loadmore.disabled = true;
            loadmore.disabled = true;
            // loadmore.innerHTML = '<div class="loader"></div>';
            loadmore.disabled = true;            
            // loadmore.innerHTML = '<div class="loader"></div>';
        },
        success: function (o) {
            var obj = JSON.parse(o);
            var length = Object.keys(obj).length;
            var html = '';
            if (length == 0) {
                setTimeout(() => {
                    $("#loadmore").fadeOut(1, () => {
                        $('#nomsg').fadeIn(500);
                    });
                }, 1000);
            } else {
                for (var i = 1; i <= length; i++) {
                    if (obj[i][3] == 0) {
                        html += '<div class="inboxele" onclick="messageread(this)" id="' + obj[i][0] + '" readstatus="' + obj[i][3] + '" message="' + obj[i][1] + '" created="' + obj[i][2] + '" query="' + obj[i][4] + '"><i class="bi bi-envelope-heart-fill"></i></div>';
                    } else {
                        html += '<div class="inboxele" onclick="messageread(this)" id="' + obj[i][0] + '" readstatus="' + obj[i][3] + '" message="' + obj[i][1] + '" created="' + obj[i][2] + '" query="' + obj[i][4] + '"><i class="bi bi-envelope-open-heart"></i></div>';
                    }

                }
                firstload++;
                getdata = obj[length][0];
                setTimeout(function () {
                    document.getElementById("inbox").innerHTML += html;
                    loadmore.disabled = false;
                    loadmore.innerHTML = 'Load More';
                }, 1000);
            }
        },
        failure: function () {
            alert("Failed to send request");
        }
    })
}

function loadmore1() {
    $.ajax({
        url: "http://localhost/anonymous/inbox",
        method: "POST",
        dataType: "text",
        data: {
            getdata: getdata
        },
        beforeSend: function () {
            loadmore.disabled = true;
            loadmore.innerHTML = '<div class="loader"></div>';
        },
        success: function (o) {
            var obj = JSON.parse(o);
            var length = Object.keys(obj).length;
            var html = '';
            if (length == 0) {
                setTimeout(() => {
                    $("#loadmore").fadeOut(1, () => {
                        $('#nomore').fadeIn(500);
                    });
                    $('#loadmore').remove();
                    lastload++;
                }, 1000);
            } else {
                for (var i = 1; i <= length; i++) {
                    if (obj[i][3] == 0) {
                        html += '<div class="inboxele" onclick="messageread(this)" id="' + obj[i][0] + '" readstatus="' + obj[i][3] + '" message="' + obj[i][1] + '" created="' + obj[i][2] + '" query="' + obj[i][4] + '"><i class="bi bi-envelope-heart-fill"></i></div>';
                    } else {
                        html += '<div class="inboxele" onclick="messageread(this)" id="' + obj[i][0] + '" readstatus="' + obj[i][3] + '" message="' + obj[i][1] + '" created="' + obj[i][2] + '" query="' + obj[i][4] + '"><i class="bi bi-envelope-open-heart"></i></div>';
                    }
                }
                getdata = obj[length][0];
                setTimeout(function () {
                    document.getElementById("inbox").innerHTML += html;
                    loadmore.disabled = false;
                    loadmore.innerHTML = 'Load More';
                }, 2000);

            }
        },
        failure: function () {
            alert("failed");
        }
    })
}

function deletemessagefun(id) {
    if (confirm("Do You Want To Delete?") == false) {
        return;
    }
    $.ajax({
        url: "http://localhost/anonymous/inbox",
        method: "POST",
        dataType: "text",
        data: {
            delete: id
        },
        beforeSend: function () {
            console.log("deleting")
        },
        success: function (o) {
            if (o == 0) {
                console.log("suxxccess")
                $(`#${id}`).remove()
                modal.style.display = "none";
            } else {
                console.log("failure")
                modal.style.display = "none";
            }
        },
        failure: function () {
            alert("failed");
        }
    })
}
function sharefun(id, linkid) {
    console.log(id,linkid);
    var base64image;
    var dataURL;
    if ('canShare' in navigator) {
        const share = async function () {
            try {
                const screenshotTarget = document.getElementById("modal-content");
                await html2canvas(screenshotTarget, {
                    dpi: 144,
                    backgroundColor: null,
                    scale: 2,
                }).then(canvas => {
                    base64image = canvas.toDataURL('image/png');
                    dataURL = canvas.toDataURL();
                })
                // const response = await fetch(shareimg);  
                blob = await (await fetch(dataURL)).blob();
                const filesArray = [
                    new File(
                        [blob],
                        'ShareMSG' + id + '.png', {
                        type: blob.type,
                        lastModified: new Date().getTime()
                    }
                    )
                ];
                const shareData = {
                    title: "Share Message - ShareMSG",
                    text: "Tell me a secret message you haven't told anyone yet 😜",
                    url:"http://localhost/anonymous/@" + linkid,
                    files: filesArray,
                };
                await navigator.share(shareData);
                changeButtonLoadingFinished();
            } catch (err) {
                changeButtonLoadingFinished();
                console.log(err.name, err.message);
                alert("Some error occured. Please try again after some time.")
            }
        };
        changeButtonLoading();
        share();
    } else {
        alert("Please take a screenshot of the image and share.Your device does not suport Share API feature. We are looking for alternatives to make your experience better. Sorry for the inconvinience.")
    }
    function changeButtonLoading() {
        $("#sharebutt").attr("disabled", true);
        // $("#sharebutt").html("Please Wait..");
    }
    function changeButtonLoadingFinished() {
        $("#sharebutt").attr("disabled", false);
        // $("#sharebutt").html("Share Again");
    }
}

