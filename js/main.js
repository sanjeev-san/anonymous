//prevent for resubmission
if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}

try {
	//hamburger icon for mobile view
	const doc = document;
	const menuOpen = doc.querySelector("#menu");
	const menuClose = doc.querySelector("#navbarclose");
	const overlay = doc.querySelector("#mobile__menu");

	menuOpen.addEventListener("click", () => {
		overlay.classList.add("overlay--active");
	});

	menuClose.addEventListener("click", () => {
		overlay.classList.remove("overlay--active");
	});
} catch (error) {
	console.log("navbar not found");
}

try {
	// color picker
	var colormodal = document.getElementById("colormodal");
	var colormodalclose = document.getElementById("colormodalclose");
	colormodalclose.onclick = function () {
		colormodal.style.display = "none";
	}
	window.onclick = function (event) {
		if (event.target == colormodal) {
			colormodal.style.display = "none";
		}
	};
	function colorpicker() {
		colormodal.style.display = "block";
	}
	const colorThemes = document.querySelectorAll('[name="theme"]');
	// store theme
	const storeTheme = function (theme) {
		localStorage.setItem("theme", theme);
	};
	// set theme when visitor returns
	const setTheme = function () {
		const activeTheme = localStorage.getItem("theme");
		if (activeTheme != null) {
			colorThemes.forEach((themeOption) => {
				if (themeOption.id === activeTheme) {
					themeOption.checked = true;
				}
			});

			// fallback for no :has() support
			if (document.documentElement.className != activeTheme) {
				document.documentElement.className = activeTheme;
				$(".selectwave").removeClass().addClass(`selectwave wave${activeTheme}`);
			}
			if (activeTheme == "light") {
				document.getElementById("logo").style.filter = "invert(1)";
			} else {
				document.getElementById("logo").style.filter = "invert(0)";
			}
		}
	};

	colorThemes.forEach((themeOption) => {
		themeOption.addEventListener("click", () => {
			storeTheme(themeOption.id);
			$(".selectwave").removeClass().addClass(`selectwave wave${themeOption.id}`);
			// fallback for no :has() support
			document.documentElement.className = themeOption.id;
			if (themeOption.id == "light") {
				document.getElementById("logo").style.filter = "invert(1)";
			} else {
				document.getElementById("logo").style.filter = "invert(0)";
			}
		});
	});
	// document.addEventListener("DOMContentLoaded", setTheme());
	document.onload = setTheme();
} catch (error) {
	console.log("theme pick not found");
}

try {
	var qindex = "null";
	var clickcount = 0;
	var faqquestion = document.querySelectorAll(".faqquestion");
	var faqquestion = document.querySelectorAll(".faqopenbtn");
	var answer = document.querySelectorAll(".answer");

	faqquestion.forEach((question) => {
		question.addEventListener("click", () => {
			if (clickcount == 0) {
				clickcount++;
				if (qindex == String(question.getAttribute("qindex"))) {
					jQuery(answer[qindex]).fadeOut(300)
					qindex = "null";
					// question.innerHTML = '<i class="bi bi-patch-plus"></i>'
					question.children[1].innerHTML = '<i class="bi bi-patch-plus"></i>';
				} else {
					question.children[1].innerHTML = '<i class="bi bi-patch-minus"></i>';
					qindex = question.getAttribute("qindex");
					answer.forEach((answer) => {
						jQuery(answer).fadeOut(300);
					})
					jQuery(answer[qindex]).fadeIn(800);
				}
				setTimeout(() => {
					clickcount--;
				}, 1000);
			}
		})
	});
} catch (error) {
	console.log("faq not found");
}