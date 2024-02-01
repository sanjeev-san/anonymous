const addBtn = document.querySelector("#installbutton"),
    dialog = document.querySelector(".popup"),
    androidprompt = document.querySelector(".android_prompt"),
    iosprompt = document.querySelector(".ios_prompt"),
    closebtn = document.querySelector(".popupCloseButton");

function itisios() {
    localStorage.getItem("promptcountios") ? localStorage.promptcountios = Number(localStorage.promptcountios) + 1 : localStorage.setItem("promptcountios", 1), 1 != localStorage.getItem("promptcountios") || localStorage.getItem("installed") || (dialog.style.display = "block", androidprompt.style.display = "block", addBtn.addEventListener("click", () => {
        androidprompt.style.display = "none", iosprompt.style.display = "block", localStorage.setItem("installed", "true")
    })), localStorage.getItem("promptcountios") >= 10 && localStorage.removeItem("promptcountios")
}

function notios() {
    if (localStorage.getItem("promptcount") ? localStorage.promptcount = Number(localStorage.promptcount) + 1 : localStorage.setItem("promptcount", 1), 1 == localStorage.getItem("promptcount")) {
        let a;
        window.addEventListener("beforeinstallprompt", b => {
            console.log("object");
            b.preventDefault(), a = b, dialog.style.display = "block", addBtn.addEventListener("click", () => {
                dialog.style.display = "none", a.prompt(), a.userChoice.then(b => {
                    "accepted" === b.outcome ? console.log("User accepted the PWA prompt") : console.log("User dismissed the PWA prompt"), a = null
                })
            })
        })
    }
    localStorage.getItem("promptcount") >= 8 && localStorage.removeItem("promptcount")
}


var updateflowcalled=0;
function invokeServiceWorkerUpdateFlow(registration) {
    // TODO implement your own UI notification element
    if(updateflowcalled==0){
         alert("New version of the app is available. Refresh now?");
         updateflowcalled++;
    }
    if (registration.waiting) {
        // let waiting Service Worker know it should became active
        registration.waiting.postMessage('SKIP_WAITING')
    }

}

// check if the browser supports serviceWorker at all
if ('serviceWorker' in navigator) {
    // wait for the page to load
    window.addEventListener('load', async () => {
        // register the service worker from the file specified
        const registration = await navigator.serviceWorker.register('sw.js?v=11.0')

        // ensure the case when the updatefound event was missed is also handled
        // by re-invoking the prompt when there's a waiting Service Worker
        if (registration.waiting) {
            invokeServiceWorkerUpdateFlow(registration)
        }

        // detect Service Worker update available and wait for it to become installed
        registration.addEventListener('updatefound', () => {
            if (registration.installing) {
                // wait until the new Service worker is actually installed (ready to take over)
                registration.installing.addEventListener('statechange', () => {
                    if (registration.waiting) {
                        // if there's an existing controller (previous Service Worker), show the prompt
                        if (navigator.serviceWorker.controller) {
                            invokeServiceWorkerUpdateFlow(registration)
                        } else {
                            // otherwise it's the first install, nothing to do
                            console.log('Service Worker initialized for the first time')
                        }
                    }
                })
            }
        })

        let refreshing = false;

        // detect controller change and refresh the page
        navigator.serviceWorker.addEventListener('controllerchange', () => {
            if (!refreshing) {
                window.location.reload()
                refreshing = true
            }
        })
    })
}
closebtn.addEventListener("click", () => {
    dialog.style.display = "none"
})