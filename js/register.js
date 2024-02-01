//prevent reload with prompt each time on refresh
if (window.performance.navigation.type == 1 && window.location.href != "http://localhost/anonymous/register") {
    window.location.href = "http://localhost/anonymous/register";
}
try {    
    const newform = document.getElementById("newuser");
    const oldform = document.getElementById("olduser");
    function newuser() {
        $("#select").fadeOut(() => {
            $("#newuser").fadeIn();
            newform.style.display = 'flex';
        });
    }

    function olduser() {
        $("#select").fadeOut(() => {
            $("#olduser").fadeIn();
            oldform.style.display = 'flex';
        });
    }

    function backtoselect(a) {
        $(`#${a}`).fadeOut(() => {
            $("#select").fadeIn();
        });
    }
}
catch (error) {
    console.log("you are logged in");
}


