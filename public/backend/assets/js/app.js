$(function () {
	"use strict";
	new PerfectScrollbar(".header-message-list"), new PerfectScrollbar(".header-notifications-list"),

		$(".mobile-search-icon").on("click", function () {
			$(".search-bar").addClass("full-search-bar")
		}),

		$(".search-close").on("click", function () {
			$(".search-bar").removeClass("full-search-bar")
		}),

		$(".mobile-toggle-menu").on("click", function () {
			$(".wrapper").addClass("toggled")
		}),

		$(document).ready(function () {

			// ==============================
			// THEME (FIX: remove conflicts)
			// ==============================
			const THEME_CLASSES = "light-theme dark-theme semi-dark minimal-theme";

			// পেজ লোড হলে localStorage থেকে থিম চেক করা
			const savedTheme = localStorage.getItem("theme") || "light";

			// IMPORTANT: remove any theme class first (prevents light + dark together)
			$("html").removeClass(THEME_CLASSES);

			if (savedTheme === "dark") {
				$("html").addClass("dark-theme");
				$(".dark-mode-icon i").attr("class", "bx bx-sun");
			} else if (savedTheme === "semidark") {
				$("html").addClass("semi-dark");
				$(".dark-mode-icon i").attr("class", "bx bx-moon");
			} else if (savedTheme === "minimal") {
				$("html").addClass("minimal-theme");
				$(".dark-mode-icon i").attr("class", "bx bx-moon");
			} else {
				$("html").addClass("light-theme");
				$(".dark-mode-icon i").attr("class", "bx bx-moon");
			}

			// ডার্ক মোড টগল ফাংশন
			$(".dark-mode").on("click", function () {

				// IMPORTANT: remove any theme class first (prevents conflicts)
				$("html").removeClass(THEME_CLASSES);

				if (localStorage.getItem("theme") === "dark") {
					$("html").addClass("light-theme");
					$(".dark-mode-icon i").attr("class", "bx bx-moon");
					localStorage.setItem("theme", "light"); // লাইট মোড সংরক্ষণ
				} else {
					$("html").addClass("dark-theme");
					$(".dark-mode-icon i").attr("class", "bx bx-sun");
					localStorage.setItem("theme", "dark"); // ডার্ক মোড সংরক্ষণ
				}
			});
		});

	$(".toggle-icon").click(function () {
		$(".wrapper").hasClass("toggled") ? ($(".wrapper").removeClass("toggled"), $(".sidebar-wrapper").unbind("hover")) : ($(".wrapper").addClass("toggled"), $(".sidebar-wrapper").hover(function () {
			$(".wrapper").addClass("sidebar-hovered")
		}, function () {
			$(".wrapper").removeClass("sidebar-hovered")
		}))
	}),
		$(document).ready(function () {
			$(window).on("scroll", function () {
				$(this).scrollTop() > 300 ? $(".back-to-top").fadeIn() : $(".back-to-top").fadeOut()
			}), $(".back-to-top").on("click", function () {
				return $("html, body").animate({
					scrollTop: 0
				}, 600), !1
			})
		}),

		$(function () {
			for (var e = window.location, o = $(".metismenu li a").filter(function () {
				return this.href == e
			}).addClass("").parent().addClass("mm-active"); o.is("li");) o = o.parent("").addClass("mm-show").parent("").addClass("mm-active")
		}),

		$(function () {
			$("#menu").metisMenu()
		}),

		$(".chat-toggle-btn").on("click", function () {
			$(".chat-wrapper").toggleClass("chat-toggled")
		}), $(".chat-toggle-btn-mobile").on("click", function () {
			$(".chat-wrapper").removeClass("chat-toggled")
		}),

		$(".email-toggle-btn").on("click", function () {
			$(".email-wrapper").toggleClass("email-toggled")
		}), $(".email-toggle-btn-mobile").on("click", function () {
			$(".email-wrapper").removeClass("email-toggled")
		}), $(".compose-mail-btn").on("click", function () {
			$(".compose-mail-popup").show()
		}), $(".compose-mail-close").on("click", function () {
			$(".compose-mail-popup").hide()
		}),

		$(".switcher-btn").on("click", function () {
			$(".switcher-wrapper").toggleClass("switcher-toggled")
		}), $(".close-switcher").on("click", function () {
			$(".switcher-wrapper").removeClass("switcher-toggled")
		}),

		// ==============================
		// SWITCHER THEME BUTTONS (FIX)
		// ==============================
		$("#lightmode").on("click", function () {
			$("html").removeClass("light-theme dark-theme semi-dark minimal-theme").addClass("light-theme");
			localStorage.setItem("theme", "light");
		}), $("#darkmode").on("click", function () {
			$("html").removeClass("light-theme dark-theme semi-dark minimal-theme").addClass("dark-theme");
			localStorage.setItem("theme", "dark");
		}), $("#semidark").on("click", function () {
			$("html").removeClass("light-theme dark-theme semi-dark minimal-theme").addClass("semi-dark");
			localStorage.setItem("theme", "semidark");
		}), $("#minimaltheme").on("click", function () {
			$("html").removeClass("light-theme dark-theme semi-dark minimal-theme").addClass("minimal-theme");
			localStorage.setItem("theme", "minimal");
		}),

		$("#headercolor1").on("click", function () {
			$("html").addClass("color-header headercolor1"), $("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
		}), $("#headercolor2").on("click", function () {
			$("html").addClass("color-header headercolor2"), $("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
		}), $("#headercolor3").on("click", function () {
			$("html").addClass("color-header headercolor3"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8")
		}), $("#headercolor4").on("click", function () {
			$("html").addClass("color-header headercolor4"), $("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8")
		}), $("#headercolor5").on("click", function () {
			$("html").addClass("color-header headercolor5"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor3 headercolor6 headercolor7 headercolor8")
		}), $("#headercolor6").on("click", function () {
			$("html").addClass("color-header headercolor6"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8")
		}), $("#headercolor7").on("click", function () {
			$("html").addClass("color-header headercolor7"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor3 headercolor8")
		}), $("#headercolor8").on("click", function () {
			$("html").addClass("color-header headercolor8"), $("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor3")
		})

	// ==============================
	// SIDEBAR COLORS (FIX: do not wipe html classes)
	// ==============================
	const SIDEBAR_CLASSES = "sidebarcolor1 sidebarcolor2 sidebarcolor3 sidebarcolor4 sidebarcolor5 sidebarcolor6 sidebarcolor7 sidebarcolor8";

	// sidebar colors
	$('#sidebarcolor1').click(theme1);
	$('#sidebarcolor2').click(theme2);
	$('#sidebarcolor3').click(theme3);
	$('#sidebarcolor4').click(theme4);
	$('#sidebarcolor5').click(theme5);
	$('#sidebarcolor6').click(theme6);
	$('#sidebarcolor7').click(theme7);
	$('#sidebarcolor8').click(theme8);

	function theme1() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor1');
	}

	function theme2() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor2');
	}

	function theme3() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor3');
	}

	function theme4() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor4');
	}

	function theme5() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor5');
	}

	function theme6() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor6');
	}

	function theme7() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor7');
	}

	function theme8() {
		$('html').addClass('color-sidebar').removeClass(SIDEBAR_CLASSES).addClass('sidebarcolor8');
	}

});
